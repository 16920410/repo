<?php

namespace App\Http\Controllers;

use App\Models\Acuerdos;
use App\Models\Asistencia;
use Illuminate\Http\Request;

use App\Models\Reunione;
use App\Models\Carrera;
use App\Models\Puesto;
use App\Models\Docente;
use App\Models\Ordenes;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

use function GuzzleHttp\Promise\all;

/**
 * Class ReunioneController
 * @package App\Http\Controllers
 */
class ReunioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reuniones = Reunione::orderBy('fecha', 'desc')->paginate();

        return view('reunione.index', compact('reuniones'))
            ->with('i', (request()->input('page', 1) - 1) * $reuniones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reunione = new Reunione();
        $asistentes = Docente::orderBy('apellido_p')->get();
        $acuerdos = [];
        $listaAsistentes = [];
        return view('reunione.create', compact('reunione', 'asistentes', 'listaAsistentes', 'acuerdos'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Boolean $continue
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Boolean $continue)
    {
        request()->validate(Reunione::$rules);
        $request = request();
        // Obtenemos el valor de continue
        $continue = $request->all()['continue'];
        $asistentes = $request->input('asistentes');
        // creamos la instancia de la reunión
        $reunione = Reunione::create($request->all());
        $docentes = Docente::all();
        // Creamos una asistencia por docente, si está en la lista ponemos su asistencia como verdadero, sino, como falso
        foreach($docentes as $docente){
            Asistencia::create(['reunion_id' => $reunione->id, 'docente_id' => $docente->id,'asistencia'=> !(array_search($docente->id,$asistentes) === false)]);
        }


        if (strcmp($continue, "Continuar") != 0)
            return redirect()->route('reuniones.index')->with('success', 'Reunion created successfully.');
        return redirect()->route('reuniones.ordenes.create', ['reunione' => $reunione->id])
            ->with('success', 'Reunion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reunione = Reunione::find($id);

        return view('reunione.show', compact('reunione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reunione = Reunione::find($id);
        $asistentes = Asistencia::where('reunion_id', $id)->join('docentes as d','d.id', '=', 'asistencias.docente_id')
        ->select(['d.id', 'asistencia','d.nombre'])->get();
        $acuerdos = Acuerdos::where('reunion_id', $id)->get();
        $docentes = Docente::orderBy('apellido_p')->get();
        return view('reunione.edit', compact('reunione', 'docentes', 'asistentes', 'acuerdos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reunione $reunione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reunione $reunione)
    {
        request()->validate(Reunione::$rules);

        $updated = $reunione->update($request->all());

        $nuevosAsistentes = $request->input('asistentes') ? $request->input('asistentes') : [];
        $asistentes = Asistencia::where('reunion_id', $reunione->id)->get();
        var_dump($nuevosAsistentes);
        var_dump("asistentes viejo", $asistentes->toArray());

        $docentes = Docente::all();
        // Actualizamos cada asistencia dependiendo si está en la lista o no
        foreach($asistentes as $docente){
            $docente->update(['asistencia'=> !(array_search($docente->docente_id,$nuevosAsistentes) === false)]);
        }

        // foreach ($asistentes as $asistente) {
        //     // si el elemento no está en la nueva lista, se pone asistencia como falso
        //     if (array_search($asistente->docente_id, $nuevosAsistentes) === false) {
        //         var_dump("updating", $asistente->id);
        //         $asistente->update(['asistencia'=>false]);
        //     }
        //     var_dump(array_search($asistente->id, $nuevosAsistentes) === false);
        // }
        // foreach ($nuevosAsistentes as $key => $nAsistente) {
        //     // si el elemento nuevo no está en la base de datos, se agrega
        //     $existe = Asistencia::where('reunion_id', $reunione->id)->where('docente_id', $nAsistente)->count() > 0;
        //     if (!$existe) {
        //         var_dump("no existe, creando", $nAsistente);
        //         Asistencia::create(['reunion_id' => $reunione->id, 'docente_id' => ((int)$nAsistente)]);
        //     }
        // }
        return redirect()->route('reuniones.ordenes.create', ['reunione' => $reunione->id])
            ->with('success', 'Reunion updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reunione = Reunione::find($id)->delete();

        return redirect()->route('reuniones.index')
            ->with('success', 'Reunion deleted successfully');
    }

    public function crearpdf($id)
    {
        $docentess = null;
        $docentes = [];


        $asistentes = Asistencia::where('reunion_id', $id)->get();
        $ordenes = DB::table('ordenes')->where('ordenes.reunion_id', $id)->join('acuerdos', 'acuerdos.orden_id', '=', 'ordenes.id')
            ->select(['ordenes.descripcion as orden', 'ordenes.num_orden', 'acuerdos.descripcion as acuerdo'])
            ->orderBy('num_orden')->get();
        $ordenes = json_decode($ordenes, true);
        
        // get docentes list from asistencia
        if (count($asistentes)) {
            $docentess = Docente::where('id', $asistentes[0]->docente_id);
            foreach ($asistentes as $key => $asistente) {
                $docentess->orWhere('id', $asistente->docente_id);
            }
            $docentes = $docentess->get();
        }
        $lista_completa = Docente::all();
        var_dump($lista_completa);
        // exit();
        $puestos = Puesto::all();
        $carreras = Carrera::all();
        $reunion = Reunione::find($id);

        $pdf = PDF::loadView('reunione.pdf', compact("docentes", "puestos", "carreras", "reunion", "ordenes","lista_completa"));


        return view('reunione.pdf', compact("docentes", "puestos", "carreras", "reunion", "ordenes","lista_completa"));
        return $pdf->download('Acta de reunión.pdf');
    }
}
