<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquina; 
use App\Models\User;
use App\Models\MaquinaUsuarios;
use App\Models\Empresa;
use App\Models\Centro;
use App\Models\Jaula;
use App\Models\Medicionfilete;

class GeneralController extends Controller
{
	public function cargando(){
        return view('admin.registroE');
    }

    public function reportes(){

        $centros = Centro::select('nombre_centro', 'id')->get();
        $centro = array();
        foreach($centros as $cent){
            $centro[$cent->id] = $cent->nombre_centro;
        }
        return view('reportes.general', compact('centro'));
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

    public function rellena_fecha(Request $request){

        $med = new Medicionfilete();
        $med = Medicionfilete::selectRaw('YEAR(created_at) as date')->distinct()->where('empresa', $request->empresa)->get();

        $medicion = new Medicionfilete();
        $medicion = Medicionfilete::select('id')->where('empresa', $request->empresa)->get();

        $respArray = array();

        $respArray[0][0] = count($medicion);

        for( $i = 0 ; $i < count($med) ; $i++ ){
            $respArray[1][$i] = $med[$i]->date;
        }

        for ( $i = 20 ; $i < 35 ; $i++){
                $respArray[$i][0] = Medicionfilete::select('id')->where('empresa', $request->empresa)->where('colorEntero',$i)->get();
                $respArray[$i][0] = count($respArray[$i][0]);

                $respArray[$i][1] = Medicionfilete::select('id')->where('empresa', $request->empresa)->where('colorLomo',$i)->get();
                $respArray[$i][1] = count($respArray[$i][1]);

                $respArray[$i][2] = Medicionfilete::select('id')->where('empresa', $request->empresa)->where('colorBelly',$i)->get();
                $respArray[$i][2] = count($respArray[$i][2]);

                $respArray[$i][3] = Medicionfilete::select('id')->where('empresa', $request->empresa)->where('colorNCQ',$i)->get();
                $respArray[$i][3] = count($respArray[$i][3]);
            }


        return response($respArray);
    }

    public function rellena_mes(Request $request){

        $med = new Medicionfilete();
        $med = Medicionfilete::selectRaw('MONTH(created_at) as date')->where('created_at','LIKE', '%'.$request->anio.'%')->distinct()->get();

        $medicion = new Medicionfilete();
        $medicion = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->get();

        $respArray = array();

        $respArray[0][0] = count($medicion);


        for ( $i = 0 ; $i < count($med) ; $i++ ){
            $respArray[1][$i] = $med[$i]->date;
        }

        
        for ( $i = 20 ; $i < 35 ; $i++){
                $respArray[$i][0] = Medicionfilete::select('id')->where('colorEntero',$i)->get();
                $respArray[$i][0] = count($respArray[$i][0]);

                $respArray[$i][1] = Medicionfilete::select('id')->where('colorLomo',$i)->get();
                $respArray[$i][1] = count($respArray[$i][1]);

                $respArray[$i][2] = Medicionfilete::select('id')->where('colorBelly',$i)->get();
                $respArray[$i][2] = count($respArray[$i][2]);

                $respArray[$i][3] = Medicionfilete::select('id')->where('colorNCQ',$i)->get();
                $respArray[$i][3] = count($respArray[$i][3]);
            }




        return response($respArray);
    }

    public function rellena_dia(Request $request){

        $med = new Medicionfilete();
        $med = Medicionfilete::selectRaw('DAY(created_at) as date')->whereYear('created_at',$request->anio)->whereMonth('created_at', $request->mes)->distinct()->get();

        $medicion = new Medicionfilete();
        $medicion = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at', $request->mes)->get();

        $respArray = array();

        $respArray[0][0] = count($medicion);


        for ( $i = 0 ; $i < count($med) ; $i++ ){
            $respArray[1][$i] = $med[$i]->date;
        }

        
        for ( $i = 20 ; $i < 35 ; $i++){
                $respArray[$i][0] = Medicionfilete::select('id')->where('colorEntero',$i)->get();
                $respArray[$i][0] = count($respArray[$i][0]);

                $respArray[$i][1] = Medicionfilete::select('id')->where('colorLomo',$i)->get();
                $respArray[$i][1] = count($respArray[$i][1]);

                $respArray[$i][2] = Medicionfilete::select('id')->where('colorBelly',$i)->get();
                $respArray[$i][2] = count($respArray[$i][2]);

                $respArray[$i][3] = Medicionfilete::select('id')->where('colorNCQ',$i)->get();
                $respArray[$i][3] = count($respArray[$i][3]);
            }


        return response($respArray);
    }

    public function rellena_centro(Request $request){

        $mes = "";
        if($request->mes>0 && $request->mes<10){
            $mes = "0".$request->mes;
        }

        $med = new Medicionfilete();
        $med = Medicionfilete::select('centro')->whereYear('created_at',$request->anio)->whereMonth('created_at', $request->mes)->whereDay('created_at',$request->dia)->distinct()->get();

        $medicion = new Medicionfilete();
        $medicion = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->get();

        $respArray = array();

        $respArray[0][0] = count($medicion);


        for ( $i = 0 ; $i < count($med) ; $i++ ){
            $respArray[1][$i] = $med[$i]->centro;
        }

        
        for ( $i = 20 ; $i < 35 ; $i++){
                $respArray[$i][0] = Medicionfilete::select('id')->where('colorEntero',$i)->get();
                $respArray[$i][0] = count($respArray[$i][0]);

                $respArray[$i][1] = Medicionfilete::select('id')->where('colorLomo',$i)->get();
                $respArray[$i][1] = count($respArray[$i][1]);

                $respArray[$i][2] = Medicionfilete::select('id')->where('colorBelly',$i)->get();
                $respArray[$i][2] = count($respArray[$i][2]);

                $respArray[$i][3] = Medicionfilete::select('id')->where('colorNCQ',$i)->get();
                $respArray[$i][3] = count($respArray[$i][3]);
            }




        return response($respArray);
    }

    public function rellena_centro2(Request $request){


        $med = new Medicionfilete();
        $med = Medicionfilete::select('centro')->where('empresa', $request->empresa)->whereYear('created_at',$request->anio)->distinct()->get();

        $medicion = new Medicionfilete();
        $medicion = Medicionfilete::select('id')->where('empresa', $request->empresa)->whereYear('created_at',$request->anio)->get();

        $respArray = array();

        $respArray[0][0] = count($medicion);


        for ( $i = 0 ; $i < count($med) ; $i++ ){
            $respArray[1][$i] = $med[$i]->centro;
        }

        
        for ( $i = 20 ; $i < 35 ; $i++){
                $respArray[$i][0] = Medicionfilete::select('id')->where('empresa', $request->empresa)->where('colorEntero',$i)->get();
                $respArray[$i][0] = count($respArray[$i][0]);

                $respArray[$i][1] = Medicionfilete::select('id')->where('colorLomo',$i)->where('empresa', $request->empresa)->get();
                $respArray[$i][1] = count($respArray[$i][1]);

                $respArray[$i][2] = Medicionfilete::select('id')->where('colorBelly',$i)->where('empresa', $request->empresa)->get();
                $respArray[$i][2] = count($respArray[$i][2]);

                $respArray[$i][3] = Medicionfilete::select('id')->where('colorNCQ',$i)->where('empresa', $request->empresa)->get();
                $respArray[$i][3] = count($respArray[$i][3]);
            }

        return response($respArray);
    }

    public function NombreCentro(){
        $centro = Centro::select('id','nombre_centro')->get();

        $respArray = array();

        for ( $i = 0 ; $i < count($centro) ; $i++ ){
            $respArray[$i][0] = $centro[$i]->id;
            $respArray[$i][1] = $centro[$i]->nombre_centro;
        }

        return response($respArray);
    }

    public function rellena_jaula(Request $request){

        if($request->dia == "-- dia --" && $request->mes == "-- mes --"){
            $med = Medicionfilete::select('jaula')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->where('centro',$request->centro)->distinct()->get();

            $medicion = new Medicionfilete();
            $medicion = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('centro',$request->centro)->get();

            $respArray = array();
            $respArray[0][0] = count($medicion);

            for ( $i = 0 ; $i < count($med) ; $i++ ){
                $respArray[1][$i] = $med[$i]->jaula;
            }        
            for ( $i = 20 ; $i < 35 ; $i++){
                $respArray[$i][0] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->where('colorEntero',$i)->get();
                $respArray[$i][0] = count($respArray[$i][0]);

                $respArray[$i][1] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->where('colorLomo',$i)->get();
                $respArray[$i][1] = count($respArray[$i][1]);

                $respArray[$i][2] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->where('colorBelly',$i)->get();
                $respArray[$i][2] = count($respArray[$i][2]);

                $respArray[$i][3] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->where('colorNCQ',$i)->get();
                $respArray[$i][3] = count($respArray[$i][3]);
            }
            return response($respArray);
        }

        else{
            $mes = "";
            if($request->mes>0 && $request->mes<10){
                $mes = "0".$request->mes;
            }
            $med = Medicionfilete::select('jaula')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at', $request->dia)->where('empresa',$request->empresa)->where('centro',$request->centro)->distinct()->get();

            $medicion = new Medicionfilete();
            $medicion = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at', $request->dia)->where('empresa',$request->empresa)->where('centro',$request->centro)->get();

            $respArray = array();
            $respArray[0][0] = count($medicion);

            for ( $i = 0 ; $i < count($med) ; $i++ ){
                $respArray[1][$i] = $med[$i]->jaula;
            }        
            for ( $i = 20 ; $i < 35 ; $i++){
                $respArray[$i][0] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->where('colorEntero',$i)->get();
                $respArray[$i][0] = count($respArray[$i][0]);

                $respArray[$i][1] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->where('colorLomo',$i)->get();
                $respArray[$i][1] = count($respArray[$i][1]);

                $respArray[$i][2] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->where('colorBelly',$i)->get();
                $respArray[$i][2] = count($respArray[$i][2]);

                $respArray[$i][3] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->where('colorNCQ',$i)->get();
                $respArray[$i][3] = count($respArray[$i][3]);
            }
            return response($respArray);
        }
    }

    public function limitaPorJaula(Request $request){

        $mes = "";
        if($request->mes>0 && $request->mes<10){
            $mes = "0".$request->mes;
        }


        $medicion = new Medicionfilete();
        $medicion = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('centro',$request->centro)->where('jaula',$request->jaula)->get();

        $respArray = array();

        $respArray[0][0] = count($medicion);
        
        for ( $i = 20 ; $i < 35 ; $i++){
                $respArray[$i][0] = Medicionfilete::select('id')->where('colorEntero',$i)->get();
                $respArray[$i][0] = count($respArray[$i][0]);

                $respArray[$i][1] = Medicionfilete::select('id')->where('colorLomo',$i)->get();
                $respArray[$i][1] = count($respArray[$i][1]);

                $respArray[$i][2] = Medicionfilete::select('id')->where('colorBelly',$i)->get();
                $respArray[$i][2] = count($respArray[$i][2]);

                $respArray[$i][3] = Medicionfilete::select('id')->where('colorNCQ',$i)->get();
                $respArray[$i][3] = count($respArray[$i][3]);
            }




        return response($respArray);
    }

    public function donutGeneral(Request $request){

        $resp = array();

        $resp[0] = Medicionfilete::select('id')->where('empresa', $request->empresa)->get();
        $resp[0] = count($resp[0]);

        $resp[1] = Medicionfilete::select('id')->where('empresa', $request->empresa)->where('ptosGap','0')->get();
        $resp[1] = count($resp[1]);

        $resp[2] = Medicionfilete::select('id')->where('empresa', $request->empresa)->where('ptosMel','0')->get();
        $resp[2] = count($resp[2]);

        $resp[3] = Medicionfilete::select('id')->where('empresa', $request->empresa)->where('puntosHem','0')->get();
        $resp[3] = count($resp[3]);

        return response($resp);
    }

    public function donutAnio(Request $request){

        $resp = array();

        $resp[0] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->get();
        $resp[0] = count($resp[0]);

        $resp[1] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('ptosGap','0')->get();
        $resp[1] = count($resp[1]);

        $resp[2] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('ptosMel','0')->get();
        $resp[2] = count($resp[2]);

        $resp[3] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('puntosHem','0')->get();
        $resp[3] = count($resp[3]);

        return response($resp);
    }

    public function donutMes(Request $request){

        $resp = array();

        $resp[0] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->get();
        $resp[0] = count($resp[0]);

        $resp[1] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('ptosGap','0')->get();
        $resp[1] = count($resp[1]);

        $resp[2] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('ptosMel','0')->get();
        $resp[2] = count($resp[2]);

        $resp[3] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('puntosHem','0')->get();
        $resp[3] = count($resp[3]);

        return response($resp);
    }

    public function donutDia(Request $request){

        $resp = array();

        $resp[0] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->get();
        $resp[0] = count($resp[0]);

        $resp[1] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('ptosGap','0')->get();
        $resp[1] = count($resp[1]);

        $resp[2] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('ptosMel','0')->get();
        $resp[2] = count($resp[2]);

        $resp[3] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('puntosHem','0')->get();
        $resp[3] = count($resp[3]);

        return response($resp);
    }

    public function donutCentro(Request $request){

        if($request->dia == "-- dia --" && $request->mes == "-- mes --"){
            $resp = array();

            $resp[0] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('empresa',$request->empresa)->where('centro',$request->centro)->get();
            $resp[0] = count($resp[0]);

            $resp[1] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('ptosGap','0')->get();
            $resp[1] = count($resp[1]);

            $resp[2] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('ptosMel','0')->get();
            $resp[2] = count($resp[2]);

            $resp[3] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('puntosHem','0')->get();
            $resp[3] = count($resp[3]);

            return response($resp);
        }
        if($request->dia == "-- dia --"){
            $resp = array();

            $resp[0] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('empresa',$request->empresa)->where('centro',$request->centro)->get();
            $resp[0] = count($resp[0]);

            $resp[1] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('ptosGap','0')->get();
            $resp[1] = count($resp[1]);

            $resp[2] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('ptosMel','0')->get();
            $resp[2] = count($resp[2]);

            $resp[3] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('puntosHem','0')->get();
            $resp[3] = count($resp[3]);

            return response($resp);
        }
        else{
            $resp = array();

            $resp[0] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('centro',$request->centro)->where('empresa',$request->empresa)->get();
            $resp[0] = count($resp[0]);

            $resp[1] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('centro',$request->centro)->where('ptosGap','0')->where('empresa',$request->empresa)->get();
            $resp[1] = count($resp[1]);

            $resp[2] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('centro',$request->centro)->where('ptosMel','0')->where('empresa',$request->empresa)->get();
            $resp[2] = count($resp[2]);

            $resp[3] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('centro',$request->centro)->where('puntosHem','0')->where('empresa',$request->empresa)->get();
            $resp[3] = count($resp[3]);

            return response($resp);
        }
    }

    public function donutJaula(Request $request){        

        if($request->dia == "-- dia --" && $request->mes == "-- mes --"){

            $resp = array();

            $resp[0] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('jaula',$request->jaula)->get();
            $resp[0] = count($resp[0]);

            $resp[1] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('jaula',$request->jaula)->where('ptosGap','0')->get();
            $resp[1] = count($resp[1]);

            $resp[2] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('jaula',$request->jaula)->where('ptosMel','0')->get();
            $resp[2] = count($resp[2]);

            $resp[3] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('jaula',$request->jaula)->where('puntosHem','0')->get();
            $resp[3] = count($resp[3]);

            return response($resp);
        }
        else if($request->dia == "-- dia --"){

            $resp = array();

            $resp[0] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('jaula',$request->jaula)->get();
            $resp[0] = count($resp[0]);

            $resp[1] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('jaula',$request->jaula)->where('ptosGap','0')->get();
            $resp[1] = count($resp[1]);

            $resp[2] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('jaula',$request->jaula)->where('ptosMel','0')->get();
            $resp[2] = count($resp[2]);

            $resp[3] = Medicionfilete::select('id')->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->where('empresa',$request->empresa)->where('centro',$request->centro)->where('jaula',$request->jaula)->where('puntosHem','0')->get();
            $resp[3] = count($resp[3]);

            return response($resp);
        }
        else{

            $resp = array();
            $resp[0] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('centro',$request->centro)->where('jaula',$request->jaula)->get();
            $resp[0] = count($resp[0]);

            $resp[1] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('centro',$request->centro)->where('jaula',$request->jaula)->where('ptosGap','0')->get();
            $resp[1] = count($resp[1]);

            $resp[2] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('centro',$request->centro)->where('jaula',$request->jaula)->where('ptosMel','0')->get();
            $resp[2] = count($resp[2]);

            $resp[3] = Medicionfilete::select('id')->where('empresa',$request->empresa)->whereYear('created_at',$request->anio)->whereMonth('created_at',$request->mes)->whereDay('created_at',$request->dia)->where('centro',$request->centro)->where('jaula',$request->jaula)->where('puntosHem','0')->get();
            $resp[3] = count($resp[3]);

            return response($resp);
        }

        
    }


    public function rellena_anio1(Request $request){

        $anios = Medicionfilete::selectRaw('YEAR(created_at) as date')->where('empresa', $request->empresa)->distinct()->get();

        $resp = array();

        $resp[3] = count($anios);

        for ( $i = 0 ; $i < count($anios) ; $i++ ){
            $resp[0][$i] = $anios[$i]->date;
            
        }

        return response($resp);

    }

    public function rellena_anio2(Request $request){

        $anios = Medicionfilete::selectRaw('YEAR(created_at) as date')->whereYear('created_at', '>=' ,$request->anio )->where('empresa', $request->empresa)->distinct()->get();

        $resp = array();

        $resp[3] = count($anios);

        for ( $i = 0 ; $i < count($anios) ; $i++ ){
            $resp[0][$i] = $anios[$i]->date;
            
        }

        return response($resp);

    }

    public function rellena_mes1(Request $request){

        $meses = Medicionfilete::selectRaw('MONTH(created_at) as date')->whereYear('created_at', $request->anio)->where('empresa', $request->empresa)->distinct()->get();

        $resp = array();

        $resp[3] = count($meses);

        for ( $i = 0 ; $i < count($meses) ; $i++ ){
            $resp[0][$i] = $meses[$i]->date;
            
        }

        return response($resp);

    }

    public function rellena_mes2(Request $request){

        $meses = Medicionfilete::selectRaw('MONTH(created_at) as date')->whereYear('created_at', '>=', $request->anio)->whereMonth('created_at', '>=', $request->mes)->where('empresa', $request->empresa)->distinct()->get();

        $resp = array();

        $resp[3] = count($meses);

        for ( $i = 0 ; $i < count($meses) ; $i++ ){
            $resp[0][$i] = $meses[$i]->date;
            
        }

        return response($resp);

    }

    public function rellena_dia1(Request $request){

        $dias = Medicionfilete::selectRaw('DAY(created_at) as date')->whereYear('created_at', $request->anio)->whereMonth('created_at', $request->mes)->where('empresa', $request->empresa)->distinct()->get();

        $resp = array();

        $resp[3] = count($dias);

        for ( $i = 0 ; $i < count($dias) ; $i++ ){
            $resp[0][$i] = $dias[$i]->date;
            
        }

        return response($resp);

    }

    public function rellena_dia2(Request $request){

        $dias = Medicionfilete::selectRaw('DAY(created_at) as date')->distinct()->whereYear('created_at', $request->anio)->whereMonth('created_at', $request->mes)->whereDay('created_at', '>=', $request->dia)->where('empresa', $request->empresa)->get();

        $resp = array();

        $resp[3] = count($dias);

        for ( $i = 0 ; $i < count($dias) ; $i++ ){
            $resp[0][$i] = $dias[$i]->date;
            
        }

        return response($resp);

    }




}
