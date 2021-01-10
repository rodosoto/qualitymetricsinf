<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Centro;
use App\Models\Jaula;
use App\Models\User;
use App\Models\Maquina;
use App\Models\MaquinaUsuario;

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
    		$jaula = Jaula::select('id','numero','created_at','updated_at')->where('centro', $request->centro_id)->get();

    		$jaulaArray = array();
    		foreach ($jaula as $jaul){
    			$jaulaArray[$jaul->id][0] = $jaul->numero;
                $jaulaArray[$jaul->id][1] = $jaul->created_at;
                $jaulaArray[$jaul->id][2] = $jaul->updated_at;

    		}

    		return response($jaulaArray);
    	}

    }

    ########################### VISUALIZACION ########################

    public function dashboard(){

        $maquina = new Maquina();
        $maquina = Maquina::select('id','tipo','modelo','nombre','estado','centro','empresa','jaula','created_at','updated_at','ultima_medicion')->get();

        $empresa = new Empresa();
        $empresa = Empresa::select('id','nombre_empresa')->get();

        $centro = new Centro();
        $centro = Centro::select('id','nombre_centro', 'ubicacion','empresa')->get();

        $jaula = new Jaula();
        $jaula = Jaula::select('id', 'numero')->get();

        return view('dashboard', compact('maquina', 'empresa', 'centro', 'jaula'));
    }

    public function user(){
        $user = new User();
        $emp = new Empresa();

        $user = User::select('id', 'name','email','empresa', 'created_at')->where('tipo','user')->get();
        $emp = Empresa::select('nombre_empresa', 'id')->get();


        return view('admin.showUsers', compact('user','emp'));
    }

    public function empresa_show(){
        $empresa = new Empresa();

        $empresa = Empresa::select('id', 'nombre_empresa','created_at')->get();

        return view('admin.showEmpresas', compact('empresa'));
    }

    public function assignMaquina(){

        $relacion = new MaquinaUsuario();
        $relacion = MaquinaUsuario::select('id_usuario','id_maquina')->get();

        $maquina = new Maquina();
        $maquina = Maquina::select('empresa','id','tipo','modelo','nombre','estado','centro','jaula','created_at','updated_at')->get();

        $empresa = new Empresa();
        $empresa = Empresa::select('id','nombre_empresa')->get();

        $centro = new Centro();
        $centro = Centro::select('id','nombre_centro', 'ubicacion')->get();

        $jaula = new Jaula();
        $jaula = Jaula::select('id', 'numero')->get();

        $user = new User();
        $user = User::select('id', 'empresa','name')->get();

        return view('admin/asigMaquinaUser', compact('maquina', 'empresa', 'centro', 'jaula','user','relacion'));
    }

    public function empresa_maquina(Request $request){

        if($request->ajax()){

            $maquina = new Maquina();
            $maquina = Maquina::select('id','tipo','modelo','nombre','estado','centro','jaula','created_at','updated_at')->where('empresa', $request->empresa_id)->get();

            $MaquinaArray = array();
            foreach ($maquina as $maq){
                $MaquinaArray[$maq->id][0] = $maq->tipo;
                $MaquinaArray[$maq->id][1] = $maq->modelo;
                $MaquinaArray[$maq->id][2] = $maq->nombre;
                $MaquinaArray[$maq->id][3] = $maq->estado;
                $MaquinaArray[$maq->id][4] = $maq->centro;
                $MaquinaArray[$maq->id][5] = $maq->jaula;
                $MaquinaArray[$maq->id][6] = $maq->created_at;
            }

            return response($MaquinaArray);
        }

    }

    public function centro_maquina(Request $request){

        if($request->ajax()){

            $maquina = new Maquina();
            $maquina = Maquina::select('id','tipo','modelo','nombre','estado','centro','jaula','created_at','updated_at')->where('centro', $request->centro_id)->get();

            $MaquinaArray = array();
            foreach ($maquina as $maq){
                $MaquinaArray[$maq->id][0] = $maq->tipo;
                $MaquinaArray[$maq->id][1] = $maq->modelo;
                $MaquinaArray[$maq->id][2] = $maq->nombre;
                $MaquinaArray[$maq->id][3] = $maq->estado;
                $MaquinaArray[$maq->id][4] = $maq->centro;
                $MaquinaArray[$maq->id][5] = $maq->jaula;
                $MaquinaArray[$maq->id][6] = $maq->created_at;
            }

            return response($MaquinaArray);
        }

    }

    

    public function tabla_centro(Request $request){

        if($request->ajax()){

            $centro = new Centro();
            $centro = Centro::select('id', 'nombre_centro', 'ubicacion')->where('empresa', $request->empresa)->get();

            $centroArray = array();

            for ( $aux = 0 ; $aux < count($centro) ; $aux++ ) {
                $centroArray[$aux][0] = $centro[$aux]->id;
                $centroArray[$aux][1] = $centro[$aux]->nombre_centro;
                $centroArray[$aux][2] = $centro[$aux]->ubicacion;

            }

            return response($centroArray);
        }

    }
    

    public function tabla_jaulas(Request $request){

        if($request->ajax()){


            $jaula = new Jaula();
            $jaula = Jaula::select('id','numero','centro')->where('empresa',$request->empresa)->get();

            $jaulaArray = array();

            $centro = new Centro();
            $centro = Centro::select('id', 'nombre_centro', 'ubicacion')->where('empresa', $request->empresa)->get();

            for ( $aux = 0 ; $aux < count($jaula) ; $aux++ ) {
                for ($i = 0 ; $i < count($centro) ; $i++ ){
                    if($centro[$i]->id == $jaula[$aux]->centro){
                        $name = $centro[$i]->nombre_centro.", ".$centro[$i]->ubicacion;
                        $jaulaArray[$aux][2] = $name;
                    }
                }
                $jaulaArray[$aux][0] = $jaula[$aux]->id;
                $jaulaArray[$aux][1] = $jaula[$aux]->numero;

            }

            return response($jaulaArray);
        }

    }

    public function jaula_maquina(Request $request){

        if($request->ajax()){

            $maquina = new Maquina();
            $maquina = Maquina::select('id','tipo','modelo','nombre','estado','centro','jaula','created_at','updated_at')->where('jaula', $request->jaula_id)->get();

            $MaquinaArray = array();
            foreach ($maquina as $maq){
                $MaquinaArray[$maq->id][0] = $maq->tipo;
                $MaquinaArray[$maq->id][1] = $maq->modelo;
                $MaquinaArray[$maq->id][2] = $maq->nombre;
                $MaquinaArray[$maq->id][3] = $maq->estado;
                $MaquinaArray[$maq->id][4] = $maq->centro;
                $MaquinaArray[$maq->id][5] = $maq->jaula;
                $MaquinaArray[$maq->id][6] = $maq->created_at;
            }

            return response($MaquinaArray);
        }

    }

    public function assigUser(Request $request){

        $relacion = new MaquinaUsuario();

        $relacion->id_maquina = $request->id_maquina;
        $relacion->id_usuario = $request->id_user;

        if($relacion->save()){
            $response = "ingresado";

            return redirect('/exito');;
        }
        else{
            return response("error");
        }
    }

    public function borra_maquina(Request $request){

        $machine = new Maquina();
        $machine = Maquina::where('id', $request->id)->delete();

        $relacion = new MaquinaUsuario();
        $relacion = MaquinaUsuario::where('id_maquina', $request->id)->delete();

        $resp = array();
        $resp[0] = "borrado";

        return response($resp);       

    }

    public function jaula_borra(Request $request){

        $jaula = new Jaula();
        $jaula = Jaula::where('id', $request->id)->delete();

        $resp = array();
        $resp[0] = "borrado";

        return response($resp);       

    }

    public function centro_borra(Request $request){

        $centro = new Centro();
        $centro = Centro::where('id', $request->id)->delete();

        $resp = array();
        $resp[0] = "borrado";

        return response($resp);       

    }

    public function borra_empresa(Request $request){

        $empresa = new Empresa();
        $centro = new Centro();
        $jaula = new Jaula();
        $machine = new Maquina();        
              
        $machine = Maquina::where('empresa', $request->id)->delete();
        $jaula = Jaula::where('empresa', $request->id)->delete();  
        $centro = Centro::where('empresa', $request->id)->delete();
        $empresa = Empresa::where('id', $request->id)->delete();

        $resp = array();
        $resp[0] = "borrado";

        return response($resp);       

    }

    public function asigna_user_empresa(Request $request){

        $user = new User();

        $user = User::select('id','empresa')->where('id', $request->user_id)->update(['empresa' =>$request->select_empresa]);

        return redirect('/exito');

    }

    public function user_borra(Request $request){

        $user = new User();
        $user = User::where('id', $request->id)->delete();

        $resp = array();
        $resp[0] = "borrado";

        return response($resp);       

    }


}
