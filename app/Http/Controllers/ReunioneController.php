<?php

namespace App\Http\Controllers;

use App\Models\Reunione;
use Illuminate\Http\Request;

/**
 * Class ReunioneController
 * @package App\Http\Controllers
 */
class ReunioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reuniones = Reunione::paginate();

        return view('reunione.index', compact('reuniones'))
            ->with('i', (request()->input('page', 1) - 1) * $reuniones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reunione = new Reunione();
        return view('reunione.create', compact('reunione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reunione::$rules);

        $reunione = Reunione::create($request->all());

        return redirect()->route('reuniones.index')
            ->with('success', 'Reunione created successfully.');
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

        return view('reunione.edit', compact('reunione'));
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

        $reunione->update($request->all());

        return redirect()->route('reuniones.index')
            ->with('success', 'Reunione updated successfully');
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
            ->with('success', 'Reunione deleted successfully');
    }
}
