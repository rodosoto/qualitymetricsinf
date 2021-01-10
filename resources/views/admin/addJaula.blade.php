@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
    <div class="row">
        <br><br><br>
        <div class="col s4"></div>
        <div class="col grey darken-4">   

        <form method="POST" action="{{ route('add.jaula.bd') }}">
            @csrf

            <div class="col s12 center">
                <br>
                <img src="https://www.qualitymetrics.cl/img/logo-header.png" class="responsive-img">
            </div>
            <div class="col s12">
                <h6 class="white-text center">Registrar Jaula</h6>
                <br><br><br>
            </div>

            <div class="flex items-center mt-4">
                <select id="empresa_select" name="empresa" class="browser-default white-text grey darken-4">
                    <option value="" disabled selected>Selecciona una empresa</option>
                    @for ($i = 0 ; $i < count($empresa) ; $i++)
                        <option value="{{ $empresa[$i]->id }}">{{ $empresa[$i]->nombre_empresa }}</option>
                    @endfor
                </select>
                <label></label>
            </div>
            <br>

            <div class="flex items-center mt-4">
            	<select id="centro_select" name="centro_select" class="browser-default white-text grey darken-4">
            		<option value=''>--Se llenará cuando escoja una empresa--</option>
            	</select>
            	
            </div>
            <br><br>

            <div class="input-field col s12">
                <input  id="numero" name="numero" type="text" class="validate white-text" value="{{old('numero')}}" required autofocus autocomplete="numero">
                <label class="white-text" for="numero" value="{{ __('Número de jaula') }}">{{ __('Número de jaula') }}</label>
            </div>


            <div class="col s12 center">
                <br>
                <button type="submit" class="blue btn center">
                    <i class="material-icons right">save</i>Registrar Jaula
                </button>
                <br><br>
            </div>
        </form>
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
		});
	</script>


