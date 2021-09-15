<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conductor;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $conductores = DB::table('conductor as con')->select('con.*', DB::Raw("CONCAT(con.primerNombre, ' ', con.segundoNombre) as nombres"), 'ciu.nombreCiudad as ciudad')
            ->join('ciudad as ciu', 'ciu.id', 'con.idCiudad')->get();

            return view('conductor.index')->with('conductores', $conductores);
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
        $ciudades = DB::table('ciudad')->select('*')->get();
        return view('conductor.create')->with('ciudades', $ciudades);
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
            'cedula' => 'required',
            'pNombre' => 'required',
            'sNombre' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'ciudad' =>'required',
        ]);
        
        try {
            $conductor = new Conductor();

            $conductor->numeroCedula = $request->get('cedula');
            $conductor->primerNombre = $request->get('pNombre');
            $conductor->segundoNombre = $request->get('sNombre');
            $conductor->apellidos = $request->get('apellidos');
            $conductor->direccion = $request->get('direccion');
            $conductor->telefono = $request->get('telefono');
            $conductor->idCiudad = $request->get('ciudad');

            $conductor->save();

            return redirect('/conductor');
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
