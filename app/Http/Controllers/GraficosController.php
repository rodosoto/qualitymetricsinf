<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicionfilete;
use App\Models\Medicionmaquinasf;

class GraficosController extends Controller
{
    public function graficosBarra(Request $request){
    	if($request->ajax()){

    		$med = new Medicionmaquinasf();
    		$med = Medicionmaquinasf::select('id_medicion')->where('id_maquina',$request->id)->get();

    		$info = new Medicionfilete();

    		$resp = array();

                    
            for ( $i = 20 ; $i < 35 ; $i++){
                $resp[$i][0] = Medicionfilete::select('id')->where('colorEntero',$i)->get();
                $resp[$i][0] = count($resp[$i][0]);

                $resp[$i][1] = Medicionfilete::select('id')->where('colorLomo',$i)->get();
                $resp[$i][1] = count($resp[$i][1]);

                $resp[$i][2] = Medicionfilete::select('id')->where('colorBelly',$i)->get();
                $resp[$i][2] = count($resp[$i][2]);

                $resp[$i][3] = Medicionfilete::select('id')->where('colorNCQ',$i)->get();
                $resp[$i][3] = count($resp[$i][3]);
            }
            

    		return response($resp);
    	}
    }

    public function graficosDonut(request $request){

        $resp = array();

        $resp[0] = Medicionfilete::select('id')->get();
        $resp[0] = count($resp[0]);

        $resp[1] = Medicionfilete::select('id')->where('ptosGap','0')->get();
        $resp[1] = count($resp[1]);

        $resp[2] = Medicionfilete::select('id')->where('ptosMel','0')->get();
        $resp[2] = count($resp[2]);

        $resp[3] = Medicionfilete::select('id')->where('puntosHem','0')->get();
        $resp[3] = count($resp[3]);

        return response($resp);
    }
}
