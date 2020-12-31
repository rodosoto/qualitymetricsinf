@extends('layouts.plantilla')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
	<div class="row">
    	<div class="col s12 m6">
      		<div class="card blue-grey darken-1">
        		<div class="card-content white-text">
          			<span class="card-title">Id: '{{$user->id}}'</span>
          			<p><strong>Nombre empresa: </strong>'{{$user->nombres}}'.</p>
        		</div>
        		<div class="card-action">
          			<a >Editar</a>
        		</div>
      		</div>
    	</div>
  	</div>
</div>
@endsection

@extends('layouts.footer')