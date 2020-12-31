@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')
<div class="container">
    <div class="row">
        <br><br><br><br><br><br>
        <div class="col s12">
            <div class="col s3"></div>
            <div class="col s6  z-depth-1">
                <form> 
                    @csrf
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mail</i>
                        <input id="mail" type="text" class="validate" name="mail">
                        <label for="mail">Mail</label>
                    </div>
                    @error('mail')
                    <br>
                    <small>* {{$message}}</small>
                    <br>
                    @enderror
                    <div class="input-field col s12">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="pass" type="password" class="validate" name="pass">
                        <label for="pass">Contraseña</label>
                    </div>
                    @error('pass')
                    <br>
                    <small>* {{$message}}</small>
                    <br>
                    @enderror
                    <div class="col s12">
                        <a class="grey darken-2 btn-small right"><i class="material-icons right">chevron_right</i>Ingresar</a>
                    </div>
                </form>
            </div>
            <br> 
            <div class="col s3"></div>
        </div>        
    </div>
</div>
<br><br><br><br><br><br><br> 
@endsection