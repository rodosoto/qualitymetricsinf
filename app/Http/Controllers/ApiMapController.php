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
use App\Models\Mapafiletes;

class ApiMapController extends Controller
{
    public function recibe(Request $request){

    	$sectionCod = $request->input('sectionCod');
    	$caracteres = preg_split('//', $sectionCod, -1, PREG_SPLIT_NO_EMPTY);
    	$maquina = "FL".$caracteres[4].$caracteres[5].$caracteres[6];

    	$verifica = Mapafiletes::where('barcode', $request->barcode)->get();

    	if($verifica[0]->barcode != ""){

    		$nuevoMap = new Mapafiletes();
    		$nuevoMap->barcode = $request->barcode;
    		$nuevoMap->maquina = $request->maquina;
    		$nuevoMap->mapHem = $request->mapHem;
    		$nuevoMap->mapMel = $request->mapMel;
    		$nuevoMap->mapGap = $request->mapGap;

    		if($nuevoMap->save()){
    			return json_encode(array(
            		'status' => 'succes'
                ));
    		}
    		else{
    			return json_encode(array(
            		'status' => 'error'
                ));
    		}
    	}

    	else{
    		$update = Mapafiletes::where('barcode', $request->barcode)->update(['mapHem' => $request->mapHem])->update(['mapMel' => $request->mapMel])->update(['mapGap' => $request->mapGap]);
    	}
    }
}
