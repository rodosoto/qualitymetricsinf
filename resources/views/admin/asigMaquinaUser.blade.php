@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
    <div class="row">
        <div class="col s12">
            <h4 class="white-text">Máquinas registradas en el sistema</h4>                     
            <div class="col s12" id="maquinas">
                <br><br>
                <hr>
                <br>
                @for ($i = 0 ; $i < count($maquina) ; $i++ )

                <div class="col s12">
                    <div class="card grey darken-4 z-depth-3">
                        <div class="card-content white-text">
                            <span class="card-title white-text">{{ $maquina[$i]->nombre }}</span>
                            <table>
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td class="white-text"><strong>Tipo:</strong></td>
                                        <td class="white-text">{{ $maquina[$i]->tipo }}</td>
                                    </tr>
                                    <tr>
                                        <td class="white-text"><strong>Modelo:</strong></td>
                                        <td class="white-text">{{ $maquina[$i]->modelo }}</td>
                                    </tr>
                                    <tr>
                                        <td class="white-text"><strong>Estado:</strong></td>
                                        @if ($maquina[$i]->estado == 'on')
                                            <td class="green-text">{{ $maquina[$i]->estado }}</td>
                                        @else
                                            <td class="red-text">{{ $maquina[$i]->estado }}</td>
                                        @endif                               
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="white-text">Asignar esta maquina a un usuario</h6>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('assig.user') }}">
                                                @csrf
                                            <select class="browser-default white-text grey darken-4" name="id_user" id="id_user">
    @for ($j = 0 ; $j < count($user) ; $j++)
        @if ($user[$j]->empresa == $maquina[$i]->empresa)
            @php
                $flag = 0;
            @endphp
            @if (count($relacion) == 0)
                <option value="{{ $user[$j]->id }}">{{ $user[$j]->name }}</option>     
            @elseif (count($relacion) > 0)     
                @for ($k = 0 ; $k < count($relacion) ; $k++)                        
                    @if ($relacion[$k]->id_usuario == $user[$j]->id)   
                        @if ($relacion[$k]->id_maquina == $maquina[$i]->id)
                            @php
                                $flag = 1;
                                $k = count($relacion);
                            @endphp                            
                        @endif               
                    @endif
                @endfor
                @if ($flag == 0)
                    <option value="{{ $user[$j]->id }}">{{ $user[$j]->name }}</option>
                @endif
            @endif
            @if($flag == 1)
                <option value="" disabled>--No hay mas Usuarios para asignar--</option>
            @endif                                 
        @endif
    @endfor
                                            </select>
                                        </td>
                                        <td>                                          
                                            <input type="text" name="id_maquina" id="id_maquina" value="{{ $maquina[$i]->id }}" hidden>
                                            <button class="blue btn left" type="submit">
                                                <i class="material-icons right">save</i>Guardar
                                            </button>
                                        </form>
                                            
                                        </td>
                                    </tr>                                 
                                </tbody>
                            </table>                                
                        </div>
                        <div class="card-action">                           
                            <button onclick="borrar( '{{ $maquina[$i]->id }}' )" class="red btn">
                                <i class="material-icons right">delete</i>Eliminar
                            </button>
                        </div>

                    </div>
                </div>
                @endfor                
            </div>
        </div>
        
    </div>
    
</div>


@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	<script type="text/javascript">

        function borrar(id){
            var opt1 = confirm("Estas a punto de eliminar esta máquina, ¿estas seguro?");
            if (opt1 == true){
                var opt2 = confirm("Esta acción no se puede deshacer, confirma tu decisión");
                if(opt2 == true){
                    $.get('/maquina/borra/', {id : id}, function(response){
                        if(response[0] == "borrado"){
                            location.href = "/exito";
                        }  
                    });
                }
            }
        }
	</script>


