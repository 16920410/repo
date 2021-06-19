<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reunione;
use App\Models\Acuerdos;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * Class ReunioneController
 * @package App\Http\Controllers
 */
class AcuerdoController extends Controller
{
    /**
     * Display a listing of the resources.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $acuerdos = Acuerdos::paginate();

        return view('acuerdos.index', compact('acuerdos'))
            ->with('i', (request()->input('page', 1) - 1) * $acuerdos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Reunione $reunione)
    {
        $acuerdo = new Reunione();
        $acuerdos = Acuerdos::where('reunion_id', $reunione->id);
        return view('reunione.acuerdoform', compact('reunione', 'acuerdo', 'acuerdo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Reunione $reunione)
    {
        request()->validate(Acuerdos::$rules);
        $reunion = $reunione;
        // $req = $request;
        var_dump($reunion);
        // var_dump($req);
        


        return redirect()->route('reuniones.acuerdos.create',['id'=> $reunione->id])
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

        return view('reunione.edit', compact('reunione', 'docentes','asistentes','listaAsistentes'));
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

        $nuevosAsistentes = $request->input('asistentes')? $request->input('asistentes'): [] ;


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
