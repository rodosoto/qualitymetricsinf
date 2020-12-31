@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight center">
            {{ __('Quality Metrics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="row">
                    <div class="col s12">
                        @for ($i = 0 ; $i < count($maquina) ; $i++)
                        <div class="col s6">
                            <div class="card grey darken-3">
                                <div class="card-content white-text">
                                    <span class="card-title">{{$maquina[$i]->nombre}}</span>
                                     <table>
                                        <tr>
                                            <td><strong>Modelo: </strong></td>
                                            <td>{{$maquina[$i]->modelo}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Estado: </strong></td>
                                            @if ($maquina[$i]->estado == 'on')
                                                <td class="green-text text-lighten-2"><strong
                                                    >Encendida</strong></td>
                                            @endif
                                            @if ($maquina[$i]->estado == 'off')
                                                <td class="red-text text-lighten-2"><strong
                                                    >Apagada</strong></td>
                                            @endif
                                            
                                        </tr> 
                                        <tr>
                                            <td><strong>Ültima medición: </strong></td>
                                            <td>{{$maquina[$i]->ultima_medicion}}</td>
                                        </tr>                                  
                                    </table>
                                </div>
                                <div class="card-action">
                                    <a onclick="construccion()">Desplegar gráficos</a>
                                </div>
                            </div>
                        </div>

                        @endfor
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
