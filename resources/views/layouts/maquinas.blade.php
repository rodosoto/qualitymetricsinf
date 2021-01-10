<div class="container">
    <div class="row">
        <div class="col s12">
            <h4>Máquinas registradas en el sistema</h4>
            <hr>            
            
            <div class="col s4" id="empresas">
                <h5>Selecciona una Empresa</h5>
                    <select class="browser-default" id="empresa_select">
                        <option value="" disabled selected>--Listado de empresas--</option>
                        @for ($i = 0 ; $i < count($empresa) ; $i++)
                            <option value="{{ $empresa[$i]->id }}">{{ $empresa[$i]->nombre_empresa }}</option>
                        @endfor
                    </select>                
            </div>
            <div class="col s4" id="centros">
                <h5>Selecciona un centro</h5>
                    <select class="browser-default" id="centro_select">
                        <option value="" disabled selected>--Se llenará cuando escoja una Empresa--</option>
                    </select>                
            </div>

            <div class="col s4" id="jaulas">
                <h5>Selecciona una Jaula</h5>
                    <select class="browser-default" id="jaula_select">
                        <option value="" disabled selected>--Se llenará cuando escoja un centro--</option>
                    </select>                
            </div>
            
            <div class="col s12" id="maquinas">
                <br><br>
                <hr>
                <br>
                @for ($i = 0 ; $i < count($maquina) ; $i++ )
                <div class="col s4">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">{{ $maquina[$i]->nombre }}</span>
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
                                    </tbody>
                                </table>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                            <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
                @endfor                
            </div>
        </div>
        
    </div>
    
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
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
                                string = string + "<div class='col s4'><div class='card blue-grey darken-1'><div class='card-content white-text'><span class='card-title'>"+value[2]+"</span><table><thead></thead><tbody><tr><td class='white-text'><strong>Tipo:</strong></td><td class='white-text'>"+ value[0] +"</td></tr><tr><td class='white-text'><strong>Mdelo:</strong></td><td class='white-text'>"+ value[1] +"</td></tr><tr><td class='white-text'><strong>Estado:</strong></td>@if("+ value[3] +" == 'on')<td class='green-text'>"+ value[3] +"</td>@else<td class='red-text'>"+ value[3] +"</td>@endif                      </tr>      </tbody></table></div><div class='card-action'><a href='#'>This is a link</a><a href='#'>This is a link</a></div> </div></div>";
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
                                string = string + "<div class='col s4'><div class='card blue-grey darken-1'><div class='card-content white-text'><span class='card-title'>"+value[2]+"</span><table><thead></thead><tbody><tr><td class='white-text'><strong>Tipo:</strong></td><td class='white-text'>"+ value[0] +"</td></tr><tr><td class='white-text'><strong>Mdelo:</strong></td><td class='white-text'>"+ value[1] +"</td></tr><tr><td class='white-text'><strong>Estado:</strong></td>@if("+ value[3] +" == 'on')<td class='green-text'>"+ value[3] +"</td>@else<td class='red-text'>"+ value[3] +"</td>@endif                      </tr>      </tbody></table></div><div class='card-action'><a href='#'>This is a link</a><a href='#'>This is a link</a></div> </div></div>";
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
                                string = string + "<div class='col s4'><div class='card blue-grey darken-1'><div class='card-content white-text'><span class='card-title'>"+value[2]+"</span><table><thead></thead><tbody><tr><td class='white-text'><strong>Tipo:</strong></td><td class='white-text'>"+ value[0] +"</td></tr><tr><td class='white-text'><strong>Mdelo:</strong></td><td class='white-text'>"+ value[1] +"</td></tr><tr><td class='white-text'><strong>Estado:</strong></td>@if("+ value[3] +" == 'on')<td class='green-text'>"+ value[3] +"</td>@else<td class='red-text'>"+ value[3] +"</td>@endif                      </tr>      </tbody></table></div><div class='card-action'><a href='#'>This is a link</a><a href='#'>This is a link</a></div> </div></div>";
                            });

                            $('#maquinas').html(string);
                        }
                        

                    });
                }
            });
		});
	</script>