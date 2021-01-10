<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MedFilExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Medicionfilete;

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
}
