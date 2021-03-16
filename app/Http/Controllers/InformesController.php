<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MedFilExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Medicionfilete;
use App\Models\Centro;

class InformesController extends Controller
{
    public function medicion_filete(){

    	return Excel::download(new MedFilExport,'Filetes.xlsx');

    }

    public function medicion_filetePDF(){
    	$medicion = Medicionfilete::all();
    	$pdf = PDF::loadview('informes.medfiletepdf', compact('medicion'))->setPaper("A3", "landscape");
    	return $pdf->download('Filetes.pdf');
    }

    public function reporte_pdf(){

        $med = Medicionfilete::select('id')->get();
        $med = count($med);

        $cent = Centro::select('id')->get();
        $cent = count($cent);

        $resp = array();
        $resp[0] = $med;
        $resp[1] = $cent;
    	return view('informes.reporte', compact('resp'));
    }

    public function reporte_anio(Request $request){

        $resp = array();

        //Cantidad de filetes analizados
        $total_filetes = Medicionfilete::select('id')->where('created_at', '>=',$request->anio1.'-'.$request->dia1.'-'.$request->mes1)->orwhere('created_at', '<',$request->anio2.'-'.$request->dia2.'-'.$request->mes2)->where('empresa',$request->empresa)->get();
        $resp[0] = count($total_filetes);

        //cantidad de centros analizados
        $centros = Medicionfilete::select('centro')->distinct()->where('created_at', '>=',$request->anio1.'-'.$request->dia1.'-'.$request->mes1)->orwhere('created_at', '<',$request->anio2.'-'.$request->dia2.'-'.$request->mes2)->where('empresa',$request->empresa)->get();

        $resp[1] = count($centros);

        //fechas

        $resp[2] = $request->dia1."/".$request->mes1."/".$request->anio1;
        $resp[3] = $request->dia2."/".$request->mes2."/".$request->anio2;

        //porcentaje de filetes por centro


        $text_porcentaje = "https://quickchart.io/chart?c={type:'pie',data:{labels:[";

        for( $i = 0 ; $i < count($centros) ; $i++ ){

            $num_med = Medicionfilete::select('id')->where('centro',$centros[$i]->centro)->where('created_at', '>=',$request->anio1.'-'.$request->dia1.'-'.$request->mes1)->orwhere('created_at', '<',$request->anio2.'-'.$request->dia2.'-'.$request->mes2)->where('empresa',$request->empresa)->get();
            $num_med = count($num_med);
            $resp[4][$i] = $num_med;

            if($i == count($centros)-1){
                $text_porcentaje = $text_porcentaje."'".$centros[$i]->centro."'";
            }
            else{
                $text_porcentaje = $text_porcentaje."'".$centros[$i]->centro."',";
            }
        }
        $text_porcentaje = $text_porcentaje."],datasets:[{label:'Centros' ,data:[";

        for( $i = 0 ; $i < count($centros) ; $i++ ){
            $porc = (100*$resp[4][$i])/$resp[0];

            if($i == count($centros)-1){
                $text_porcentaje = $text_porcentaje.$porc; 
            }
            else{
                $text_porcentaje = $text_porcentaje.$porc.","; 
            }
            
        }
        $text_porcentaje = $text_porcentaje."]}]}}";
        $resp[5] = $text_porcentaje;
    


        $nombre = 'Reporte_'.$request->anio.'_'.$request->empresa.'.pdf';

        $pdf2 = PDF::loadview('informes.reporte', compact('resp'))->setPaper("A4", "landscape");

        return $pdf2->stream($nombre);
        
    }
}
