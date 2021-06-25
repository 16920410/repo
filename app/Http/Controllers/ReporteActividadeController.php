<?php

namespace App\Http\Controllers;

use App\Models\ReporteActividade;
use Illuminate\Http\Request;

/**
 * Class ReporteActividadeController
 * @package App\Http\Controllers
 */
class ReporteActividadeController extends Controller
{
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
    public function create()
    {
        $reporteActividade = new ReporteActividade();
        return view('reporte-actividade.create', compact('reporteActividade'));
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
    public function update(Request $request, ReporteActividade $reporteActividade)
    {
        request()->validate(ReporteActividade::$rules);

        $reporteActividade->update($request->all());

        return redirect()->route('reporte-actividades.index')
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
