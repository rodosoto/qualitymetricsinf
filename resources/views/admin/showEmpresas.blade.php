@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
	<div class="row">
		<div class="col s12">
			<h3 class="grey-text grey-darken-1 center">Listado de empresas registradas en el sistema</h3>
      <br><br><br><br>
			@for ($i = 0 ; $i < count($empresa) ; $i++)
      
      <div class="col s12 ">
        <div class="card grey darken-4 z-depth-3">
          <div class="card-content white-text">
            <span class="card-title white-text">{{$empresa[$i]->nombre_empresa}}</span>
            <table >
              <tr>
                <td class="white-text">Fecha de registro: </td>
                <td class="white-text right">{{$empresa[$i]->created_at}}</td>
              </tr>
            </table>
          </div>
          <div class="card-action">
            <a class="white-text btn blue modal-trigger" href="#modal1" onclick="centros(<?php echo $empresa[$i]->id ?>)"><i class="material-icons right">format_list_bulleted</i>Ver centros</a>

            <a class="white-text btn blue" onclick="borrar('{{ $empresa[$i]->id }}')"><i class="material-icons right">delete</i>Eliminar empresa</a>
          </div>
        </div>        
      </div>
      <div id="modal1" class="modal grey darken-4">
        <div class="modal-content">
          <div id="centros"></div>
        </div>
        <div class="modal-footer grey darken-3">
          <a href="#!" class="modal-close blue btn">Listo!</a>
        </div>
      </div>

      <div id="modal2" class="modal grey darken-4">
        <div class="modal-content">
          <div id="jaulas"></div>
        </div>
        <div class="modal-footer grey darken-3">
          <a href="#!" class="modal-close blue btn">Listo!</a>
        </div>
      </div>
      
      
			@endfor
			
		</div>
		
	</div>
</div>

@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">
  function borrar(id){
    var opt1 = confirm("Estas a punto de eliminar esta Empresa y con ella todos los centros, jaulas y maquinas asociadas, ¿estas seguro?");
    if (opt1 == true){
      var opt2 = confirm("Esta acción no se puede deshacer, confirma tu decisión");
        if(opt2 == true){
          $.get('/empresa/borra', {id : id}, function(response){
            if(response[0] == "borrado"){
              location.href = "/exito";
            }  
          });
        }
      }
    }

  function jaulas(centro_id){
    $.ajax({
      url : '/jaula/obt',
      type : 'get',
      dataType : 'json',
      data : {
        centro_id : centro_id
      }
    })
    .done(function(response){
      if(response.length == 0){
        M.toast({html : "No hay jaulas registrados para esta empresa", classes : "rounded"})
      }
      else{
        var code = "<table class='card grey darken-4 z-depth-3 white-text'><thead><tr><th class='center'>Numero de la jaula</th><th class='center'>Registrada el</th></tr></thead><tbody>";
        $.each(response, function(index,value){
          code = code+"<tr><td class='center'>"+value[0]+"</td><td class='center'>"+value[1]+"</td></tr>";
        });
        code = code+"</tbody></table>";
        $('#jaulas').html(code);
      }
    })
  }
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
        var code = "<table class='card grey darken-4 z-depth-3 white-text'><thead><tr><th class='center'>Nombre del centro</th><th class='center'>Ubicacion</th><th>Ver jaulas</th></tr></thead><tbody>";
        $.each(response, function(index,value){
          code = code+"<tr><td class='center'>"+value[0]+"</td><td class='center'>"+value[1]+"</td><td><a onclick='jaulas("+index+")' class='white-text btn blue modal-trigger' href='#modal2'><i class='material-icons right'>format_list_bulleted</i>Ver listado de jaulas</a></td></tr>";
        });
        code = code+"</tbody></table>";
        $('#centros').html(code);
      }
    })
  }
</script>


