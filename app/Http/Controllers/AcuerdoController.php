<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reunione;
use App\Models\Acuerdos;
use App\Models\Ordenes;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * Class ReunioneController
 * @package App\Http\Controllers
 */
class AcuerdoController extends Controller
{
    /**
     * Display a listing of the resources.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $acuerdos = Acuerdos::paginate();

        return view('acuerdos.index', compact('acuerdos'))
            ->with('i', (request()->input('page', 1) - 1) * $acuerdos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Reunione $reunione)
    {
        $reunion = $reunione;
        // var_dump($reunion);
        // exit();
        $nacuerdo = new Acuerdos();
        $ordenes= Ordenes::where('reunion_id',$reunion->id)->pluck('descripcion','id');
        $acuerdos = Acuerdos::where('reunion_id', $reunion->id)->get();
        // var_dump($ordenes);
        // exit();
        $num_orden = count($acuerdos) + 1;
        return view('reunione.acuerdoform', compact('acuerdos', 'reunion', 'ordenes', 'nacuerdo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Reunione $reunione, Request $request)
    {
        $request->merge(['reunion_id' => $reunione->id]);
        
        $validation = $request->validate(Acuerdos::$rules);
        $id = $reunione->id;
        var_dump($request->all(), $validation);
        // exit();
        $acuerdo = Acuerdos::create($validation);
        $req = $request->all();

        return redirect()->route('reuniones.acuerdos.create', ['reunione' => $id])
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

        return view('reunione.edit', compact('reunione', 'docentes', 'asistentes', 'listaAsistentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reunione $reunione
     * @return \Illuminate\Http\Response
     */
    public function update(Reunione $reunione, $acuerdo)
    {
        $request = request();
        $request->merge(['reunion_id' => $reunione->id]);
        $request->merge(['id' => $acuerdo]);
        $validated = $request->validate(Acuerdos::$rules);
        $acuerdo = Acuerdos::where('id', $acuerdo)->where('reunion_id', $reunione->id);

        switch ($request->submitbutton) {
            case 'Eliminar':
                $acuerdo->delete();
                return redirect()->route('reuniones.acuerdos.create', ['reunione' => $reunione->id])
                    ->with('success', 'Orden deleted successfully');

                break;

            case 'Actualizar':

                $acuerdo->update($validated);
                return redirect()->route('reuniones.acuerdos.create', ['reunione' => $reunione->id])
                    ->with('success', 'Orden updated successfully');
                break;
        }
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
            ->with('success', 'Reunion deleted successfully');
    }

}
