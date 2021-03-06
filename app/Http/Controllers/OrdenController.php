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
    public function __construct(){
        $this->middleware('auth', ['except' => []]);
    }

    
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

        $ordenes = Ordenes::where('reunion_id', $reunion->id)->get();
        $num_orden = count($ordenes) + 1;
        return view('reunione.ordenform', compact('ordenes', 'num_orden', 'reunion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Reunione $reunione
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Reunione $reunione, Request $request)
    {
        $request->merge(['reunion_id' => $reunione->id]);
        $validation = $request->validate(Ordenes::$rules);
        $id = $reunione->id;
        $orden = Ordenes::create($validation);
        $req = $request->all();

        return redirect()->route('reuniones.ordenes.create', ['reunione' => $id])
            ->with('success', 'Orden created successfully.');
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
     * @param  Ordenes $ordene
     * @return \Illuminate\Http\Response
     */
    public function update(Reunione $reunione, $orden)
    {
        $request = request();
        $request->merge(['reunion_id' => $reunione->id]);
        $request->merge(['id' => $orden]);
        $validated = $request->validate(Ordenes::$rules);
        $ordene = Ordenes::where('id', $orden)->where('reunion_id', $reunione->id);

        switch ($request->submitbutton) {
            case 'Eliminar':
                $ordene->delete();
                return redirect()->route('reuniones.ordenes.create', ['reunione' => $reunione->id])
                    ->with('success', 'Orden deleted successfully');

                break;

            case 'Actualizar':

                $ordene->update($validated);
                return redirect()->route('reuniones.ordenes.create', ['reunione' => $reunione->id])
                    ->with('success', 'Orden updated successfully');
                break;
        }




        return redirect()->route('reuniones.ordenes.create', ['reunione' => $reunione->id])
            ->with('success', 'Orden updated successfully');
    }


    public function crearpdf($id)
    {
        $docentess = null;
        $docentes = [];

        $reunion = Reunione::find($id);
        $ordenes = explode(",", $reunion->orden);


        $pdf = PDF::loadView('reunione.pdf', compact("docentes", "puestos", "carreras", "reunion", "ordenes"));


        // return view('reunione.pdf', compact("docentes", "puestos", "carreras", "reunion", "ordenes"));
        return $pdf->download('pdf_file.pdf');
    }
}
