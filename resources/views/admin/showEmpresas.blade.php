@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
	<div class="row">
		<div class="col s12">
			<h3 class="grey-text grey-darken-1 center">Listado de empresas registradas en el sistema</h3>
			@for ($i = 0 ; $i < count($empresa) ; $i++)
			<br>
			<br>
			<div class="card blue-grey darken-1">
        <div class="card-content white-text">
          	<span class="card-title">{{$empresa[$i]->nombre_empresa}}</span>
          	<table>
          		<tr>
          			<td class="white-text"><strong>Fecha de registro: </strong></td>
          			<td class="white-text right">{{$empresa[$i]->created_at}}</td>
          		</tr>
          	</table>
       	</div>
        <div class="card-action">
            <a onclick="centros(<?php echo $empresa[$i]->id ?>)">Ver centros</a>
          	<a onclick="construccion()">Eliminar empresa</a>
        </div>
      </div>
      <div id="centros"></div>
      <div id="jaulas"></div>
			@endfor
			
		</div>
		
	</div>
</div>

@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">
  function centros(empresa_id){
    $.ajax({
      url : '/centro/obt',
      type : 'get',
      dataType : 'json',
      data : {
        empresa_id : empresa_id
      }
    })
    .done(function(response){
      if(response.length == 0){
        M.toast({html : "No hay centros registrados para esta empresa", classes : "rounded"})
      }
      else{
        var code = "<table class='card blue-grey darken-1 white-text'><thead><tr><th class='center'>Nombre del centro</th><th class='center'>Ubicacion</th></tr></thead><tbody>";
        $.each(response, function(index,value){
          code = code+"<tr><td class='center'>"+value[0]+"</td><td class='center'>"+value[1]+"</td></tr>";
        });
        code = code+"</tbody></table>";
        $('#centros').html(code);
      }
    })
  }
</script>


