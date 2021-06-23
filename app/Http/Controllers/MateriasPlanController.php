<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Materias;
use App\Models\MateriasPlan;
use App\Models\PlanEstudios;
use App\Models\PlanEstudio;
use Illuminate\Http\Request;

/**
 * Class MateriasPlanController
 * @package App\Http\Controllers
 */
class MateriasPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiasPlans = MateriasPlan::paginate();

        return view('materias-plan.index', compact('materiasPlans'))
            ->with('i', (request()->input('page', 1) - 1) * $materiasPlans->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param PlanEstudios $plan
     * @return \Illuminate\Http\Response
     */
    public function create($plan)
    {
        $materias = Materia::all()->pluck('clave','id');
        $planEstudio = PlanEstudios::find($plan);
        $planes = MateriasPlan::where('plan_id',$plan)->get();
        // $plan = $planEstudio;
        // var_dump($plan, $planEstudio);
        // var_dump($materias);
        // exit();
        $materiasPlan = new MateriasPlan();
        return view('materias-plan.create', compact('planEstudio','materias','plan','planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MateriasPlan::$rules);

        $materiasPlan = MateriasPlan::create($request->all());

        return redirect()->route('plan-estudios.materias-plan.create',['plan_estudio'=> $materiasPlan->plan_id])
            ->with('success', 'MateriasPlan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materiasPlan = MateriasPlan::find($id);

        return view('materias-plan.show', compact('materiasPlan'));
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
        $materiasPlan = MateriasPlan::where('plan_id',$id);

        return view('materias-plan.edit', compact('materiasPlan','id','planEstudio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PlanEstudios $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanEstudios $plan)
    {

        request()->validate(MateriasPlan::$rules);

        $materias= MateriasPlan::where('plan_id', $plan->id)
        
        ->update($request->all());

        return redirect()->route('materias-plans.index')
            ->with('success', 'MateriasPlan updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($plan_estudio,$materias_plan)
    {
        // var_dump($plan_estudio, $materias_plan);
        $materiasPlan = MateriasPlan::where('plan_id',$plan_estudio)->where('materia_id',$materias_plan)->delete();

        return redirect()->route('plan-estudios.materias-plan.create',['plan_estudio'=>$plan_estudio])
            ->with('success', 'MateriasPlan deleted successfully');
    }
}
