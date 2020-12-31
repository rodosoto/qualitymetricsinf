<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
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
</head>
<body>
	@yield('content')

<footer class="page-footer grey darken-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
            	<img class="responsive-img center" src="https://www.qualitymetrics.cl/img/logo-header.png">
            </div>
            <div class="col l4 offset-l2 s12 left">
                <p><i class="tiny material-icons">location_on</i>  Av. Brasil 2104, Valparaiso, Chile </p>
				<p><i class="tiny material-icons">phone</i> +56 988 029 593</p>
				<p><i class="tiny material-icons">mail</i> contacto@qualitymetrics.cl</p>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container center">
         Quality Metrics © Todos los derechos reservados
        </div>
    </div>
</footer>

  <script src="{{asset('js/app.js')}}"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function(){
      M.AutoInit();
    })

    function construccion(){
      M.toast({html : "Función en construcción", classes: "rounded"});
    }
  </script>
  @yield('script')
</body>
</html>