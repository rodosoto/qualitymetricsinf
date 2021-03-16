<!DOCTYPE html>
<html>
<head>
	<title>Reporte Automatico</title>
	<meta charset="utf-8">
	<style type="text/css">

		.body{
			font-family: Calibri Light;
			width: 100%;
			
		}
		table{
			margin: auto;
		}


		.parte1{
			width: 100%;
			text-align: center;
			color: #1848A8;			
			margin: auto;
			padding: auto;
		}

		.parte2{
			width: 100%;
			color: black;
			text-align: left;
			margin: auto;
			padding-top-top: 70px;
			

		}
		.parte3{
			color: black;
			text-align: left;
			margin: auto;
			width: 100%;
		}
		.parte4{
			color: #1848A8;
			text-align: center;
			margin: auto;
			width: 100%;
			height: 600px;
		}
		.parte5{
			order: 5;
			color: #1848A8;
			text-align: left;
			margin: auto;
			width: 100%;
		}

		#item1{
			color: #1848A8;
		}

		.item4{
			color: #1848A8;
			text-align: center;
		}

		#item3{
			text-align: center;
		}

		.boxplot{
			height: 500px;
		}

		

		
		
	</style>
</head>
<body class="body">

	<table border="solid">
		<tr>
			<td class="parte1">
				<img src="https://www.qualitymetrics.cl/img/logo-header.png">
				<h2 id="titulo">REPORTE AUTOMÁTICO<br>EQUIPO FILLET QUALITY</h2>
				<h3 id="subtitulo">Resumen por centro de cultivo.</h3>
				<h3 id="subtitulo">(datos desde el {{ $resp[2] }} al {{ $resp[3] }}).</h3>
			</td>
		</tr>
		<tr>
			<td class="parte2">
				<h2 id="item1">DATOS REGISTRADOS EN EL PERIODO:</h2>
				<h3 id="item2">Número de filetes analizados: {{ $resp[0]}}<br>Numero de centros registrados: {{ $resp[1]}}</h3>
				
			</td>
		</tr>
		<tr>
			<td class="parte3">
				<h2 id="item1">CENTROS DE CULTIVO REGISTRADOS EN EL PERÍODO:</h2>
				<h3 id="item3">Distribución porcentual<br>de Filetes Analizados, por Centro</h3>
				<img class="donut1" src="{{ $resp[5] }}">	
			</td>
		</tr>
		<tr>
			<td>
				<h2 id="item1">REGISTRO DE COLOR SEGUN CENTRO DE CULTIVO:</h2>
			</td>
		</tr>
		<tr>
			<td class="parte4">
				<h2 class="item4">Color Entero</h2>
				<img class="boxplot" src="https://quickchart.io/chart?c={type:'boxplot', data:{labels:[2012,2013,2014,2015], datasets:[{label:'Data',data:[[12,6,3,4], [1,8,8,15],[1,1,1,2,3,5,9,8], [19,-3,18,8,5,9,9]], backgroundColor:'rgba(56,123,45,0.2)', borderColor:'rgba(56,123,45,1.9)'}]}}">
			</td>
		</tr>
		<tr>
			<td class="parte4">
				<h2 class="item4">Color Lomo</h2>
				<img class="boxplot" src="https://quickchart.io/chart?c={type:'boxplot', data:{labels:[2012,2013,2014,2015], datasets:[{label:'Data',data:[[12,6,3,4], [1,8,8,15],[1,1,1,2,3,5,9,8], [19,-3,18,8,5,9,9]], backgroundColor:'rgba(56,123,45,0.2)', borderColor:'rgba(56,123,45,1.9)'}]}}">
			</td>
		</tr>
		<tr>
			<td class="parte4">
				<h2 class="item4">Color Belly</h2>
				<img class="boxplot" src="https://quickchart.io/chart?c={type:'boxplot', data:{labels:[2012,2013,2014,2015], datasets:[{label:'Data',data:[[12,6,3,4], [1,8,8,15],[1,1,1,2,3,5,9,8], [19,-3,18,8,5,9,9]], backgroundColor:'rgba(56,123,45,0.2)', borderColor:'rgba(56,123,45,1.9)'}]}}">
			</td>
		</tr>
		<tr>
			<td class="parte4">
				<h2 class="item4">Color NQC</h2>
				<img class="boxplot" src="https://quickchart.io/chart?c={type:'boxplot', data:{labels:[2012,2013,2014,2015], datasets:[{label:'Data',data:[[12,6,3,4], [1,8,8,15],[1,1,1,2,3,5,9,8], [19,-3,18,8,5,9,9]], backgroundColor:'rgba(56,123,45,0.2)', borderColor:'rgba(56,123,45,1.9)'}]}}">
			</td>
		</tr>
		<tr>
			<td class="parte1">
				<h2>ANÁLISIS DE GAPING:</h2>
				<img src="https://quickchart.io/chart?c={type:'donut',data:{labels:[2012,2013,2014,2015,2016],datasets:[{label:'Users',data:[120,60,50,180,120]}]}}" width="400px">
			</td>	
		</tr>
		<tr>
			<td class="parte1">
				<h2>ANÁLISIS DE HEMATOMAS:</h2>
				<img src="https://quickchart.io/chart?c={type:'donut',data:{labels:[2012,2013,2014,2015,2016],datasets:[{label:'Users',data:[120,60,50,180,120]}]}}" width="400px">
			</td>	
		</tr>
		<tr>
			<td class="parte1">
				<h2>ANÁLISIS DE MELANOSIS:</h2>
				<img src="https://quickchart.io/chart?c={type:'donut',data:{labels:[2012,2013,2014,2015,2016],datasets:[{label:'Users',data:[120,60,50,180,120]}]}}" width="400px">
				<div class="col s4 grey darken-4" id="melanosis" style="height: 200px; padding: 10px">
                    <div class="col s11">
                        <canvas id="canvas1">        
                        </canvas>                           
                    </div>
                    <div class="col s1">
                        <img src="imagenes/hem.png" height="180px">                            
                    </div>
                </div>
			</td>	
		</tr>
	</table>

	

</body>

<script type="text/javascript">
	const canvas = document.getElementById('canvas1');
    const ctx = canvas.getContext('2d');

    canvas.width = 600;
    canvas.height = 199;

    const image1 = new Image();
    image1.src = "imagenes/blank.jpg";

    var empresa = '{{ Auth::user()->empresa }}';
    console.log(empresa);

    $.get('/graficos/filete/mel',{id : '1', empresa: empresa},function(array){
                if(array == 'vacio'){
                    M.toast({html : "No hay datos para HEATMAP MELANOSIS en las ultimas 24 horas", classes : "rounded"});
                }else{

                var total_imagen = canvas.width*canvas.height*4;
                var aux = 0;
                var nuevaImagen = [];
                var arrayAux = [];

                if( array[1].length > 1){
                    for ( x = 0 ; x < array[1].length ; x++ ){
                        arrayAux[aux] = JSON.parse(array[1][0]);
                        aux += 1;
                    }
                    var length = arrayAux.length - 1;
                    for ( x = 1 ; x < arrayAux.length ; x++ ){ 
                        for ( i = 0 ; i < 199 ; i++ ){
                            for ( j = 0 ; j < 600 ; j++ ){
                                if(arrayAux[0][i][j] != "NaN"){
                                    arrayAux[0][i][j] = parseInt(arrayAux[0][i][j]);
                                    arrayAux[0][i][j] += parseInt(arrayAux[x][i][j]);
                                }
                                if( x == length){

                                    prom = parseInt(arrayAux[0][i][j])/(length+1);
                                    arrayAux[0][i][j] =prom;

                                }
                            }
                        }
                    }

                    var json = arrayAux[0];
                         
                }
                else{
                  var json = JSON.parse(array[1][0]);   
                }               

                for (x = 0 ; x < 199 ; x++ ) {
                    for ( i = 0 ; i < 600 ; i++){

                        if (json[x][i] == "NaN"){
                            nuevaImagen[aux] = '181';
                            nuevaImagen[aux+1] = '181';
                            nuevaImagen[aux+2] = '181';
                            nuevaImagen[aux+3] = '0'; 
                        }

                        else if (json[x][i] >= 0 && json[x][i] < 5){
                            nuevaImagen[aux] = '0';
                            nuevaImagen[aux+1] = '5';
                            nuevaImagen[aux+2] = '158';
                            nuevaImagen[aux+3] = '0'; 
                        }

                        else if (json[x][i] >= 5 && json[x][i] < 10){
                            nuevaImagen[aux] = '0';
                            nuevaImagen[aux+1] = '98';
                            nuevaImagen[aux+2] = '208';
                            nuevaImagen[aux+3] = '0'; 
                        }

                        else if (json[x][i] >= 10 && json[x][i] < 15){
                            nuevaImagen[aux] = '0';
                            nuevaImagen[aux+1] = '208';
                            nuevaImagen[aux+2] = '195';
                            nuevaImagen[aux+3] = '0'; 
                        }

                        else if (json[x][i] >= 15 && json[x][i] < 20){
                            nuevaImagen[aux] = '0';
                            nuevaImagen[aux+1] = '208';
                            nuevaImagen[aux+2] = '123';
                            nuevaImagen[aux+3] = '0'; 
                        }

                        else if (json[x][i] >= 20 && json[x][i] < 25){
                            nuevaImagen[aux] = '208';
                            nuevaImagen[aux+1] = '145';
                            nuevaImagen[aux+2] = '0';
                            nuevaImagen[aux+3] = '0'; 
                        }

                        else if (json[x][i] >= 25 && json[x][i] < 30){
                            nuevaImagen[aux] = '232';
                            nuevaImagen[aux+1] = '46';
                            nuevaImagen[aux+2] = '0';
                            nuevaImagen[aux+3] = '0'; 
                        }

                        else if (json[x][i] >= 30){
                            nuevaImagen[aux] = '255';
                            nuevaImagen[aux+1] = '0';
                            nuevaImagen[aux+2] = '0';
                            nuevaImagen[aux+3] = '0'; 
                        } 
                

                        aux = aux+4;
                    }
                }

                ctx.drawImage(image1,0,0,600,200);
                const scannedImage = ctx.getImageData(0,0, 600, 199);
        
                const scannedData = scannedImage.data;
                for (i = 0 ; i < scannedData.length ; i+=4){
                    scannedData[i] = nuevaImagen[i];
                    scannedData[i+1] = nuevaImagen[i+1];
                    scannedData[i+2] = nuevaImagen[i+2];
                }
                scannedImage.data = scannedData;
                ctx.putImageData(scannedImage,0,0);

            }
            })
</script>
</html>



