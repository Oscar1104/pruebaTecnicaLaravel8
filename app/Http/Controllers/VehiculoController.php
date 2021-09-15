<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $vehiculos = DB::table('vehiculo as veh')->select('veh.*', 
                    DB::Raw("CONCAT(con.primerNombre, ' ', con.apellidos) as conductor, CONCAT(pro.primerNombre, ' ', pro.apellidos) as propietario"))
                    ->join('conductor as con', 'con.id', 'veh.idConductor')
                    ->join('propietario as pro', 'pro.id', 'veh.idPropietario')->get();

            return view('vehiculo.index')->with('vehiculos', $vehiculos);
        } catch (\Exception $e) {
            echo 'Error en la base de datos '. $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conductores = DB::table('conductor')->select('id', DB::Raw("CONCAT(primerNombre, ' ', segundoNombre, ' ', apellidos) as nombre"))->get();
        $propietarios = DB::table('propietario')->select('id', DB::Raw("CONCAT(primerNombre, ' ', segundoNombre, ' ', apellidos) as nombre"))->get();
        return view('vehiculo.create')->with('conductores', $conductores)->with('propietarios', $propietarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'placa' => 'required',
            'color' => 'required',
            'marca' => 'required',
            'tipo' => 'required',
            'conductor' => 'required',
            'propietario' => 'required',
        ]);

        try {
            $vehiculo = new Vehiculo();

            $vehiculo->placa = $request->get('placa');
            $vehiculo->color = $request->get('color');
            $vehiculo->marca = $request->get('marca');
            $vehiculo->tipo = $request->get('tipo');
            $vehiculo->idConductor = $request->get('conductor');
            $vehiculo->idPropietario = $request->get('propietario');

            $vehiculo->save();

            return redirect('/vehiculo');
        } catch (\Exception $e) {
            echo 'Error en la base de datos '. $e->getMessage(); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
