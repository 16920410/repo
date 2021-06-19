<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reunione;
use App\Models\Acuerdos;
use App\Models\Ordenes;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * Class OrdenController
 * @package App\Http\Controllers
 */
class OrdenController extends Controller
{
    /**
     * Display a listing of the resources.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $acuerdos = Acuerdos::paginate();

        return view('reunione.ordenform', compact('acuerdos'))
            ->with('i', (request()->input('page', 1) - 1) * $acuerdos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     * @param  Reunione $reunione
     * @return \Illuminate\Http\Response
     */
    public function create(Reunione $reunione)
    {
        $reunion = $reunione;
        // var_dump($reunion);
        // exit();

        $ordenes = Ordenes::where('reunion_id', $reunion->id)->get();
        $num_orden = count($ordenes)+1;
        return view('reunione.ordenform', compact('ordenes', 'num_orden', 'reunion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reunione $reunione
     * @return \Illuminate\Http\Response
     */
    public function store(Reunione $reunione)
    {
        request()->validate(Ordenes::$rules);

        // var_dump($reunione);

        // exit();

        return redirect()->route('reuniones.acuerdos.create',['reunione'=>$reunione->id])
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
        // $reunione = Ordenes::find();
        $ordenes = Ordenes::where('reunion_id', $id)->get();
        var_dump($ordenes);
        exit();

        return view('reunione.ordenform', compact('reunione', 'ordenes', 'asistentes', 'listaAsistentes'));
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


        return redirect()->route('reuniones.index')
            ->with('success', 'Reunion updated successfully');
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

        $reunion = Reunione::find($id);
        $ordenes = explode(",", $reunion->orden);

        // print_r($docentes);
        // exit();

        $pdf = PDF::loadView('reunione.pdf', compact("docentes", "puestos", "carreras", "reunion", "ordenes"));


        // return view('reunione.pdf', compact("docentes", "puestos", "carreras", "reunion", "ordenes"));
        return $pdf->download('pdf_file.pdf');
    }
}
