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
			<div class="card blue-grey darken-1">
        		<div class="card-content white-text">
          			<span class="card-title">{{$user[$i]->name}}</span>
          			<table>
          				<tr>        					
          					<td><strong>Empresa: </strong></td>
          					<td class="right">
          						@if (is_null($user[$i]->empresa))
          							<p>Este usuario no esta asignado a una empresa, <button onclick="construccion()">Asignar ahora</button></p>         		
          						@else

          						@php
          							$aux = $user[$i]->empresa;
          						@endphp
          							{{$emp[$aux]->nombre_empresa}}
          						@endif

          						
          					</td>
          				</tr>
          				<tr>
          					
          					<td><strong>E-mail: </strong></td>
          					<td class="right">{{$user[$i]->email}}</td>
          				</tr>
          				<tr>
          					<td><strong>Fecha de registro: </strong></td>
          					<td class="right">{{$user[$i]->created_at}}</td>
          				</tr>
          			</table>
       			</div>
        		<div class="card-action">
        			<a onclick="construccion()">Asignar Maquina</a>
          			<a onclick="construccion()">Ver maquinas asignadas</a>
          			<a onclick="construccion()">Eliminar usuario</a>
        		</div>
      		</div>
			@endfor
			
		</div>
		
	</div>
</div>

@endsection