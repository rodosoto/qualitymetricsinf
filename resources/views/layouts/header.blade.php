

<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
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

      #canvas1{
        width: 340px;
        height: 140px;
        margin-top:20px;
      }
      #canvas2{
        width: 340px;
        height: 140px;
        margin-top:20px;
      }

      #canvas3{
        width: 340px;
        height: 140px;
        margin-top:20px;
      }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>    
</head>
<body class="black">
@if (Auth::user()->tipo == 'admin')
<ul id="dropdown1" class="dropdown-content grey darken-4 white-text">
  <li><a class="white-text" href="{{ route('add.empresa') }}">Agregar Empresa</a></li>
  <li><a class="white-text" href="{{ route('show.empresas') }}">Ver Empresa</a></li>
</ul>

<ul id="dropdown4" class="dropdown-content grey darken-4 white-text">
  <li><a class="white-text" href="{{ route('add.maquina') }}">Agregar Maquina</a></li>
  <li><a class="white-text" href="{{ route('assign.maquina') }}">Administrar Maquina</a></li>
</ul>

<ul id="dropdown5" class="dropdown-content grey darken-4 white-text">
  <li><a class="white-text" href="{{ route( 'show.users' )}}">Ver usuarios</a></li>
</ul>
@endif

<ul id="dropdown6" class="dropdown-content grey darken-4 white-text">
  <li><a class="white-text" href="{{ route('profile.show') }}">Ver perfil</a></li>
  <li><a class="white-text modal-trigger" href="#modalinformes">Visualización rápida</a></li>
  <li><a class="white-text modal-trigger" href="{{ route('reportes') }}">Reporte</a></li>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <li><a class="white-text" href="{{ route('logout') }}" onclick="event.preventDefault();
  this.closest('form').submit();">Salir</a></li>
  </form>
</ul>

<nav class="grey darken-4">
  <div class="nav-wrapper">
    <a href="/dashboard" class="brand-logo blue-text">
      <h5>Sistema de visualización de datos de calidad</h5>        
       
    </a>
    <ul class="right hide-on-med-and-down">
      @if (Auth::user()->tipo == 'admin')
      <li><a class="dropdown-trigger" data-target="dropdown1" href="sass.html">Empresas<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-trigger" data-target="dropdown4" href="badges.html">Maquinas<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-trigger" data-target="dropdown5" href="badges.html">Otros<i class="material-icons right">arrow_drop_down</i></a></li>
      @endif
      <li><a class="dropdown-trigger" data-target="dropdown6" href="badges.html">Perfil<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>




	@yield('content')

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

    $(".dropdown-trigger").dropdown();
  </script>
  @yield('script')
</body>
</html>