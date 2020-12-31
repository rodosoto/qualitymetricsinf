<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicionfilete;
use App\Models\Medicionpece;
use App\Models\Medicionmaquinasf;
use App\Models\Medicionmaquinasp;
use App\Models\Jaula;
use App\Models\Centro;
use App\Models\Empresa;
use App\Models\Maquina;


class ApiController extends Controller
{
    public function recibe(Request $request){

    	$centro_json = $request->centro;
    	$jaula_json = $request->jaula;
    		
    	//creacion de objetos para hacer consulta eloquent
    	$centro = new Centro();
    	$jaula = new Jaula();

    	$centro = Centro::select('id')->where('nombre_centro', $centro_json)->get();
    	if(empty($centro)){
    		return json_encode(array(
    			'status' => 'error'
    		));
    	}

    	$jaula = Jaula::select('id')->where('numero',$jaula_json)->get();
    	if(empty($jaula)){
    		return json_encode(array(
    			'status' => 'error'
    		));
    	}

    	//sectionCod ultimos 3 digitos son de la maquina

    	$sectionCod = $request->input('sectionCod');
    	$caracteres = preg_split('//', $sectionCod, -1, PREG_SPLIT_NO_EMPTY);
    	$maquina = $caracteres[3].$caracteres[4].$caracteres[5];
    	if($caracteres[0]=='f' || $caracteres[0]=='F'){ 
    		
    		//Creacion de objeto medicion filete
    		$medicion = new Medicionfilete();
    		$medicion->sectionCod = $sectionCod;
    		$medicion->barcode = $request->barcode;
    		$medicion->centro = $centro[0]->id;
    		$medicion->jaula = $jaula[0]->id;
    		$medicion->colorEntero = $request->colorEntero;
    		$medicion->colorLomo = $request->colorLomo;
    		$medicion->colorBelly = $request->colorBelly; 
            $medicion->colorNCQ = $request->colorNCQ; 
            $medicion->longFilete = $request->longFilete; 
            $medicion->areaFilete = $request->areaFilete; 
            $medicion->areaGap = $request->areaGap; 
            $medicion->ptosGap = $request->ptosGap; 
            $medicion->areaMel = $request->areaMel; 
            $medicion->ptosMel = $request->ptosMel; 
            $medicion->areaHem = $request->areaHem; 
            $medicion->puntosHem = $request->ptosHem; 
            $medicion->mapaCoordFilete = json_encode($request->mapaCoord);

            if($medicion->save()){
            	$med_maquina = new Medicionmaquinasf();
            	$maquina_ = new Maquina(); //auxiliar para el id de la maquina
            	$medID = new Medicionfilete(); //auxiliar para saber id del ultimo ingresado

            	$medID = Medicionfilete::select('id')->orderBy('id','desc')->get();
            	$medicion->id = $medID[0]->id;

            	$maquina_ = Maquina::select('id')->where('modelo', $maquina)->get();
            	$id_maquina = $maquina_[0]->id;


            	$med_maquina->id_medicion = $medicion->id;
            	$med_maquina->id_maquina = $id_maquina;

            	if($med_maquina->save()){
            		return json_encode(array(
            			'status' => 'succes'
                    );
            	}
            }

            else{
            	return json_encode(array(
    				'status' => 'error'
    			));
    		}


    		
    	}
    	else if ($caracteres[0]=='e' || $caracteres[0]=='E'){
    		$medicion = new Medicionpece();
    		$medicion->sectionCod = $sectionCod;
    		$medicion->barcode = $request->barcode;
    		$medicion->centro = $centro[0]->id;
    		$medicion->jaula = $jaula[0]->id;
    		$medicion->madurez = $request->madurez;
    		$medicion->deformidad = $request->deformidad;
    		$medicion->longPez = $request->longPez;
    		$medicion->areaPez = $request->areaPez;
    		$medicion->areaHerida = $request->areaHerida;
    		$medicion->ptosHerida = $request->ptosHerida;
    		$medicion->areaPet = $request->areaPet;
    		$medicion->ptosPet = $request->ptosPet;
    		$medicion->mapaCoordPez = json_encode($request->mapaCoord);

    		if($medicion->save()){
    			$med_maquina = new Medicionmaquinasp();
            	$maquina_ = new Maquina(); //auxiliar para el id de la maquina
            	$medID = new Medicionpece(); //auxiliar para saber id del ultimo ingresado

            	$medID = Medicionpece::select('id')->orderBy('id','desc')->get();
            	$medicion->id = $medID[0]->id;

            	$maquina_ = Maquina::select('id')->where('modelo', $maquina)->get();
            	$id_maquina = $maquina_[0]->id;


            	$med_maquina->id_medicion = $medicion->id;
            	$med_maquina->id_maquina = $id_maquina;

            	if($med_maquina->save()){
            		return json_encode(array(
            			'status' => 'succes'
            		));
            	}
    		}
    	}
    }
}
