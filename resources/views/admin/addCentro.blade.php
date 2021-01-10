@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
    <div class="row">
        <br><br><br>
        <div class="col s4"></div>
        <div class="col s4 z-depth-2 grey darken-4">   

        <form method="POST" action="{{ route('add.centro.bd') }}">
            @csrf

            <div class="col s12 center">
                <br>
                <img src="https://www.qualitymetrics.cl/img/logo-header.png" class="responsive-img">
            </div>
            <div class="col s12">
                <h6 class="white-text center">Registrar centro</h6>
                <br><br><br>
            </div>

            <div class="input-field col s12">
                <select id="empresa" name="empresa" class="browser-default white-text grey darken-4">
                    <option value="" disabled selected>Selecciona una empresa</option>
                    @for ($i = 0 ; $i < count($empresa) ; $i++)
                        <option value="{{ $empresa[$i]->id }}">{{ $empresa[$i]->nombre_empresa }}</option>
                    @endfor
                </select>
            </div>

            <div class="input-field col s12">
                <input  id="name" name="name" type="text" class="validate white-text" value="{{old('name')}}" required autofocus autocomplete="name">
                <label class="white-text" for="name" value="{{ __('Nombre del centro') }}">{{ __('Nombre del Centro') }}</label>
            </div>

            <div class="input-field col s12">
                <input  id="ubicacion" name="ubicacion" type="text" class="validate white-text" value="{{old('ubicacion')}}" required autofocus autocomplete="ubicacion">
                <label class="white-text" for="ubicacion" value="{{ __('Ubicacion') }}">{{ __('Ubicacion') }}</label>
            </div>

            <div class="col s12 center">
                <br>
                <button type="submit" class="blue btn center">
                    <i class="material-icons right">save</i>Registrar Centro
                </button>
                <br><br>
            </div>
        </form>
        </div>
    </div>        
</div>

@endsection