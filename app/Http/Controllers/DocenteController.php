<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use App\Models\Puesto;
use Barryvdh\DomPDF\Facade as PDF;



/**
 * Class DocenteController
 * @package App\Http\Controllers
 */
class DocenteController extends Controller
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
        $docentes = Docente::orderBy('apellido_p', 'asc')->paginate();

        return view('docente.index', compact('docentes'))
            ->with('i', (request()->input('page', 1) - 1) * $docentes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docente = new Docente();
        $puestos = Puesto::all();
        return view('docente.create', compact('docente', 'puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $nombreCompleto = $request->input('nombre', $request->nombre_solo.' '.$request->apellido_p.' '.$request->apellido_m);
        request()->validate(Docente::$rules);

        $docente = Docente::create($request->all());

        return redirect()->route('docentes.index')
            ->with('success', 'Docente agregado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);

        return view('docente.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::find($id);
        $puestos = Puesto::all();

        return view('docente.edit', compact('docente', 'puestos'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        request()->validate(Docente::$rules);

        $docente->update($request->all());

        return redirect()->route('docentes.index')
            ->with('success', 'Docente actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $docente = Docente::find($id)->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'Docente eliminado');
    }

    public function crearpdf()
    {
        $docentes= Docente::orderBy('apellido_p', 'asc')->get();
        $pdf = PDF::loadView('docente.pdf', compact("docentes"));
        return $pdf->download('Docentes.pdf');

    }
}
