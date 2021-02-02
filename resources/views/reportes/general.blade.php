@extends('layouts.header')

@section('title', 'Quality Metrics')

@section('content')
@php
$emp = Auth::user()->empresa;
@endphp

<div class="row">
	<br>
	<br>
	<div class="col s12">
		<div class="col s2 center grey darken-4">
			<h6 class="white-text">Seleccionar los atributos para generar el gráfico </h6>
			<form>
				@csrf
				<div class="input-field col s12">
					<select class="browser-default" id="anio">			
					</select>
				</div>
				<div class="input-field col s12">
					<select class="browser-default" id="mes">
						<option selected disabled>-- mes --</option>		
					</select>
				</div>
				<div class="input-field col s12">
					<select class="browser-default" id="dia">
						<option selected disabled>-- dia --</option>		
					</select>
				</div>
				<div class="input-field col s12">
					<select class="browser-default" id="centro">
						<option selected disabled>-- centro --</option>		
					</select>
				</div>
				<div class="input-field col s12">
					<select class="browser-default"  id="jaula">
						<option selected disabled>-- jaula --</option>		
					</select>
				</div>
			</form>			
		</div>
		<div class="col s1"></div>
		<div class="col s6 center grey darken-4" id="grafico" style="height: 600px;">
			<br><br><br><br><br><br>
			<h4 class="white-text">Cargando gráfico</h4>
			<br><br><br>
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
		
		</div>
		<div class="col s3 center grey darken-4" style="height: 600px;">
			<div class="col s12" id="torta1" style="height: 200px;"></div>
			<div class="col s12" id="torta2" style="height: 200px;"></div>
			<div class="col s12" id="torta3" style="height: 200px;"></div>

		</div>	
</div>

<script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-cartesian.min.js"></script>
<link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
 <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>




<script type="text/javascript">

	var empresa = '{{ Auth::user()->empresa}}';

	var data = "<br><br><br><br><br><br>			<h4 class='white-text'>Cargando gráfico</h4>			<br><br><br>			<div class='preloader-wrapper big active'>      			<div class='spinner-layer spinner-blue'>        			<div class='circle-clipper left'>          				<div class='circle'></div>        			</div>        			<div class='gap-patch'>          				<div class='circle'></div>        			</div>        			<div class='circle-clipper right'>          				<div class='circle'></div>        			</div>      			</div>			</div>";

	function mediana(array, valorMedio, tipo){
		var aux=0;
		var valMediana;
		i = 20;

		if(tipo == 'entero'){
			while (i < 34){
				aux += array[i][0];
				if(aux > valorMedio){
					valMediana = i;
					i = 34;
				}
				i++;
			}
			return valMediana;
		}

		else if(tipo == 'lomo'){
			while (i < 34){
				aux += array[i][1];
				if(aux > valorMedio){
					valMediana = i;
					i = 34;
				}
				i++;
			}
			return valMediana;
		}

		else if(tipo == 'belly'){
			while (i < 34){
				aux += array[i][2];
				if(aux > valorMedio){
					valMediana = i;
					i = 34;
				}
				i++;
			}
			return valMediana;
		}

		if(tipo == 'ncq'){
			while (i < 34){
				aux += array[i][3];
				if(aux > valorMedio){
					valMediana = i;
					i = 34;
				}
				i++;
			}
			return valMediana;
		}
	}
	function inferior(array,tipo){
		if(tipo == 'entero'){
			for( i = 20 ; i < 34 ; i++ ){
				if(array[i][0] >0){
					return i;
				}
			}
		}
		else if(tipo == 'lomo'){
			for( i = 20 ; i < 34 ; i++ ){
				if(array[i][0] >0){
					return i;
				}
			}
		}
		else if(tipo == 'belly'){
			for( i = 20 ; i < 34 ; i++ ){
				if(array[i][0] >0){
					return i;
				}
			}
		}

		else if(tipo == 'ncq'){
			for( i = 20 ; i < 34 ; i++ ){
				if(array[i][0] >0){
					return i;
				}
			}
		}
	}
	function superior(array,tipo){
		if(tipo == 'entero'){
			for( i = 33 ; i > 19 ; i-- ){
				if(array[i][0] >0){
					return i;
				}
			}
		}
		else if(tipo == 'lomo'){
			for( i = 33 ; i > 19 ; i-- ){
				if(array[i][0] >0){
					return i;
				}
			}
		}
		else if(tipo == 'belly'){
			for( i = 33 ; i > 19 ; i-- ){
				if(array[i][0] >0){
					return i;
				}
			}
		}

		else if(tipo == 'ncq'){
			for( i = 33 ; i > 19 ; i-- ){
				if(array[i][0] >0){
					return i;
				}
			}
		}
	}
	function q1(array,mediana,tipo){

		var aux=0;
		var valMediana;
		var limite = mediana/2;
		var i = 20;

		if(tipo == 'entero'){
			while (i < 34){
				aux += array[i][0];
				if(aux > limite){
					valMediana = i;
					i = 34;
				}
				i++;
			}
			return valMediana;
		}

		else if(tipo == 'lomo'){
			while (i < 34){
				aux += array[i][1];
				if(aux > limite){
					valMediana = i;
					i = 34;
				}
				i++;
			}
			return valMediana;
		}

		else if(tipo == 'belly'){
			while (i < 34){
				aux += array[i][2];
				if(aux > limite){
					valMediana = i;
					i = 34;
				}
				i++;
			}
			return valMediana;
		}

		if(tipo == 'ncq'){
			while (i < 34){
				aux += array[i][3];
				if(aux > limite){
					valMediana = i;
					i = 34;
				}
				i++;
			}
			return valMediana;
		}
	}
	function q3(array,mediana,tipo){

		var aux=0;
		var valq3;
		var i = 20;
		var limite = parseInt(mediana + (mediana/2));

		if(tipo == 'entero'){
			while (i < 34){
				aux += array[i][0];
				if(aux > limite){
					valq3 = i;
					
					i = 34;
				}
				i++;
			}
			return valq3;
		}

		else if(tipo == 'lomo'){
			while (i < 34){
				aux += array[i][1];
				if(aux > limite){
					valq3 = i;
					i = 34;
				}
				i++;
			}
			return valq3;
		}

		else if(tipo == 'belly'){
			while (i < 34){
				aux += array[i][2];
				if(aux > limite){
					valq3 = i;
					i = 34;
				}
				i++;
			}
			return valq3;
		}

		if(tipo == 'ncq'){
			while (i < 34){
				aux += array[i][3];
				if(aux > limite){
					valq3 = i;
					i = 34;
				}
				i++;
			}
			return valq3;
		}
	}	
	function cambia_fecha(val){
		if(val==1){
			return "Enero";
		}
		else if(val==2){
			return "Febrero";
		}
		else if(val==3){
			return "Marzo";
		}
		else if(val==4){
			return "Abril";
		}
		else if(val==5){
			return "Mayo";
		}
		else if(val==6){
			return "Junio";
		}
		else if(val==7){
			return "Julio";
		}
		else if(val==8){
			return "Agosto";
		}
		else if(val==9){
			return "Septiembre";
		}
		else if(val==10){
			return "Octubre";
		}
		else if(val==11){
			return "Noviembre";
		}
		else if(val==12){
			return "Diciembre";
		}
	}

	function dibuja_grafico(array,mitad, anio, mes, dia, centro, jaula){
		anychart.onDocumentReady(function () {
				var data = [
  					{x: "Color Entero", low: inferior(array,'entero'), q1: q1(array,mitad,'entero'), median: mediana(array,mitad,'entero'), q3: q3(array,mitad,'entero'), high: superior(array,'entero') //outliers: [800, 2500, 3200]
  					},
  					{x: "Color Lomo", low: inferior(array,'lomo'), q1: q1(array,mitad,'lomo'), median: mediana(array,mitad,'lomo'), q3: q3(array,mitad,'lomo'), high: superior(array,'lomo') //outliers: [800, 2500, 3200]
  					},	
  					{x: "Color Belly", low: inferior(array,'belly'), q1: q1(array,mitad,'belly'), median: mediana(array,mitad,'belly'), q3: q3(array,mitad,'belly'), high: superior(array,'belly') //outliers: [800, 2500, 3200]
  					},	
  					{x: "Color NCQ", low: inferior(array,'ncq'), q1: q1(array,mitad,'ncq'), median: mediana(array,mitad,'ncq'), q3: q3(array,mitad,'ncq'), high: superior(array,'ncq') //outliers: [800, 2500, 3200]
  					},			
  	 	
				];
				chart = anychart.box();
				chart.background().fill("#3E3D3D");
				// set title
				if (anio == ''){
					chart.title("Distribución de color");
				}

				if (anio != ''){
					if(mes==''){
						chart.title("Distribución de color "+anio);
					}
					else if(mes != ''){
						if(dia == ''){
							chart.title("Distribución de color "+cambia_fecha(mes)+" "+anio);
						}
						else if(dia != ''){
							if(centro == ''){
								chart.title("Distribución de color "+dia+" de "+cambia_fecha(mes)+" "+anio);
							}
							else{
								if(jaula == ''){
									$.ajax({
										url : '/reportes/NombreCentros',
										type : 'get' 
									})
									.done( function(array){	
										i = 0;			
										while ( i < array.length ){
											if(centro == array[i][0]){
												chart.title("Distribución de color "+dia+" de "+cambia_fecha(mes)+" "+anio+" [centro: "+ array[i][1] +"]");
												i = array.length;
										
											}
											i++;
										}
			
									});
									
								}
								else{
									$.ajax({
										url : '/reportes/NombreCentros',
										type : 'get' 
									})
									.done( function(array){	
										i = 0;			
										while ( i < array.length ){
											if(centro == array[i][0]){
												chart.title("Distribución de color "+dia+" de "+cambia_fecha(mes)+" "+anio+" [centro: "+array[i][1]+", jaula: "+jaula+"]");
												i = array.length;
										
											}
											i++;
										}
			
									});
									
								}
							}
						}
					}
				}
  				
  				chart.title().padding(5);
  				chart.title().enabled(true);
  				chart.xAxis().labels().fontColor("#fff");
  				chart.yAxis().labels().fontColor("#fff");
  				chart.xAxis().title("Secciones");
				chart.yAxis().title("Color Salmofan");				
				// create a box series and set the data
				series = chart.box(data);
				series.normal().medianStroke("#dd2c00", 1);
				series.hovered().medianStroke("#dd2c00", 2);
				series.selected().medianStroke("#dd2c00", 2);
				$('#grafico').html("");
				// set the container id
				chart.container("grafico");
				// initiate drawing the chart
				chart.draw();
			});
	}
	function dibuja_torta(container,nombre, total, porc){
		anychart.onDocumentReady(function () {

			var data = [
				
				{
					x : 'Sin '+nombre,
					value :porc,
					normal:  {
      					fill: "#408AE3",
      					hatchFill: "percent50"        
   					},
   					hovered: {
      					fill: "#2E65A7",
      					hatchFill: "percent50",
      					outline: {
        					enabled: true,
        					width: 6,
        					fill: "#404040",
        					stroke: null
      					}
   					},
   					selected: {
      					outline: {
        					enabled: true,
        					width: 6,
        					fill: "#204573",
        					stroke: null
      					}
   					}

				},
				{
					x : 'Con '+nombre,
					value :total-porc,
					normal:  {
      					fill: "#E34646",
      					hatchFill: "percent50"        
   					},
   					hovered: {
      					fill: "#BB3939",
      					hatchFill: "percent50",
      					outline: {
        					enabled: true,
        					width: 6,
        					fill: "#404040",
        					stroke: null
      					}
   					},
   					selected: {
      					outline: {
        					enabled: true,
        					width: 6,
        					fill: "#7C2727",
        					stroke: null
      					}
   					}

				}
			];

      	chart = anychart.pie3d(data);

      	// set chart title text settings
      	chart.title(nombre).radius('80%');
      	chart.background().fill("#3E3D3D");

      	// set container id for the chart
      	chart.container(container);
      	chart.select(1)
      	// initiate chart drawing

      	chart.draw();
    	});
	}
	$('#anio').on('change',function(){
		$('#mes').empty();
		$('#mes').append("<option selected disabled>-- mes --</option>");
		$('#dia').empty();
		$('#dia').append("<option selected disabled>-- dia --</option>");
		$('#centro').empty();
		$('#centro').append("<option selected disabled>-- Centro --</option>");
		$('#jaula').empty();
		$('#jaula').append("<option selected disabled>-- Jaula --</option>");
		var val = this.value;
		$('#grafico').html(data);
		$.get('/reportes/mes',{anio : val}, function(array){
			$('#mes').empty();
			$('#mes').append("<option selected disabled>-- mes --</option>");
			for ( i = 0 ; i < array[1].length ; i++ ){
				$('#mes').append("<option value='"+  array[1][i] +"'>"+ cambia_fecha(array[1][i])+"</option>");
			}
			var mitad = array[0][0]/2;
			dibuja_grafico(array,mitad,val, '', '', '', '');
		});
		$.get('/reportes/donutAnio',{anio : val}, function(array){
			$("#torta1").html("");
			$("#torta2").html("");
			$("#torta3").html("");
			dibuja_torta(torta1,'Gaping',array[0],array[1]);
			dibuja_torta(torta2,'Melanosis',array[0],array[2]);
			dibuja_torta(torta3,'Hematomas',array[0],array[3]);
		});
		$.get('/reportes/centros2',{anio : val, empresa:empresa}, function(array){
			$('#centro').empty();
			$('#centro').append("<option selected disabled>-- Centro --</option>");
			for ( i = 0 ; i < array[1].length ; i++ ){
				$('#centro').append("<option value='"+ array[1][i] +"'>"+ array[1][i] +"</option>");
			}
			var mitad = array[0][0]/2;
		});
	});
	$('#mes').on('change', function(){
		$('#dia').empty();
		$('#dia').append("<option selected disabled>-- dia --</option>");
		$('#centro').empty();
		$('#centro').append("<option selected disabled>-- Centro --</option>");
		$('#jaula').empty();
		$('#jaula').append("<option selected disabled>-- Jaula --</option>");
		var val = this.value;
		$('#grafico').html(data);
		var anio = document.getElementById('anio').value;
		$.get('/reportes/dia',{mes : val, anio : anio, empresa: empresa}, function(array){
			$('#dia').empty();
			$('#dia').append("<option selected disabled>-- Dia --</option>");
			for ( i = 0 ; i < array[1].length ; i++ ){
				$('#dia').append("<option value='"+  array[1][i] +"'>"+ array[1][i] +"</option>");
			}
			var mitad = array[0][0]/2;
			dibuja_grafico(array,mitad,anio, val, '', '', '');
		});
		$.get('/reportes/donutDia',{anio : anio, mes : val, empresa: empresa}, function(array){
			$("#torta1").html("");
			$("#torta2").html("");
			$("#torta3").html("");
			dibuja_torta(torta1,'Gaping',array[0],array[1]);
			dibuja_torta(torta2,'Melanosis',array[0],array[2]);
			dibuja_torta(torta3,'Hematomas',array[0],array[3]);
		});
	});
	$('#dia').on('change', function(){
		$('#centro').empty();
		$('#centro').append("<option selected disabled>-- Centro --</option>");
		$('#jaula').empty();
		$('#jaula').append("<option selected disabled>-- Jaula --</option>");
		var val = this.value;
		$('#grafico').html(data);
		var anio = document.getElementById('anio').value;
		var mes = document.getElementById('mes').value;
		$.get('/reportes/centros',{mes : mes, anio : anio, dia : val , empresa :empresa}, function(array){
			$('#centro').empty();
			$('#centro').append("<option selected disabled>-- Centro --</option>");
			for ( i = 0 ; i < array[1].length ; i++ ){
				$('#centro').append("<option value='"+ array[1][i] +"'>"+ array[1][i] +"</option>");
			}
			var mitad = array[0][0]/2;
			dibuja_grafico(array,mitad, anio, mes, val, '', '');
		});
		$.get('/reportes/donutMes',{anio : anio, mes : mes, dia : val}, function(array){
			$("#torta1").html("");
			$("#torta2").html("");
			$("#torta3").html("");
			dibuja_torta(torta1,'Gaping',array[0],array[1]);
			dibuja_torta(torta2,'Melanosis',array[0],array[2]);
			dibuja_torta(torta3,'Hematomas',array[0],array[3]);
		});
	});
	$('#centro').on('change', function(){
		$('#jaula').empty();
		$('#jaula').append("<option selected disabled>-- Jaula --</option>");
		var val = this.value;
		$('#grafico').html(data);
		var anio = document.getElementById('anio').value;
		var mes = document.getElementById('mes').value;
		var dia = document.getElementById('dia').value;
		$.get('/reportes/jaulas',{mes : mes, anio : anio, dia: dia, centro : val, empresa : empresa}, function(array){
			$('#jaula').empty();
			$('#jaula').append("<option selected disabled>-- Jaula --</option>");
			for ( i = 0 ; i < array[1].length ; i++ ){
				$('#jaula').append("<option value='"+  array[1][i] +"'>"+ array[1][i] +"</option>");
			}
			var mitad = array[0][0]/2;
			dibuja_grafico(array,mitad, anio, mes, dia, val, '');
		});
		$.get('/reportes/donutCentro',{anio : anio, mes : mes, dia : dia, centro : val, empresa:empresa}, function(array){
			$("#torta1").html("");
			$("#torta2").html("");
			$("#torta3").html("");
			dibuja_torta(torta1,'Gaping',array[0],array[1]);
			dibuja_torta(torta2,'Melanosis',array[0],array[2]);
			dibuja_torta(torta3,'Hematomas',array[0],array[3]);
		});
	});
	$('#jaula').on('change', function(){
		var val = this.value;
		$('#grafico').html(data);
		var anio = document.getElementById('anio').value;
		var mes = document.getElementById('mes').value;
		var dia = document.getElementById('dia').value;
		var centro = document.getElementById('centro').value;
		$.get('/reportes/Limjaulas',{mes : mes, anio : anio, dia : dia, centro : centro, jaula : val, empresa:empresa}, function(array){
			var mitad = array[0][0]/2;
			dibuja_grafico(array,mitad, anio, mes, dia, centro, val);
		});

		$.get('/reportes/donutJaula',{anio : anio, dia : dia, mes : mes, centro : centro, jaula : val, empresa: empresa}, function(array){
			$("#torta1").html("");
			$("#torta2").html("");
			$("#torta3").html("");
			dibuja_torta(torta1,'Gaping',array[0],array[1]);
			dibuja_torta(torta2,'Melanosis',array[0],array[2]);
			dibuja_torta(torta3,'Hematomas',array[0],array[3]);
		});
	});
	function fecha(){

		$.get('/reportes/fecha', {empresa : empresa}, function(array){
			if(array[1]==undefined){
				$('#grafico').html("");
				alert("No tenemos informacion para su empresa actual");
			}
			else{
				$('#anio').empty();
				$('#anio').append("<option selected disabled>-- Año de cosecha --</option>");
				for ( i = 0 ; i < array[1].length ; i++ ){
					$('#anio').append("<option onclick='mes('"+  array[1][i] +"'')' value='"+  array[1][i] +"'>"+ array[1][i]+"</option>");
				}
				var mitad = array[0][0]/2;
				dibuja_grafico(array,mitad, '', '', '', '', '');
			}
			
		});
		$.get('/reportes/donutGen',{empresa : empresa}, function(array){
			if(array!=undefined){
				dibuja_torta(torta1,'Gaping',array[0],array[1]);
				dibuja_torta(torta2,'Melanosis',array[0],array[2]);
				dibuja_torta(torta3,'Hematomas',array[0],array[3]);
			}
			else{
				$('#torta1').html('');
				$('#torta2').html('');
				$('#torta3').html('');
			}
		});
	}
	fecha();

	
	
</script>

@endsection