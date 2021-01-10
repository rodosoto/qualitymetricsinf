@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
    <div class="row">
        <br><br><br>
        <div class="col s4"></div>
        <div class="col s4 grey darken-4">   

        <form method="POST" action="{{ route('add.maquina.bd') }}">
            @csrf

            <div class="col s12 center">
                <br>
                <img src="https://www.qualitymetrics.cl/img/logo-header.png" class="responsive-img">
            </div>
            <div class="col s12">
                <h6 class="white-text center">Registrar Máquina</h6>
                <br><br>
            </div>
 
            <div class="flex items-center mt-4">
                <select class="browser-default white-text grey darken-4" id="empresa_select" name="empresa">
                    <option value="" disabled selected>Selecciona una empresa</option>
                    @for ($i = 0 ; $i < count($empresa) ; $i++)
                        <option value="{{ $empresa[$i]->id }}">{{ $empresa[$i]->nombre_empresa }}</option>
                    @endfor
                </select>
            </div>
            <br>

            <div class="flex items-center mt-4">
            	<select class="browser-default white-text grey darken-4" id="centro_select" name="centro_select">
            		<option value=''>--Se llenará cuando seleccione una empresa--</option>
            	</select>
            	
            </div>
            <br>

            <div class="flex items-center mt-4">
            	<select class="browser-default white-text grey darken-4" id="jaula_select" name="jaula_select">
            		<option value=''>--Se llenará cuando seleccione un centro--</option>
            	</select>
            	
            </div>
            <br><br>

            <div class="input-field col s12">
                <input  id="tipo" name="tipo" type="text" class="validate white-text" value="{{old('tipo')}}" required autofocus autocomplete="tipo">
                <label class="white-text" for="tipo" value="{{ __('Tipo') }}">{{ __('Tipo de máquina') }}</label>
            </div>

            <div class="input-field col s12">
                <input  id="modelo" name="modelo" type="text" class="validate white-text" value="{{old('modelo')}}" required autofocus autocomplete="modelo">
                <label class="white-text" for="modelo" value="{{ __('Modelo') }}">{{ __('Id de máquina') }}</label>
            </div>

            <div class="input-field col s12">
                <input  id="nombre_maquina" name="nombre_maquina" type="text" class="validate white-text" value="{{old('nombre_maquina')}}" required autofocus autocomplete="nombre_maquina">
                <label class="white-text" for="nombre_maquina" value="{{ __('Nombre de la máquina') }}">{{ __('Nombre de la máquina') }}</label>
            </div>
            <div class="col s12 center">
                <br>
                <button type="submit" class="gblue btn center">
                    <i class="material-icons right">save</i>Registrar Máquina
                </button>
                <br><br>
            </div>
            </div>
        </div>
    </div>        
</div>

@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#empresa_select').delay(200).on('change', function(){
				var empresa_id = $(this).val();

				if($.trim(empresa_id)!=""){
					$.get('/centro/obt/', {empresa_id : empresa_id}, function(centros){
						$('#centro_select').empty();
						if(centros.length == 0){
							$('#centro_select').append("<option value='' >No hay centros registrados</option>");
						}
						else{
							$('#centro_select').append("<option value='' >Selecciona un centro</option>");

							$.each(centros, function(index,value){
								$('#centro_select').append("<option value='"+  index +"'>"+ value[0]+", "+value[1] +"</option>");
							});
						}
						

					});
				}
			});
			$('#centro_select').delay(200).on('change', function(){
				var centro_id = $(this).val();

				if($.trim(centro_id)!=""){
					$.get('/jaula/obt/', {centro_id : centro_id}, function(jaulas){
						$('#jaula_select').empty();
						if(jaulas.length == 0){
							$('#jaula_select').append("<option value='' >No hay jaulas registradas</option>");
						}
						else{
							$('#jaula_select').append("<option value='' >Selecciona una jaula</option>");

							$.each(jaulas, function(index,value){
								$('#jaula_select').append("<option value='"+  index[0] +"'>n: "+ value[0] +"</option>");
							});
						}
						

					});
				}
			});
		});
	</script>