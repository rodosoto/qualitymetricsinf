<!DOCTYPE html>
<html>
<head>
    <title>Quality Metrics</title>
    <link rel="icon" type="image/png" href="https://www.qualitymetrics.cl/img/logo-header.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        /* label color */
        .input-field label {
            color: #000; 
        }
        /* label focus color */
        .input-field input[type=text]:focus + label {
            color: #0d47a1 ;
        }
        /* label underline focus color */
        .input-field input[type=text]:focus {
            border-bottom: 1px solid #0d47a1;
            box-shadow: 0 1px 0 0 #0d47a1;
        }

        /* invalid color */
        .input-field input[type=text].invalid {
             border-bottom: 1px solid #0d47a1;
            box-shadow: 0 1px 0 0 #0d47a1;
        }
        /* icon prefix focus color */
        .input-field .prefix.active {
             color: #0d47a1;
        }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
    <body class="black">
        <div class="container">
            <br><br><br><br><br><br>
            <div class="row">
                <div class="col s3"></div>
                <div class="col s6 center grey darken-4">
                    <img src="https://www.qualitymetrics.cl/img/logo-header.png">
                    <form method="POST" action="{{ route('register') }}" >
                        @csrf

                        <div class="input-field col s12">                
                            <input id="name" class="validate white-text" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{ __('Nombre') }}"/>
                            <label for="name" ></label>
                        </div>
                        <div class="input-field col s12">
                            <input id="email" class="validate white-text" type="email" name="email" :value="old('email')" required placeholder="{{ __('E-mail') }}"/>
                            <label for="email"></label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" class="validate white-text" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Contraseña') }}"/>
                            <label for="password"></label>
                        </div>

                        <div class="input-field col s12">
                            <input id="password_confirmation" class="validate white-text" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirmar Contraseña') }}"/>
                            <label for="password_confirmation"></label>
                        </div>
                        <div>
                            <a type="submit" class="btn blue">
                            {{ __('Registrar Usuario') }}
                            </a>
                        </div>
                    </form>
                </div>
                <div class="col s3"></div>
            </div>
        </div>
    </body>
</html>

