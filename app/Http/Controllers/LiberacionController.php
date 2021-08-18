<?php

namespace App\Http\Controllers;

use App\Models\Liberacion;
use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\ReporteActividade;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * Class LiberacionController
 * @package App\Http\Controllers
 */
class LiberacionController extends Controller
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
        $liberacions = Liberacion::paginate();

        return view('liberacion.index', compact('liberacions'))
            ->with('i', (request()->input('page', 1) - 1) * $liberacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liberacion = new Liberacion();
        $docentes =  Docente::all();

        return view('liberacion.create', compact('liberacion','docentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Liberacion::$rules);

        $liberacion = Liberacion::create($request->all());

        return redirect("reporte-actividades/$liberacion->id")
            ->with('success', 'Liberacion created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liberacion = Liberacion::find($id);

        return view('liberacion.show', compact('liberacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $liberacion = Liberacion::find($id);
        $docentes = Docente::all();

        return view('liberacion.edit', compact('liberacion','docentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Liberacion $liberacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liberacion $liberacion)
    {
        request()->validate(Liberacion::$rules);

        $liberacion->update($request->all());

        return redirect("reporte-actividades/$liberacion->id")
            ->with('success', 'Liberacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $liberacion = Liberacion::find($id)->delete();

        return redirect()->route('liberacions.index')
            ->with('success', 'Liberacion deleted successfully');
    }
    public function pdfliberacion($id)
    {
        $docentess = null;
        $docentes = [];
        $lista_actividades = ReporteActividade::where('liberacion_id',$id)->get();
        $liberacion = Liberacion::where('id',$id)->first();
        $presidente = Docente::where('puesto_id','3')->first();
        $secretario = Docente::where('puesto_id','2')->first();


        //  return view('liberacion.pdfliberacion', compact('lista_actividades','liberacion','presidente', 'secretario'));
        $pdf = PDF::loadView('liberacion.pdfliberacion',compact('lista_actividades','liberacion','presidente', 'secretario'));


        return $pdf->download('Liberación.pdf');
    }
}
