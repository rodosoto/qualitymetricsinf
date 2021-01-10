<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquina; 
use App\Models\User;
use App\Models\MaquinaUsuarios;
use App\Models\Empresa;
use App\Models\Centro;
use App\Models\Jaula;

class GeneralController extends Controller
{
	public function cargando(){
        return view('admin.registroE');
    }

    public function maquina_ver(){
    	$maquina = new Maquina();
    	$maquina = Maquina::select('id','nombre', 'modelo', 'estado','ultima_medicion')->get();

    	return view('dashboard', compact('maquina'));
    }

    public function agrega_empresa(Request $request){
    	$emp = new Empresa();

    	$emp->nombre_empresa = $request->name;

    	$emp->save();

    	return redirect('/exito');
    }

    public function agrega_centro(Request $request){
        $cent = new Centro();
        $cent->nombre_centro = $request->name;
        $cent->ubicacion = $request->ubicacion;
        $cent->empresa = $request->empresa;

        $cent->save();

        return redirect('/exito');
    }

    public function agrega_jaula(Request $request){
        $jaula = new Jaula();

        $jaula->numero = $request->numero;
        $jaula->centro = $request->centro_select;

        $jaula->save();

        return redirect('/exito');
    }

    public function agrega_maquina(Request $request){
        $maquina = new Maquina();

        $maquina->nombre = $request->nombre_maquina;
        $maquina->tipo = $request->tipo;
        $maquina->modelo = $request->modelo;
        $maquina->jaula = $request->centro_select;
        $maquina->centro = $request->jaula_select;
        $maquina->empresa = $request->empresa;
        $maquina->estado = "off";

        $maquina->save();

        return redirect('/exito');
    }



}
