<?php

namespace App\Http\Controllers;

use App\Models\Convalidacione;
use Illuminate\Http\Request;

/**
 * Class ConvalidacioneController
 * @package App\Http\Controllers
 */
class ConvalidacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convalidaciones = Convalidacione::paginate();

        return view('convalidacione.index', compact('convalidaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $convalidaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $convalidacione = new Convalidacione();
        return view('convalidacione.create', compact('convalidacione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Convalidacione::$rules);

        $convalidacione = Convalidacione::create($request->all());

        return redirect()->route('convalidaciones.index')
            ->with('success', 'Convalidacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convalidacione = Convalidacione::find($id);

        return view('convalidacione.show', compact('convalidacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convalidacione = Convalidacione::find($id);

        return view('convalidacione.edit', compact('convalidacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Convalidacione $convalidacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convalidacione $convalidacione)
    {
        request()->validate(Convalidacione::$rules);

        $convalidacione->update($request->all());

        return redirect()->route('convalidaciones.index')
            ->with('success', 'Convalidacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $convalidacione = Convalidacione::find($id)->delete();

        return redirect()->route('convalidaciones.index')
            ->with('success', 'Convalidacione deleted successfully');
    }
}
