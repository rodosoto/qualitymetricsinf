@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')


    <div class="row">
        <br>
        
        <div class="col s12 center">
            <h6 class="white-text">Bienvenido {{ Auth::user()->name}}</h6>            
            @for ($i = 0 ; $i < count($empresa) ; $i++)
                @if($empresa[$i]->id == Auth::user()->empresa)
                    <h6 class="white-text">{{ $empresa[$i]->nombre_empresa}}</h6>
                @endif
            @endfor   
            
            
        @if (Auth::user()->tipo == 'admin')   
        </div>
        <div class="col s12 black">            
            <div class="col s4 white-text" id="empresas">
                <h5>Selecciona una Empresa</h5>
                    <select class="browser-default grey darken-4 white-text" id="empresa_select">
                        <option value="" disabled selected>--Listado de empresas--</option>
                        @for ($i = 0 ; $i < count($empresa) ; $i++)
                            <option value="{{ $empresa[$i]->id }}">{{ $empresa[$i]->nombre_empresa }}</option>
                        @endfor
                    </select>                
            </div>
            <div class="col s4 white-text" id="centros">
                <h5>Selecciona un centro</h5>
                    <select class="browser-default grey darken-4 white-text" id="centro_select">
                        <option value="" disabled selected>--Se llenará cuando escoja una Empresa--</option>
                    </select>                
            </div>

            <div class="col s4 white-text" id="jaulas">
                <h5>Selecciona una Jaula</h5>
                    <select class="browser-default grey darken-4 white-text" id="jaula_select">
                        <option value="" disabled selected>--Se llenará cuando escoja un centro--</option>
                    </select>                
            </div>

            @endif
            
            <div class="col s12" id="maquinas" height="200px">
                @for ($i = 0 ; $i < count($maquina) ; $i++ )
                <div class="col s5">
                    <div class="card grey darken-4">
                        <div class="card-content white-text">
                            <span class="card-title white-text">{{ $maquina[$i]->nombre }}</span>
                            <h6 class="white-text"><strong>Tipo:</strong> {{ $maquina[$i]->tipo }}</h6>
                            <h6 class="white-text"><strong>Modelo: {{ $maquina[$i]->modelo }}</strong></h6>
                            @if ($maquina[$i]->estado == 'on')
                                <h6 class="green-text"> Máquina encendida</h6>
                            @else
                                <h6 class="red-text"> Máquina apagada</h6>
                            @endif                               
                        </div>
                        <div class="col s12 grey darken-4">
                            <hr>
                            <h6 class="white-text">Desplegar graficos</h6>
                            @if ($maquina[$i]->tipo == 'filete' || $maquina[$i]->tipo == 'Filete')
                            <div class="col s12 center grey darken-4">
                                <a class="col s3 center hoverable" onclick="grafico_entero('{{ $maquina[$i]->id}}','entero')"><h6 class="blue-text">Color entero</h6></a>
                                <a class="col s3 center hoverable" onclick="grafico_entero('{{ $maquina[$i]->id}}','lomo')"><h6 class="blue-text">Color lomo</h6></a> 
                                <a class="col s3 center hoverable" onclick="grafico_entero('{{ $maquina[$i]->id}}','belly')"><h6 class="blue-text">Color belly</h6></a>  
                                <a class="col s3 center hoverable" onclick="grafico_entero('{{ $maquina[$i]->id}}','NCQ')"><h6 class="blue-text">Color NCQ</h6></a> 
                                
                            </div> 
                            <div class="col s12 grey darken-4 center">
                                <a class="col s4 center hoverable" onclick="donut('{{ $maquina[$i]->id}}','melanosis')"><h6 class="blue-text">Melanosis</h6></a>
                                <a class="col s4 center hoverable" onclick="donut('{{ $maquina[$i]->id}}','hematomas')"><h6 class="blue-text"></h6>Hematomas</a>
                                <a class="col s4 center hoverable" onclick="donut('{{ $maquina[$i]->id}}','gaping')"><h6 class="blue-text">Gaping</h6></a>
                                <br><br><br>          
                            </div>
                            @endif                           
                        </div>
                        
                    </div>                    
                </div>
                <div class="col s7 center" id="graficos">
                    <div class="card grey darken-4 center">
                        <div class="card-content white-text">
                            <div id="{{ $maquina[$i]->id}}" style="height: 280px;"></div>
                            
                        </div>
                    </div>                      
                </div>

                @endfor                
            </div>
        </div>        
    </div>    
<div id="modaljaula" class="modal grey darken-4">
  <div class="modal-content col">
    <h5 class="white-text center">Eliminar jaula</h5>
    <div class="col s5">
        <form>
            <div class="col white-text" id="empresas">
                <h5>Selecciona una Empresa</h5>
                <select class="browser-default grey darken-4 white-text" id="empresa_select2">
                    <option value="" disabled selected>--Listado de empresas--</option>
                    @for ($i = 0 ; $i < count($empresa) ; $i++)
                        <option value="{{ $empresa[$i]->id }}">{{ $empresa[$i]->nombre_empresa }}</option>
                    @endfor
                </select>                
            </div>
            <div class="input-field col s12 white-text">
                <input  id="numero_jaula" type="text" class="validate white-text" value="{{old('name')}}" name="name" required autofocus autocomplete="name">
                <label class="white-text" for="numero_jaula">{{ __('Numero de jaula') }}</label>
            </div>
            <a id="boton_cambio1">
                Buscar
            </a>
        </form>
        
    </div>
    <div class="col s12" id="tabla_jaula"></div>

    <div class="modal-footer grey darken-3" hidden>
      <button class="modal-close blue btn" id="cierra_modal_1">
        Eliminar
      </button>
    </div>
  </div>
</div> 

<div id="modalcentro" class="modal grey darken-4">
  <div class="modal-content col">
    <h5 class="white-text center">Eliminar Centro</h5>
    <div class="col s5">
        <form>
            <div class="col white-text" id="centros2">
                <h5>Selecciona una Empresa</h5>
                <select class="browser-default grey darken-4 white-text" id="empresa_select3">
                    <option value="" disabled selected>--Listado de empresas--</option>
                    @for ($i = 0 ; $i < count($empresa) ; $i++)
                        <option value="{{ $empresa[$i]->id }}">{{ $empresa[$i]->nombre_empresa }}</option>
                    @endfor
                </select>                
            </div>
            <a id="boton_cambio2">
                Buscar
            </a>
        </form>
        
    </div>
    <div class="col s12" id="tabla_centro"></div>

    <div class="modal-footer grey darken-3" hidden>
      <button class="modal-close blue btn" id="cierra_modal_2">
        Eliminar
      </button>
    </div>
  </div>
</div> 

<div id="modalinformes" class="modal grey darken-4">
  <div class="modal-content col">
    <h6 class="white-text">Selecciona el informe que deseas descargar</h6>
    <table>
        <thead>
            <tr>
                <th class="white-text">Informe</th>
                <th class="white-text">Formato</th>                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="white-text">Mediciones de filetes ultimas 24 horas</td>
                <td class="white-text"><a href="{{ route('informes.filete') }}">Excel</a></td>
                
            </tr>
            <tr>
                <td class="white-text">Mediciones de filetes ultimas 24 horas</td>
                <td class="white-text"><a href="{{ route('informes.filetePDF') }}">PDF</a></td>
            </tr>
        </tbody>
    </table>
    <div class="modal-footer grey darken-3" hidden>

      <button class="modal-close blue btn" id="cierra_modal_3">
        Cerrar Ventana
      </button>
    </div>
  </div>
</div> 


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script type="text/javascript">


        function grafico_entero(id,nombre){

            var carga = "<div class='preloader-wrapper big active'>    <div class='spinner-layer spinner-blue-only'>      <div class='circle-clipper left'>        <div class='circle'></div>      </div><div class='gap-patch'>        <div class='circle'></div>      </div><div class='circle-clipper right'>        <div class='circle'></div>      </div>    </div>  </div>";
            $('#'+id).html("<br><br><h5 class='white-text center'>Cargando grafico</h5><br><br>"+carga);

            $.get('/graficos/filete/ce', {id : id}, function(array){

                $('#'+id).html("Grafico Color "+nombre);
                if(nombre=="entero"){
                    new Morris.Bar({
                    element: id,
                    resize : true,
                    data: [
                        {
                            color : '20',
                            a : array[20][0]
                        },
                            {
                                color : '21',
                                a : array[21][0]
                            }
                            ,
                            {
                                color : '22',
                                a : array[22][0]
                            }
                            ,
                            {
                                color : '23',
                                a : array[23][0]
                            }
                            ,
                            {
                                color : '24',
                                a : array[24][0]
                            }
                            ,
                            {
                                color : '25',
                                a : array[25][0]
                            }
                            ,
                            {
                                color : '26',
                                a : array[26][0]
                            }
                            ,
                            {
                                color : '27',
                                a : array[27][0]
                            }
                            ,
                            {
                                color : '28',
                                a : array[28][0]
                            }
                            ,
                            {
                                color : '29',
                                a : array[29][0]
                            }
                            ,
                            {
                                color : '30',
                                a : array[30][0]
                            }
                            ,
                            {
                                color : '31',
                                a : array[31][0]
                            }
                            ,
                            {
                                color : '32',
                                a : array[32][0]
                            }
                            ,
                            {
                                color : '33',
                                a : array[33][0]
                            }
                            ,
                            {
                                color : '34',
                                a : array[34][0]
                            }
                        ],
                        xkey: 'color',
                        ykeys: ['a'],
                        labels: ['Entero']
                    });
                }
                else if(nombre=="lomo"){
                    new Morris.Bar({
                    element: id,
                    resize : true,
                    data: [
                        {
                            color : '20',
                            a : array[20][1]
                        },
                            {
                                color : '21',
                                a : array[21][1]
                            }
                            ,
                            {
                                color : '22',
                                a : array[22][1]
                            }
                            ,
                            {
                                color : '23',
                                a : array[23][1]
                            }
                            ,
                            {
                                color : '24',
                                a : array[24][1]
                            }
                            ,
                            {
                                color : '25',
                                a : array[25][1]
                            }
                            ,
                            {
                                color : '26',
                                a : array[26][1]
                            }
                            ,
                            {
                                color : '27',
                                a : array[27][1]
                            }
                            ,
                            {
                                color : '28',
                                a : array[28][1]
                            }
                            ,
                            {
                                color : '29',
                                a : array[29][1]
                            }
                            ,
                            {
                                color : '30',
                                a : array[30][1]
                            }
                            ,
                            {
                                color : '31',
                                a : array[31][1]
                            }
                            ,
                            {
                                color : '32',
                                a : array[32][1]
                            }
                            ,
                            {
                                color : '33',
                                a : array[33][1]
                            }
                            ,
                            {
                                color : '34',
                                a : array[34][1]
                            }
                        ],
                        xkey: 'color',
                        ykeys: ['a'],
                        labels: ['Lomo']
                    });
                }
                else if(nombre=="belly"){
                    new Morris.Bar({
                    element: id,
                    resize : true,
                    data: [
                        {
                            color : '20',
                            a : array[20][2]
                        },
                            {
                                color : '21',
                                a : array[21][2]
                            }
                            ,
                            {
                                color : '22',
                                a : array[22][2]
                            }
                            ,
                            {
                                color : '23',
                                a : array[23][2]
                            }
                            ,
                            {
                                color : '24',
                                a : array[24][2]
                            }
                            ,
                            {
                                color : '25',
                                a : array[25][2]
                            }
                            ,
                            {
                                color : '26',
                                a : array[26][2]
                            }
                            ,
                            {
                                color : '27',
                                a : array[27][2]
                            }
                            ,
                            {
                                color : '28',
                                a : array[28][2]
                            }
                            ,
                            {
                                color : '29',
                                a : array[29][2]
                            }
                            ,
                            {
                                color : '30',
                                a : array[30][2]
                            }
                            ,
                            {
                                color : '31',
                                a : array[31][2]
                            }
                            ,
                            {
                                color : '32',
                                a : array[32][2]
                            }
                            ,
                            {
                                color : '33',
                                a : array[33][2]
                            }
                            ,
                            {
                                color : '34',
                                a : array[34][2]
                            }
                        ],
                        xkey: 'color',
                        ykeys: ['a'],
                        labels: ['Belly']
                    });
                }
                else if(nombre=="NCQ"){
                    new Morris.Bar({
                    element: id,
                    resize : true,
                    data: [
                        {
                            color : '20',
                            a : array[20][3]
                        },
                            {
                                color : '21',
                                a : array[21][3]
                            }
                            ,
                            {
                                color : '22',
                                a : array[22][3]
                            }
                            ,
                            {
                                color : '23',
                                a : array[23][3]
                            }
                            ,
                            {
                                color : '24',
                                a : array[24][3]
                            }
                            ,
                            {
                                color : '25',
                                a : array[25][3]
                            }
                            ,
                            {
                                color : '26',
                                a : array[26][3]
                            }
                            ,
                            {
                                color : '27',
                                a : array[27][3]
                            }
                            ,
                            {
                                color : '28',
                                a : array[28][3]
                            }
                            ,
                            {
                                color : '29',
                                a : array[29][3]
                            }
                            ,
                            {
                                color : '30',
                                a : array[30][3]
                            }
                            ,
                            {
                                color : '31',
                                a : array[31][3]
                            }
                            ,
                            {
                                color : '32',
                                a : array[32][3]
                            }
                            ,
                            {
                                color : '33',
                                a : array[33][3]
                            }
                            ,
                            {
                                color : '34',
                                a : array[34][3]
                            }
                        ],
                        xkey: 'color',
                        ykeys: ['a'],
                        labels: ['NQC']
                    });
                }
            });

        }

        function donut(id, nombre){

            var carga = "<div class='preloader-wrapper big active'>    <div class='spinner-layer spinner-blue-only'>      <div class='circle-clipper left'>        <div class='circle'></div>      </div><div class='gap-patch'>        <div class='circle'></div>      </div><div class='circle-clipper right'>        <div class='circle'></div>      </div>    </div>  </div>";
            $('#'+id).html("<br><br><h5 class='white-text center'>Cargando grafico</h5><br><br>"+carga);

            $.get('/graficos/filete/ot', {id : id}, function(array){
                var porcMel;
                var porcHem;
                var porcGap;

                console.log(array[0]);
                console.log(array[1]);
                console.log(array[2]);
                console.log(array[3]);

                porcGap = (array[1])/(array[0]/100);
                porcMel = (array[2])/(array[0]/100);
                porcHem = (array[3])/(array[0]/100);

                $('#'+id).html("");

                if(nombre == "melanosis"){
                    $('#'+id).html("Grafico de porcentajes de filetes que presentaron melanosis");
                    Morris.Donut({
                        element: id,
                        data: [
                            {label: "con melanosis", color: '#BD1111 ',value: porcMel.toFixed(2) , labelColor: '#323DA9 ' },
                            {label: "sin melanosis", color: '#323DA9 ',value: (100-porcMel).toFixed(2) , labelColor: '#323DA9 ' },
                        ],
                        labelColor: 'white'              
                    }); 
                }
                else if(nombre == "hematomas"){
                    $('#'+id).html("Grafico de porcentajes de filetes que presentaron hematomas");
                    Morris.Donut({
                        element: id,
                        data: [
                            {label: "con hematomas", color: '#BD1111 ',value: porcHem.toFixed(2) , labelColor: '#323DA9 ' },
                            {label: "sin hematomas", color: '#323DA9 ',value: (100-porcHem).toFixed(2) , labelColor: '#323DA9 ' },
                        ],
                        labelColor: 'white'              
                    });
                }
                else if(nombre=="gaping"){
                    $('#'+id).html("Grafico de porcentajes de filetes que presentaron gaping");
                    Morris.Donut({
                        element: id,
                        data: [
                            {label: "Gaping", color: '#BD1111',value: porcGap.toFixed(2) , label: 'con gaping' },
                            {label: "sin gaping", color: '#323DA9',value: (100-porcGap).toFixed(2) , labelColor: '#323DA9 ' },
                        ],
                        labelColor: 'white'           
                    });

                }
            });
            
        }

        
        $(document).ready(function(){

            $('#boton_cambio1').on('click',function(){
                var empresa = document.getElementById('empresa_select2').value;
                var jaula_id = document.getElementById('numero_jaula').value;

                $.get('/tabla/jaula/', {empresa : empresa}, function(jaulas){
                    $('#tabla_jaula').html("");
                    if(jaulas.length == 0){
                        $('#tabla_jaula').html("<h5>No hay jaulas registradas</h5>");
                    }
                    else{
                        var flag = 0;
                        var script = "<table class='white-text'><thead><tr><th>Nombre del centro</th><th>Numero de jaula</th><th></th></tr></thead><tbody>";
                        $.each(jaulas, function(index,value){
                            if(value[1] == jaula_id){
                               script = script + "<tr><td>" + value[2] + "</td><td>" + value[1] + "</td><td><a onclick='borra_jaula("+ value[0]+")'>Borrar Jaula</a></td></tr>";
                               flag = flag+1; 
                           }                            
                        });
                        if(flag==0){
                            M.toast({html : "No hay jaulas registradas con los datos introducidos", classes : "rounded"});
                        }
                        script = script + "</tbody></table>";
                        $('#tabla_jaula').html(script);
                    }            
                });
            });

            $('#boton_cambio2').on('click',function(){
                var empresa = document.getElementById('empresa_select3').value;
                console.log(empresa);

                $.get('/tabla/centro/', {empresa : empresa}, function(centros){
                    $('#tabla_centro').html("");
                    console.log(centros);
                    if(centros.length == 0){
                        $('#tabla_centro').html("<h5>No hay centros registradas</h5>");
                    }
                    else{
                        var flag = 0;
                        var script = "<table class='white-text'><thead><tr><th>Nombre del centro</th><th>Ubicación</th><th></th></tr></thead><tbody>";
                        $.each(centros, function(index,value){
                            script = script + "<tr><td>" + value[1] + "</td><td>" + value[2] + "</td><td><a onclick='borra_centro("+ value[0]+")'>Borrar Centro</a></td></tr>";
                            flag = flag+1;                           
                        });
                        if(flag==0){
                            M.toast({html : "No hay centros registradas con los datos introducidos", classes : "rounded"});
                        }
                        script = script + "</tbody></table>";
                        $('#tabla_centro').html(script);
                    }            
                });
            });

            $('#empresa_select').delay(200).on('change', function(){
                var empresa_id = $(this).val();

                if($.trim(empresa_id)!=""){
                    $.get('/centro/obt/', {empresa_id : empresa_id}, function(centros){
                        $('#centro_select').empty();
                        if(centros.length == 0){
                            $('#centro_select').append("<option value='' >No hay centros registrados</option>");
                        }
                        else{
                            $('#centro_select').append("<option value='' >--Listado de centros--</option>");

                            $.each(centros, function(index,value){
                                $('#centro_select').append("<option value='"+  index +"'>"+ value[0] +", "+ value[1] +"</option>");
                            });
                        }
                        

                    });
                }
            });

            $('#centro_select').delay(200).on('change', function(){
                var centro_id = $(this).val();

                if($.trim(centro_id)!=""){
                    $.get('/jaula/obt/', {centro_id : centro_id}, function(jaulas){
                        $('#jaula_select').empty();
                        if(jaulas.length == 0){
                            $('#jaula_select').append("<option value='' >No hay jaulas registradas</option>");
                        }
                        else{
                            $('#jaula_select').append("<option value='' >--Listado de Jaulas--</option>");

                            $.each(jaulas, function(index,value){
                                $('#jaula_select').append("<option value='"+  index +"'>n: "+ value[0] +"</option>");
                            });
                        }
                        

                    });
                }
            });

            $('#empresa_select').delay(200).on('change', function(){
                var empresa_id = $(this).val();
                var string = "<br><br><hr><br>";

                if($.trim(empresa_id)!=""){
                    $.get('/empresa/obtME', {empresa_id : empresa_id}, function(centros){
                        $('#maquinas').html("");
                        if(centros.length == 0){
                        }
                        else{
                            $.each(centros, function(index,value){
                                string = string + "<div class='col s4'><div class='card grey darken-4 z-depth-3'><div class='card-content white-text'><span class='card-title'>"+value[2]+"</span><table><thead></thead><tbody><tr><td class='white-text'><strong>Tipo:</strong></td><td class='white-text'>"+ value[0] +"</td></tr><tr><td class='white-text'><strong>Modelo:</strong></td><td class='white-text'>"+ value[1] +"</td></tr><tr><td class='white-text'><strong>Estado:</strong></td>@if("+ value[3] +" == 'on')<td class='green-text'>"+ value[3] +"</td>@else<td class='red-text'>"+ value[3] +"</td>@endif                      </tr>      </tbody></table></div><div class='card-action'><a class='blue btn right' onclick='construccion()'><i class='material-icons right'>insert_chart</i>Desplegar grafico</a><br><br>  </div> </div></div>";
                            });

                            $('#maquinas').html(string);
                        }
                        

                    });
                }
            });

            $('#centro_select').delay(200).on('change', function(){
                var centro_id = $(this).val();
                var string = "<br><br><hr><br>";

                if($.trim(centro_id)!=""){
                    $.get('/empresa/obtMC', {centro_id : centro_id}, function(centros){
                        $('#maquinas').html("");
                        if(centros.length == 0){
                        }
                        else{
                            $.each(centros, function(index,value){
                                string = string + "<div class='col s4'><div class='card grey darken-4 z-depth-3'><div class='card-content white-text'><span class='card-title'>"+value[2]+"</span><table><thead></thead><tbody><tr><td class='white-text'><strong>Tipo:</strong></td><td class='white-text'>"+ value[0] +"</td></tr><tr><td class='white-text'><strong>Modelo:</strong></td><td class='white-text'>"+ value[1] +"</td></tr><tr><td class='white-text'><strong>Estado:</strong></td>@if("+ value[3] +" == 'on')<td class='green-text'>"+ value[3] +"</td>@else<td class='red-text'>"+ value[3] +"</td>@endif                      </tr>      </tbody></table></div><div class='card-action'><a class='blue btn right' onclick='construccion()'><i class='material-icons right'>insert_chart</i>Desplegar grafico</a></div> </div></div>";
                            });

                            $('#maquinas').html(string);
                        }
                        

                    });
                }
            });

            $('#jaula_select').delay(200).on('change', function(){
                var jaula_id = $(this).val();
                var string = "<br><br><hr><br>";

                if($.trim(jaula_id)!=""){
                    $.get('/empresa/obtMJ', {jaula_id : jaula_id}, function(centros){
                        $('#maquinas').html("");
                        if(centros.length == 0){
                        }
                        else{
                            $.each(centros, function(index,value){
                                string = string + "<div class='col s4'><div class='card grey darken-4 z-depth-3'><div class='card-content white-text'><span class='card-title'>"+value[2]+"</span><table><thead></thead><tbody><tr><td class='white-text'><strong>Tipo:</strong></td><td class='white-text'>"+ value[0] +"</td></tr><tr><td class='white-text'><strong>Modelo:</strong></td><td class='white-text'>"+ value[1] +"</td></tr><tr><td class='white-text'><strong>Estado:</strong></td>@if("+ value[3] +" == 'on')<td class='green-text'>"+ value[3] +"</td>@else<td class='red-text'>"+ value[3] +"</td>@endif                      </tr>      </tbody></table></div><div class='card-action'><a class='blue btn right' onclick='construccion()'><i class='material-icons right'>insert_chart</i>Desplegar grafico</a>></div> </div></div>";
                            });

                            $('#maquinas').html(string);
                        }
                        

                    });
                }
            });
        });

    function borra_jaula(id){
        var opt1 = confirm("¿Está seguro que desea eliminar por completo esta jaula?");
        if (opt1 == true){
            var opt2 = confirm("Esta acción no se puede deshacer, confirme su decisión");
            if(opt2 == true){
                $.get('/jaula/borra', {id : id}, function(response){
                    if(response[0] == "borrado"){
                        alert("Jaula borrada con exito");
                        $('#tabla_jaula').html('');
                        $('#cierra_modal_1').click();
                    }
                });
            }
        }
    }

    function borra_centro(id){
        var opt1 = confirm("¿Está seguro que desea eliminar por completo este centro?");
        if (opt1 == true){
            var opt2 = confirm("Esta acción no se puede deshacer, confirme su decisión");
            if(opt2 == true){
                $.get('/centro/borra', {id : id}, function(response){
                    if(response[0] == "borrado"){
                        alert("Centro borrado con exito");
                        $('#tabla_centro').html('');
                        $('#cierra_modal_2').click();
                    }
                });
            }
        }
    }
    </script>
@endsection


