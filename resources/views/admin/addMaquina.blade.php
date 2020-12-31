<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('add.maquina.bd') }}">
            @csrf

            <div class="flex items-center mt-4">
                <select id="empresa_select" name="empresa">
                    <option value="" disabled selected>Selecciona una empresa</option>
                    @for ($i = 0 ; $i < count($empresa) ; $i++)
                        <option value="{{ $empresa[$i]->id }}">{{ $empresa[$i]->nombre_empresa }}</option>
                    @endfor
                </select>
            </div>
            <br>

            <div class="flex items-center mt-4">
            	<select id="centro_select" name="centro_select">
            		<option value=''>Selecciona un centro</option>
            	</select>
            	
            </div>
            <br>

            <div class="flex items-center mt-4">
            	<select id="jaula_select" name="jaula_select">
            		<option value=''>Selecciona una jaula</option>
            	</select>
            	
            </div>
            <br><br>

            <div>
                <x-jet-label for="tipo" value="{{ __('Tipo') }}" />
                <x-jet-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" :value="old('tipo')" required autofocus autocomplete="tipo" />
            </div>

            <div>
                <x-jet-label for="modelo" value="{{ __('Modelo') }}" />
                <x-jet-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="old('modelo')" required autofocus autocomplete="name" maxlength="3"/>
            </div>

            <div>
                <x-jet-label for="nombre_maquina" value="{{ __('Nombre') }}" />
                <x-jet-input id="nombre_maquina" class="block mt-1 w-full" type="text" name="nombre_maquina" :value="old('nombre_maquina')" required autofocus autocomplete="name" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Registrar Máquina') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

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
							$('#centro_select').append("<option value='' >Selecciona un centro</option>");

							$.each(centros, function(index,value){
								$('#centro_select').append("<option value='"+  index +"'>"+ value +"</option>");
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
							$('#jaula_select').append("<option value='' >Selecciona una jaula</option>");

							$.each(jaulas, function(index,value){
								console.log(index);
								console.log(value);
								$('#jaula_select').append("<option value='"+  index +"'>"+ value +"</option>");
							});
						}
						

					});
				}
			});
		});
	</script>