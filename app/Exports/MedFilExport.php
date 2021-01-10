<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Medicionfilete;

class MedFilExport implements FromView
{
    public function view(): View
    {
    	$medicion = Medicionfilete::all();
    	return view('informes.medfileteexcel', compact('medicion'));
    }
}
