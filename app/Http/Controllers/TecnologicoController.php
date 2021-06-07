<?php

namespace App\Http\Controllers;

use App\Models\Tecnologico;
use Illuminate\Http\Request;

/**
 * Class TecnologicoController
 * @package App\Http\Controllers
 */
class TecnologicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologicos = Tecnologico::paginate();

        return view('tecnologico.index', compact('tecnologicos'))
            ->with('i', (request()->input('page', 1) - 1) * $tecnologicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tecnologico = new Tecnologico();
        return view('tecnologico.create', compact('tecnologico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tecnologico::$rules);

        $tecnologico = Tecnologico::create($request->all());

        return redirect()->route('tecnologicos.index')
            ->with('success', 'Tecnologico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnologico = Tecnologico::find($id);

        return view('tecnologico.show', compact('tecnologico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tecnologico = Tecnologico::find($id);

        return view('tecnologico.edit', compact('tecnologico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tecnologico $tecnologico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnologico $tecnologico)
    {
        request()->validate(Tecnologico::$rules);

        $tecnologico->update($request->all());

        return redirect()->route('tecnologicos.index')
            ->with('success', 'Tecnologico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tecnologico = Tecnologico::find($id)->delete();

        return redirect()->route('tecnologicos.index')
            ->with('success', 'Tecnologico deleted successfully');
    }
}
