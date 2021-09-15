<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        try {
            $registros = DB::table('vehiculo as veh')->select('veh.placa', 'veh.marca', 
            DB::Raw("CONCAT(con.primerNombre, ' ', con.segundoNombre, ' ', con.apellidos) as conductor, CONCAT(pro.primerNombre, ' ', pro.segundoNombre, ' ', pro.apellidos) as propietario"))
            ->join('conductor as con', 'con.id', 'veh.idConductor')
            ->join('propietario as pro', 'pro.id', 'veh.idPropietario')->get();

            return view('vista')->with('registros', $registros);
        } catch (\Exception $e) {
            echo 'Error en la base de datos '. $e->getMessage();
        }
    }
}
