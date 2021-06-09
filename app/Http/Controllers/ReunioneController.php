<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

use App\Models\Reunione;
use App\Models\Carrera;
use App\Models\Puesto;
use App\Models\Docente;
use Barryvdh\DomPDF\Facade as PDF;

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
        $reuniones = Reunione::paginate();

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
        $docentes = Docente::all();
        return view('reunione.create', compact('reunione', 'docentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reunione::$rules);

        $reunione = Reunione::create($request->all());
        $asistentes = $request->input('asistentes');

        var_dump($reunione->id);
        foreach ($asistentes as $asistente) {
            var_dump((int)$asistente);
            // Asistencia::where(['reunion_id'=>$reunione->id, 'docente_id'=>((int)$asistente)]);
            Asistencia::create(['reunion_id' => $reunione->id, 'docente_id' => ((int)$asistente)]);
        }
        // exit();
        // $asistencia = Asistencia::create();

        return redirect()->route('reuniones.index')
            ->with('success', 'Reunione created successfully.' . var_dump($asistentes));
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
        $docentes = Docente::all();

        return view('reunione.edit', compact('reunione', 'docentes'));
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

        $reunione->update($request->all());

        return redirect()->route('reuniones.index')
            ->with('success', 'Reunione updated successfully');
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
            ->with('success', 'Reunione deleted successfully');
    }

    public function crearpdf($id)
    {
        $docentess = null;
        $docentes = [];
        
        
        $asistentes = Asistencia::where('reunion_id', $id)->get();
        // var_dump($asistentes);
        // exit();
        if (count($asistentes)) {
            $docentess = Docente::where('id', $asistentes[0]->docente_id);
            foreach ($asistentes as $key => $asistente) {
                $docentess->orWhere('id', $asistente->docente_id);
            }
            $docentes = $docentess->get();
            // var_dump($docentes);
        }

        $puestos = Puesto::all();
        $carreras = Carrera::all();
        $reunion = Reunione::find($id);
        $ordenes = explode(",", $reunion->orden);

        // print_r($docentes);
        // exit();

        $pdf = PDF::loadView('reunione.pdf', compact("docentes", "puestos", "carreras", "reunion", "ordenes"));


        // return view('reunione.pdf', compact("docentes", "puestos", "carreras", "reunion", "ordenes"));
        return $pdf->download('pdf_file.pdf');
    }
}
