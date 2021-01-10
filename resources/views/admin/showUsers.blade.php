@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
	<div class="row">
		<div class="col s12">
			<h3 class="grey-text grey-darken-1 center">Listado de usuarios registrados en el sistema</h3>

			@for ($i = 0 ; $i < count($user) ; $i++)

			 <br>
			 <br>
       <div class="card grey darken-4">
        <div class="card-content white-text">
          <span class="card-title">{{$user[$i]->name}}</span>
          @for ($j = 0 ; $j < count($emp) ; $j++)
            @if($emp[$j]->id == $user[$i]->empresa)
              <h6 class="white-text"> {{ $emp[$j]->nombre_empresa}} </h6>
              @endif
          @endfor
          <h6 class="white-text">Registrado el {{ $user[$i]->created_at }} hrs</h6>  
        </div>
        <div class="card-action">
          @if ($user[$i]->empresa == "")
            <a class="blue btn modal-trigger" href="#modal{{ $i }}"><i class="material-icons right">add</i>Asignar a una empresa</a>
          @endif
          <a class="blue btn"onclick="elimina('{{ $user[$i]->id }}')"><i class="material-icons right">delete</i>Eliminar usuario</a>
        </div>
        <div id="modal{{ $i }}" class="modal grey darken-4">
          <form method="POST" action="/user/asigna/empresa">
            <input type="text" name="user_id" id="user_id" value="{{ $user[$i]->id }}" hidden>
            @csrf
            <div class="modal-content">
              <h5 class="white-text">Selecciona una empresa para asignar a {{ $user[$i]->name}}</h5>
              <select class="browser-default" id="select_empresa" name="select_empresa">
                @for ( $j = 0 ; $j < count($emp) ; $j++ )
                  <option value="{{ $emp[$j]->id }}">{{ $emp[$j]->nombre_empresa }}</option>
                @endfor
              </select>
            </div>
            <div class="modal-footer grey darken-3">
              <button type="submit" class="modal-close blue btn" >
                Asignar
              </button>
            </div>            
          </form>
        </div>

      </div>
			 
			@endfor			
		</div>		
	</div>
</div>

@endsection

<script type="text/javascript">
  function elimina(id){
    var opt1 = confirm("¿Está seguro que desea eliminar a este usuario?");
    if(opt1 == true){
      var opt2 = confirm("Esta acción no se puede deshacer, por favor confirme su decisión");

      if(opt2 == true){
        $.get('/user/borra', {id : id}, function(response){
          if(response[0] == "borrado"){
            location.href = "/exito";
          }  
        });
      }
    }

  }
</script>
