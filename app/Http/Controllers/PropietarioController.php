<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Propietario;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $propietarios = DB::table('propietario as pro')->select('pro.*', DB::Raw("CONCAT(pro.primerNombre, ' ', pro.segundoNombre) as nombres"), 'ciu.nombreCiudad as ciudad')
            ->join('ciudad as ciu', 'ciu.id', 'pro.idCiudad')->get();

            return view('propietario.index')->with('propietarios', $propietarios);
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
        return view('propietario.create')->with('ciudades', $ciudades);
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
            $propietarios = new Propietario();

            $propietarios->numeroCedula = $request->get('cedula');
            $propietarios->primerNombre = $request->get('pNombre');
            $propietarios->segundoNombre = $request->get('sNombre');
            $propietarios->apellidos = $request->get('apellidos');
            $propietarios->direccion = $request->get('direccion');
            $propietarios->telefono = $request->get('telefono');
            $propietarios->idCiudad = $request->get('ciudad');

            $propietarios->save();

            return redirect('/propietario');
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
