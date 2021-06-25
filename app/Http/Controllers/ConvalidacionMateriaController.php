<?php

namespace App\Http\Controllers;

use App\Models\ConvalidacionMateria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ConvalidacionMateriaController
 * @package App\Http\Controllers
 */
class ConvalidacionMateriaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        
        if ((request()->all()['materia_cursada']!= null) && (request()->all()['materia_cursada'] == request()->all()['materia_convalidada'])) 
        {
            # code...
            request()->merge(['porcentaje'=>100]);
        }
        // var_dump($request->all());

        // exit();
        $validated = request()->validate(ConvalidacionMateria::$rules);

        $convalidacion = ConvalidacionMateria::create($validated);

        $tablaP = DB::table('porcentajes');
        // insertar nuevo registro de porcentaje si no existe
        $porcentaje = $tablaP->where('materia_externa', $convalidacion->materia_cursada)->where('materia_interna', $convalidacion->materia_convalidada);
        if (!$porcentaje->exists() && !($convalidacion->materia_cursada == $convalidacion->materia_convalidada)){
            $insert = $tablaP->insert(['materia_externa'=>$convalidacion->materia_cursada,
            'materia_interna'=>$convalidacion->materia_convalidada,
            'porcentaje'=>$convalidacion->porcentaje]);
        }


        return redirect()->route('convalidaciones.edit',['convalidacione'=>$convalidacion->convalidacion_id])
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
        $convalidacione = ConvalidacionMateria::find($id);

        return view('convalidacione.show', compact('convalidacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $planes = PlanEstudio::all()->pluck('nombre','id');
    //     $tecnologicos = Tecnologico::all()->pluck('nombre','id');
    //     $convalidacione = Convalidacione::find($id);
    //     $materias_cursadas = MateriasPlan::where('plan_id', $convalidacione->plan_externo)->join('materias','materias.id','=','materias_plan.materia_id');
    //     $materias_convalidar= MateriasPlan::where('plan_id', $convalidacione->plan_interno)->join('materias','materias.id','=','materias_plan.materia_id');

    //     return view('convalidacione.edit', compact('convalidacione','materias_cursadas','materias_convalidar','planes','tecnologicos'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Convalidacione $convalidacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConvalidacionMateria $convalidacione)
    {
        request()->validate(ConvalidacionMateria::$rules);

        $convalidacione->update($request->all());

        return redirect()->route('convalidaciones.index')
            ->with('success', 'Convalidacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($convalidacione, $convalidacion_materia)
    {
        // var_dump($convalidacione, $convalidacion_materia);
        // exit();
        $convalidacion = ConvalidacionMateria::where('id',$convalidacion_materia)->delete();
        
        return redirect()->route('convalidaciones.edit',['convalidacione'=>$convalidacione])
        ->with('success', 'Convalidacione deleted successfully');
    }
    // materias-convalidadas
    public function materiasConvalidadas($cursada, $convalidada){

        $porcentajes = DB::table('porcentajes')->where('materia_externa',$cursada)->where('materia_interna', $convalidada)->get();
        $arr = [];
        return response()->json($porcentajes);
    }
    
}
