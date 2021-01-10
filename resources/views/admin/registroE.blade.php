@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')

<div class="container">
	<div class="row">
		<br><br><br><br><br><br><br>
		<div class="col s12 center">
            <br>
            <img src="https://www.qualitymetrics.cl/img/logo-header.png" class="responsive-img">
            <br><br>
        </div>

		<div class="col s1"></div>
		<div class="col s10 center grey darken-4">

			<h3 class="white-text">Acción exitosa, redirigiendo a la página principal</h3>
			<br><br>
			<div class="preloader-wrapper big active">
      			<div class="spinner-layer spinner-blue">
        			<div class="circle-clipper left">
          				<div class="circle"></div>
        			</div>
        			<div class="gap-patch">
          				<div class="circle"></div>
        			</div>
        			<div class="circle-clipper right">
          				<div class="circle"></div>
        			</div>
      			</div>
  			</div>
  			<br><br>			
		</div>		
	</div>	
</div>
<script type="text/javascript">
var delay = 3000;
	setTimeout(function() {
  		location.href = "/dashboard";
	}, delay);
	
</script>

@endsection

