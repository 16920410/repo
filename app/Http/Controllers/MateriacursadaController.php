<?php

namespace App\Http\Controllers;

use App\Models\Materiacursada;
use Illuminate\Http\Request;

/**
 * Class MateriacursadaController
 * @package App\Http\Controllers
 */
class MateriacursadaController extends Controller
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
        $materiacursadas = Materiacursada::paginate();

        return view('materiacursada.index', compact('materiacursadas'))
            ->with('i', (request()->input('page', 1) - 1) * $materiacursadas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiacursada = new Materiacursada();
        return view('materiacursada.create', compact('materiacursada'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Materiacursada::$rules);

        $materiacursada = Materiacursada::create($request->all());

        return redirect()->route('materiacursadas.index')
            ->with('success', 'Materiacursada created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materiacursada = Materiacursada::find($id);

        return view('materiacursada.show', compact('materiacursada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiacursada = Materiacursada::find($id);

        return view('materiacursada.edit', compact('materiacursada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Materiacursada $materiacursada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materiacursada $materiacursada)
    {
        request()->validate(Materiacursada::$rules);

        $materiacursada->update($request->all());

        return redirect()->route('materiacursadas.index')
            ->with('success', 'Materiacursada updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $materiacursada = Materiacursada::find($id)->delete();

        return redirect()->route('materiacursadas.index')
            ->with('success', 'Materiacursada deleted successfully');
    }
}
