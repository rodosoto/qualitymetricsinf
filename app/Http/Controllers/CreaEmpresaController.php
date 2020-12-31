<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class CreaEmpresaController extends Controller
{
    public function agrega(Request $request){
    	$emp = new Empresa();

    	$emp->nombre_empresa = $request->name;

    	$emp->save();

    	return view('/dashboard');
    }
}
