@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
    <div class="row">
        <br><br><br><br><br><br><br><br>
        <div class="col s4"></div>
        <div class="col s4 z-depth-2 grey darken-4">            
            <form method="POST" action="{{ route('add.empresa.bd') }}">
            @csrf

                <div class="col s12 center">
                    <br>
                    <img src="https://www.qualitymetrics.cl/img/logo-header.png" class="responsive-img">
                </div>
                <div class="col s12">
                    <h6 class="white-text center">Registrar Empresa</h6>
                    <br><br><br>
                </div>

                <div class="input-field col s12 white-text">
                    <input  id="first_name" type="text" class="validate white-text" value="{{old('name')}}" name="name" required autofocus autocomplete="name">
                    <label class="white-text" for="first_name" value="{{ __('Nombre de la Empresa') }}">{{ __('Nombre de la Empresa') }}</label>
                </div>
                <div class="col s12 center">
                    <br><br>
                    <button type="submit" class="blue btn center">
                        <i class="material-icons right">save</i>Registrar Empresa
                    </button>

                </div>
                <br>
            </form>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

    </div>        
</div>
    

@endsection