<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Centro;
use App\Models\Jaula;
use App\Models\User;

class CreaObjeto extends Controller
{
    ########################### INGRESO ############################

    public function empresa(){
    	$empresa = new Empresa();

    	$empresa = Empresa::select('id', 'nombre_empresa')->get();

    	return view('admin.addCentro', compact('empresa'));
    }

	public function empresa_centro(){
    	$empresa = new Empresa();
    	$empresa = Empresa::select('id', 'nombre_empresa')->get();

    	return view('admin.addJaula', compact('empresa'));
    }

    public function centro_jaula(){
    	$empresa = new Empresa();
    	$empresa = Empresa::select('id', 'nombre_empresa')->get();

    	return view('admin.addMaquina', compact('empresa'));
    }

    public function centro(Request $request){

    	if($request->ajax()){
    		$centro = new Centro();
    		$centro = Centro::select('id','nombre_centro','ubicacion')->where('empresa', $request->empresa_id)->get();

    		$centroArray = array();
    		foreach ($centro as $cent){
    			$centroArray[$cent->id][0] = $cent->nombre_centro;
                $centroArray[$cent->id][1] = $cent->ubicacion;
    		}

    		return response($centroArray);
    	}

    }

    public function jaula(Request $request){

    	if($request->ajax()){
    		$jaula = new Jaula();
    		$jaula = Jaula::select('id','numero')->where('centro', $request->centro_id)->get();

    		$jaulaArray = array();
    		foreach ($jaula as $jaul){
    			$jaulaArray[$jaul->id] = $jaul->numero;
    		}

    		return response($jaulaArray);
    	}

    }

    ########################### VISUALIZACION ########################

    public function user(){
        $user = new User();
        $emp = new Empresa();

        $user = User::select('id', 'name','email','empresa', 'created_at')->where('tipo','!=','admin')->get();
        $emp = Empresa::select('nombre_empresa', 'id')->get();


        return view('admin.showUsers', compact('user','emp'));
    }

    public function empresa_show(){
        $empresa = new Empresa();

        $empresa = Empresa::select('id', 'nombre_empresa','created_at')->get();

        return view('admin.showEmpresas', compact('empresa'));
    }


}
