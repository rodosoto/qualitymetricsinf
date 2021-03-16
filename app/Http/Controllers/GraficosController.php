<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicionfilete;
use App\Models\Medicionmaquinasf;
use App\Models\Mapafilete;
use Carbon\Carbon;
use App\Models\Maquina;
use App\Models\User;

class GraficosController extends Controller
{

    public function mapHematomas(Request $request){

        if($request->ajax()){

            $carbon = new \Carbon\Carbon();
            $date = Carbon::now();
            $date = $date->format('Y-m-d');
            $sectionCod = "";

            $maquina = Maquina::select('tipo','modelo')->where('id',$request->id)->get();
            if($maquina[0]->tipo == 'filete' ){
                $sectionCod = "FL".$maquina[0]->modelo;
            }
            if($maquina[0]->tipo == 'Filete'){
                $sectionCod = "FL".$maquina[0]->modelo;
            }

            $map = new Mapafilete();
            $map = Mapafilete::where('created_at','LIKE','%'.$date.'%')->where('maquina',$sectionCod)->get();

            if(count($map) == 0){
                return response('vacio');
            }
            else{
                $respArray = array();

            for ( $i = 0 ; $i < count($map) ; $i++ ){
                $respArray[0][$i] = $map[$i]->barcode;
                $respArray[1][$i] = $map[$i]->mapHem;
            }

            return response($respArray);
            }            
        }
    }

    public function mapGaping(Request $request){

        if($request->ajax()){
            $carbon = new \Carbon\Carbon();
            $date = Carbon::now();
            $date = $date->format('Y-m-d');

            $maquina = Maquina::select('tipo','modelo')->where('id',$request->id)->get();
            if($maquina[0]->tipo == 'filete' ){
                $sectionCod = "FL".$maquina[0]->modelo;
            }
            if($maquina[0]->tipo == 'Filete'){
                $sectionCod = "FL".$maquina[0]->modelo;
            }

            $map = new Mapafilete();
            $map = Mapafilete::where('maquina',$sectionCod)->where('created_at','LIKE','%'.$date.'%')->get();

            if(count($map) == 0){
                return response('vacio');
            }
            else{
               $respArray = array();

                for ( $i = 0 ; $i < count($map) ; $i++ ){
                    $respArray[0][$i] = $map[$i]->barcode;
                    $respArray[1][$i] = $map[$i]->mapGap;
                }

                return response($respArray); 
            }
            
        }
    }

    public function mapMelanosis(Request $request){

        if($request->ajax()){
            $carbon = new \Carbon\Carbon();
            $date = Carbon::now();
            $date = $date->format('Y-m-d');

            $maquina = Maquina::select('tipo','modelo')->where('id',$request->id)->get();
            if($maquina[0]->tipo == 'filete' ){
                $sectionCod = "FL".$maquina[0]->modelo;
            }
            if($maquina[0]->tipo == 'Filete'){
                $sectionCod = "FL".$maquina[0]->modelo;
            }

            $map = new Mapafilete();
            $map = Mapafilete::where('maquina',$sectionCod)->where('created_at','LIKE','%'.$date.'%')->get();

            if(count($map) == 0){
                return response('vacio');
            }
            else{
                $respArray = array();

                for ( $i = 0 ; $i < count($map) ; $i++ ){
                    $respArray[0][$i] = $map[$i]->barcode;
                    $respArray[1][$i] = $map[$i]->mapMel;
                }

                return response($respArray);
            }
        }
    }

    public function graficosBarra(Request $request){
        if($request->ajax()){
            $carbon = new \Carbon\Carbon();
            $date = Carbon::now();
            $date = $date->format('Y-m-d');
            $med = new Medicionfilete();
            $med = Medicionfilete::select('id')->where('maquina',$request->id)->where('created_at', 'LIKE','%'.$date.'%')->get();
            $resp = array();
            if( $request->empresa!=""){
                for ( $i = 20 ; $i < 35 ; $i++){
                    $resp[$i][0] = Medicionfilete::select('id')->where('colorEntero',$i)->where('maquina',$request->id)->where('empresa',$request->empresa)->where('created_at', 'LIKE','%'.$date.'%')->get();
                    $resp[$i][0] = count($resp[$i][0]);

                    $resp[$i][1] = Medicionfilete::select('id')->where('colorLomo',$i)->where('maquina',$request->id)->where('empresa',$request->empresa)->where('created_at', 'LIKE','%'.$date.'%')->get();
                    $resp[$i][1] = count($resp[$i][1]);

                    $resp[$i][2] = Medicionfilete::select('id')->where('colorBelly',$i)->where('maquina',$request->id)->where('empresa',$request->empresa)->where('created_at', 'LIKE','%'.$date.'%')->get();
                    $resp[$i][2] = count($resp[$i][2]);

                    $resp[$i][3] = Medicionfilete::select('id')->where('colorNCQ',$i)->where('maquina',$request->id)->where('empresa',$request->empresa)->where('created_at', 'LIKE','%'.$date.'%')->get();
                    $resp[$i][3] = count($resp[$i][3]);
                }

                $resp[0][0] = count($med);
            

                return response($resp);
            }
            else if($request->empresa==""){
                return response("vacio");
            }

                    
            
        }
    }

    public function graficosDonut(request $request){

        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        $resp = array();

        if($request->empresa != ""){
            $resp[0] = Medicionfilete::select('id')->where('maquina',$request->id)->where('empresa',$request->empresa)->whereDate('created_at','=',$date)->get();
            $resp[0] = count($resp[0]);

            $resp[1] = Medicionfilete::select('id')->where('maquina',$request->id)->where('empresa',$request->empresa)->whereDate('created_at','=',$date)->where('ptosGap','0')->get();
            $resp[1] = count($resp[1]);

            $resp[2] = Medicionfilete::select('id')->where('maquina',$request->id)->where('empresa',$request->empresa)->whereDate('created_at','=',$date)->where('ptosMel','0')->get();
            $resp[2] = count($resp[2]);

            $resp[3] = Medicionfilete::select('id')->where('maquina',$request->id)->where('empresa',$request->empresa)->whereDate('created_at','=',$date)->where('puntosHem','0')->get();
            $resp[3] = count($resp[3]);

            return response($resp);
        }

        else if($request->empresa==""){
            return response("vacio");
        }
    }
}
