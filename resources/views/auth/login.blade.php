<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="col s12 center">
                <br>
                <img src="https://www.qualitymetrics.cl/img/logo-header.png" class="responsive-img center">
            </div>

            <div>
                <x-jet-label for="email" value="{{ __('E-mail') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar credenciales') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                    
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 center" href="{{ route('register') }}">
                        {{ __('Registrarse ') }}
            </a>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
