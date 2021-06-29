<?php

namespace App\Http\Controllers;

use App\Models\MateriasPlan;
use App\Models\PlanEstudio;
use App\Models\PlanEstudios;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

/**
 * Class PlanEstudioController
 * @package App\Http\Controllers
 */
class PlanEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planEstudios = PlanEstudio::paginate();

        return view('plan-estudio.index', compact('planEstudios'))
            ->with('i', (request()->input('page', 1) - 1) * $planEstudios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planEstudio = new PlanEstudio();
        return view('plan-estudio.create', compact('planEstudio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PlanEstudio::$rules);

        $planEstudio = PlanEstudio::create($request->all());
        $id = $planEstudio->id;

        return redirect()->route('plan-estudios.materias-plan.create',['plan_estudio'=>$id])
            ->with('success', 'PlanEstudio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planEstudio = PlanEstudio::find($id);

        return view('plan-estudio.show', compact('planEstudio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planEstudio = PlanEstudio::find($id);

        return view('plan-estudio.edit', compact('planEstudio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PlanEstudio $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanEstudio $planEstudio)
    {
        request()->validate(PlanEstudio::$rules);

        $planEstudio->update($request->all());

        return redirect()->route('plan-estudios.materias-plan.create',['plan_estudio'=>$planEstudio->id])
            ->with('success', 'PlanEstudio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($plan_estudio)
    {
        try{
            PlanEstudio::find($plan_estudio)->delete();
        }
        catch(QueryException $err){
            
            return redirect()->route('plan-estudios.index')
            ->with('success', 'El plan es usado por una o más convalidaciones');

        }
        // var_dump($plan_estudio);
        // exit();


        return redirect()->route('plan-estudios.index')
            ->with('success', 'PlanEstudio deleted successfully');
    }
}
