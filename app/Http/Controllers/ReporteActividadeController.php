<?php

namespace App\Http\Controllers;

use App\Models\Actividade;
use App\Models\Liberacion;
use App\Models\ReporteActividade;
use Illuminate\Http\Request;

/**
 * Class ReporteActividadeController
 * @package App\Http\Controllers
 */
class ReporteActividadeController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => []]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reporteActividades = ReporteActividade::paginate();

        return view('reporte-actividade.index', compact('reporteActividades'))
            ->with('i', (request()->input('page', 1) - 1) * $reporteActividades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Liberacion $liberacion)
    {
        $reportes = ReporteActividade::where('liberacion_id', $liberacion->id);
        // var_dump($liberacion->docente);
        // exit();
        $lista_actividades = Actividade::all();
        if (!$reportes->exists()) {
            foreach ($lista_actividades as $key => $actividad) {
                ReporteActividade::create(['liberacion_id' => $liberacion->id, 'actividad_id' => $actividad->id, 'evaluacion' => 0]);
            }
        }

        $reportes = $reportes->join('actividades as a', 'a.id', '=', 'reporte_actividades.actividad_id')->get();
        $reporteActividade = new ReporteActividade();
        $actividades = Actividade::all()->pluck('descripcion', 'id');
        // $infolib = Liberacion::where('id', $liberacion->id)->get();


        // if ($actividades) {
        //     var_dump($actividades);
        //     exit();
        // }
        return view('reporte-actividade.create', compact('lista_actividades', 'liberacion', 'reportes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ReporteActividade::$rules);

        $reporteActividade = ReporteActividade::create($request->all());

        return redirect()->route('reporte-actividades.index')
            ->with('success', 'ReporteActividade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reporteActividade = ReporteActividade::find($id);

        return view('reporte-actividade.show', compact('reporteActividade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reporteActividade = ReporteActividade::find($id);

        return view('reporte-actividade.edit', compact('reporteActividade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ReporteActividade $reporteActividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liberacion $liberacion, $reporteActividade)
    {
        $validated = request()->validate(ReporteActividade::$rules);
        $reporte = ReporteActividade::where('liberacion_id', $liberacion->id)->where('actividad_id',$reporteActividade)->update($validated);


        return redirect()->route('liberacions.reporte-actividades.create', $liberacion->id)
            ->with('success', 'ReporteActividade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reporteActividade = ReporteActividade::find($id)->delete();

        return redirect()->route('reporte-actividades.index')
            ->with('success', 'ReporteActividade deleted successfully');
    }
}
