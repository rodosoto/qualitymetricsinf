<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('add.jaula.bd') }}">
            @csrf

            <div class="flex items-center mt-4">
                <select id="empresa_select" name="empresa">
                    <option value="" disabled selected>Selecciona una empresa</option>
                    @for ($i = 0 ; $i < count($empresa) ; $i++)
                        <option value="{{ $empresa[$i]->id }}">{{ $empresa[$i]->nombre_empresa }}</option>
                    @endfor
                </select>
                <label></label>
            </div>
            <br>

            <div class="flex items-center mt-4">
            	<select id="centro_select" name="centro_select">
            		<option value=''>Selecciona un centro</option>
            	</select>
            	
            </div>
            <br><br>

            <div>
                <x-jet-label for="name" value="{{ __('Nombre de la jaula') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="numero" value="{{ __('Número') }}" />
                <x-jet-input id="numero" class="block mt-1 w-full" type="text" name="numero" :value="old('numero')" required autofocus autocomplete="name" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Registrar Jaula') }}
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
								console.log(index);
								console.log(value);
								$('#centro_select').append("<option value='"+  index +"'>"+ value +"</option>");
							});
						}
						

					});
				}
			});
		});
	</script>


