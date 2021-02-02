

    const canvas = document.getElementById('canvas1');
    const ctx = canvas.getContext('2d');

    const canvas2 = document.getElementById('canvas2');
    const ctx2 = canvas2.getContext('2d');

    const canvas3 = document.getElementById('canvas3');
    const ctx3 = canvas3.getContext('2d');

    canvas.width = 600;
    canvas.height = 199;

    canvas2.width = 600;
    canvas2.height = 199;

    canvas3.width = 600;
    canvas3.height = 199;

    const image1 = new Image();
    image1.src = "imagenes/blank.jpg";

    const image2 = new Image();
    image2.src = "imagenes/blank.jpg";

    const image3 = new Image();
    image3.src = "imagenes/blank.jpg";


        function grafico_entero(id){

            var carga = "<div class='preloader-wrapper big active center'>    <div class='spinner-layer spinner-blue-only'>      <div class='circle-clipper left'>        <div class='circle'></div>      </div><div class='gap-patch'>        <div class='circle'></div>      </div><div class='circle-clipper right'>        <div class='circle'></div>      </div>    </div>  </div>";
            $('#colorEntero').html("<h5 class='white-text center'>Cargando grafico</h5>"+carga);
            $('#colorLomo').html("<h5 class='white-text center'>Cargando grafico</h5>"+carga);
            $('#colorBelly').html("<h5 class='white-text center'>Cargando grafico</h5>"+carga);
            $('#colorNCQ').html("<h5 class='white-text center'>Cargando grafico</h5>"+carga);
            $('#melanosis').html("<h5 class='white-text center'>Cargando grafico</h5>"+carga);
            $('#gaping').html("<h5 class='white-text center'>Cargando grafico</h5>"+carga);
            $('#hematomas').html("<h5 class='white-text center'>Cargando grafico</h5>"+carga);

            $.get('/graficos/filete/ce', {id : id}, function(array){

                $('#colorEntero').html("");
                $('#colorLomo').html("");
                $('#colorBelly').html("");
                $('#colorNCQ').html("");

                    new Morris.Bar({
                    element: colorEntero,
                    resize: true,
                    data: [
                        {
                            color : '20',
                            a : array[20][0]
                        },
                            {
                                color : '21',
                                a : array[21][0]
                            }
                            ,
                            {
                                color : '22',
                                a : array[22][0]
                            }
                            ,
                            {
                                color : '23',
                                a : array[23][0]
                            }
                            ,
                            {
                                color : '24',
                                a : array[24][0]
                            }
                            ,
                            {
                                color : '25',
                                a : array[25][0]
                            }
                            ,
                            {
                                color : '26',
                                a : array[26][0]
                            }
                            ,
                            {
                                color : '27',
                                a : array[27][0]
                            }
                            ,
                            {
                                color : '28',
                                a : array[28][0]
                            }
                            ,
                            {
                                color : '29',
                                a : array[29][0]
                            }
                            ,
                            {
                                color : '30',
                                a : array[30][0]
                            }
                            ,
                            {
                                color : '31',
                                a : array[31][0]
                            }
                            ,
                            {
                                color : '32',
                                a : array[32][0]
                            }
                            ,
                            {
                                color : '33',
                                a : array[33][0]
                            }
                            ,
                            {
                                color : '34',
                                a : array[34][0]
                            }
                        ],
                        xkey: 'color',
                        ykeys: ['a'],
                        labels: ['Entero']
                    });


                    new Morris.Bar({
                    element: colorLomo,
                    resize : true,
                    data: [
                        {
                            color : '20',
                            a : array[20][1]
                        },
                            {
                                color : '21',
                                a : array[21][1]
                            }
                            ,
                            {
                                color : '22',
                                a : array[22][1]
                            }
                            ,
                            {
                                color : '23',
                                a : array[23][1]
                            }
                            ,
                            {
                                color : '24',
                                a : array[24][1]
                            }
                            ,
                            {
                                color : '25',
                                a : array[25][1]
                            }
                            ,
                            {
                                color : '26',
                                a : array[26][1]
                            }
                            ,
                            {
                                color : '27',
                                a : array[27][1]
                            }
                            ,
                            {
                                color : '28',
                                a : array[28][1]
                            }
                            ,
                            {
                                color : '29',
                                a : array[29][1]
                            }
                            ,
                            {
                                color : '30',
                                a : array[30][1]
                            }
                            ,
                            {
                                color : '31',
                                a : array[31][1]
                            }
                            ,
                            {
                                color : '32',
                                a : array[32][1]
                            }
                            ,
                            {
                                color : '33',
                                a : array[33][1]
                            }
                            ,
                            {
                                color : '34',
                                a : array[34][1]
                            }
                        ],
                        xkey: 'color',
                        ykeys: ['a'],
                        labels: ['Lomo']
                    });

                    new Morris.Bar({
                    element: colorBelly,
                    resize : true,
                    data: [
                        {
                            color : '20',
                            a : array[20][2]
                        },
                            {
                                color : '21',
                                a : array[21][2]
                            }
                            ,
                            {
                                color : '22',
                                a : array[22][2]
                            }
                            ,
                            {
                                color : '23',
                                a : array[23][2]
                            }
                            ,
                            {
                                color : '24',
                                a : array[24][2]
                            }
                            ,
                            {
                                color : '25',
                                a : array[25][2]
                            }
                            ,
                            {
                                color : '26',
                                a : array[26][2]
                            }
                            ,
                            {
                                color : '27',
                                a : array[27][2]
                            }
                            ,
                            {
                                color : '28',
                                a : array[28][2]
                            }
                            ,
                            {
                                color : '29',
                                a : array[29][2]
                            }
                            ,
                            {
                                color : '30',
                                a : array[30][2]
                            }
                            ,
                            {
                                color : '31',
                                a : array[31][2]
                            }
                            ,
                            {
                                color : '32',
                                a : array[32][2]
                            }
                            ,
                            {
                                color : '33',
                                a : array[33][2]
                            }
                            ,
                            {
                                color : '34',
                                a : array[34][2]
                            }
                        ],
                        xkey: 'color',
                        ykeys: ['a'],
                        labels: ['Belly']
                    });

                    new Morris.Bar({
                    element: colorNCQ,
                    resize : true,
                    data: [
                        {
                            color : '20',
                            a : array[20][3]
                        },
                            {
                                color : '21',
                                a : array[21][3]
                            }
                            ,
                            {
                                color : '22',
                                a : array[22][3]
                            }
                            ,
                            {
                                color : '23',
                                a : array[23][3]
                            }
                            ,
                            {
                                color : '24',
                                a : array[24][3]
                            }
                            ,
                            {
                                color : '25',
                                a : array[25][3]
                            }
                            ,
                            {
                                color : '26',
                                a : array[26][3]
                            }
                            ,
                            {
                                color : '27',
                                a : array[27][3]
                            }
                            ,
                            {
                                color : '28',
                                a : array[28][3]
                            }
                            ,
                            {
                                color : '29',
                                a : array[29][3]
                            }
                            ,
                            {
                                color : '30',
                                a : array[30][3]
                            }
                            ,
                            {
                                color : '31',
                                a : array[31][3]
                            }
                            ,
                            {
                                color : '32',
                                a : array[32][3]
                            }
                            ,
                            {
                                color : '33',
                                a : array[33][3]
                            }
                            ,
                            {
                                color : '34',
                                a : array[34][3]
                            }
                        ],
                        xkey: 'color',
                        ykeys: ['a'],
                        labels: ['NQC']
                    });
            });

            $.get('/graficos/filete/ot', {id : id}, function(array){
                var porcMel;
                var porcHem;
                var porcGap;

                porcGap = (array[1])/(array[0]/100);
                porcMel = (array[2])/(array[0]/100);
                porcHem = (array[3])/(array[0]/100);


                $('#melanosis').html("");
                    Morris.Donut({
                        element: melanosis,
                        data: [
                            {label: "con melanosis", color: '#BD1111' ,value: (100-porcMel).toFixed(2) , labelColor: '#323DA9' },
                            {label: "sin melanosis", color: '#323DA9',value: porcMel.toFixed(2) , labelColor: '#323DA9 ' },
                            
                        ],
                        labelColor: 'white'              
                    }); 


                    $('#hematomas').html("");
                    Morris.Donut({
                        element: hematomas,
                        data: [
                            {label: "con hematomas", color: '#BD1111',value: (100-porcHem).toFixed(2) , labelColor: '#323DA9 ' },
                            {label: "sin hematomas", color: '#323DA9',value: porcHem.toFixed(2) , labelColor: '#323DA9 ' },
                            
                        ],
                        labelColor: 'white'              
                    });


                    $('#gaping').html("");
                    Morris.Donut({
                        element: gaping,
                        data: [
                        {label: "con gaping", color: '#BD1111',value: (100-porcGap).toFixed(2) , labelColor: '#323DA9 ' },
                            {label: "sin gaping", color: '#323DA9',value: porcGap.toFixed(2) },
                            
                        ],
                        labelColor: 'white'           
                    });


            });

            $.get('/graficos/filete/mel',{id : id},function(array){
                

                var total_imagen = canvas.width*canvas.height*4;
                var aux = 0;
                var nuevaImagen = [];
                var json = JSON.parse(array[1]);
                

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


            })

            $.get('/graficos/filete/gap',{id : id},function(array){
                

                var total_imagen2 = canvas2.width*canvas2.height*4;
                var aux2 = 0;
                var nuevaImagen2 = [];
                var json2 = JSON.parse(array[1]);
                

                for (x = 0 ; x < 199 ; x++ ) {
                    for ( i = 0 ; i < 600 ; i++){

                        if (json2[x][i] == "NaN"){
                            nuevaImagen2[aux2] = '181';
                            nuevaImagen2[aux2+1] = '181';
                            nuevaImagen2[aux2+2] = '181';
                            nuevaImagen2[aux2+3] = '0'; 
                        }

                        else if (json2[x][i] >= 0 && json2[x][i] < 5){
                            nuevaImagen2[aux2] = '0';
                            nuevaImagen2[aux2+1] = '5';
                            nuevaImagen2[aux2+2] = '158';
                            nuevaImagen2[aux2+3] = '0'; 
                        }

                        else if (json2[x][i] >= 5 && json2[x][i] < 10){
                            nuevaImagen2[aux2] = '0';
                            nuevaImagen2[aux2+1] = '98';
                            nuevaImagen2[aux2+2] = '208';
                            nuevaImagen2[aux2+3] = '0'; 
                        }

                        else if (json2[x][i] >= 10 && json2[x][i] < 15){
                            nuevaImagen2[aux2] = '0';
                            nuevaImagen2[aux2+1] = '208';
                            nuevaImagen2[aux2+2] = '195';
                            nuevaImagen2[aux2+3] = '0'; 
                        }

                        else if (json2[x][i] >= 15 && json2[x][i] < 20){
                            nuevaImagen2[aux2] = '0';
                            nuevaImagen2[aux2+1] = '208';
                            nuevaImagen2[aux2+2] = '123';
                            nuevaImagen2[aux2+3] = '0'; 
                        }

                        else if (json2[x][i] >= 20 && json2[x][i] < 25){
                            nuevaImagen2[aux2] = '208';
                            nuevaImagen2[aux2+1] = '145';
                            nuevaImagen2[aux2+2] = '0';
                            nuevaImagen2[aux2+3] = '0'; 
                        }

                        else if (json2[x][i] >= 25 && json2[x][i] < 30){
                            nuevaImagen2[aux2] = '232';
                            nuevaImagen2[aux2+1] = '46';
                            nuevaImagen2[aux2+2] = '0';
                            nuevaImagen2[aux2+3] = '0'; 
                        }

                        else if (json2[x][i] >= 30){
                            nuevaImagen2[aux2] = '255';
                            nuevaImagen2[aux2+1] = '0';
                            nuevaImagen2[aux2+2] = '0';
                            nuevaImagen2[aux2+3] = '0'; 
                        } 
                

                        aux2 = aux2+4;
                    }
                }

                ctx2.drawImage(image2,0,0,600,200);
                const scannedImage2 = ctx2.getImageData(0,0, 600, 199);
        
                const scannedData2 = scannedImage2.data;
                for (i = 0 ; i < scannedData2.length ; i+=4){
                    scannedData2[i] = nuevaImagen2[i];
                    scannedData2[i+1] = nuevaImagen2[i+1];
                    scannedData2[i+2] = nuevaImagen2[i+2];
                }
                scannedImage2.data = scannedData2;
                ctx2.putImageData(scannedImage2,0,0);


            })
            

            $.get('/graficos/filete/hem',{id : id},function(array){
                

                var total_imagen3 = canvas3.width*canvas3.height*4;
                var aux3 = 0;
                var nuevaImagen3 = [];
                var json3 = JSON.parse(array[1]);
                

                for (x = 0 ; x < 199 ; x++ ) {
                    for ( i = 0 ; i < 600 ; i++){

                        if (json3[x][i] == "NaN"){
                            nuevaImagen3[aux3] = '181';
                            nuevaImagen3[aux3+1] = '181';
                            nuevaImagen3[aux3+2] = '181';
                            nuevaImagen3[aux3+3] = '0'; 
                        }

                        else if(json3[x][i]>=0 && json3[x][i]<=10){
                            nuevaImagen3[aux3] = '0';
                            nuevaImagen3[aux3+1] = '5';
                            nuevaImagen3[aux3+2] = '158';
                            nuevaImagen3[aux3+3] = '0'; 
                        }

                        else if (json3[x][i]>10 && json3[x][i]<=20){
                            nuevaImagen3[aux3] = '0';
                            nuevaImagen3[aux3+1] = '6';
                            nuevaImagen3[aux3+2] = '201';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>20 && json3[x][i]<=30){
                            nuevaImagen3[aux3] = '0';
                            nuevaImagen3[aux3+1] = '76';
                            nuevaImagen3[aux3+2] = '201';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>30 && json3[x][i]<=40){
                            nuevaImagen3[aux3] = '0';
                            nuevaImagen3[aux3+1] = '113';
                            nuevaImagen3[aux3+2] = '201';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>40 && json3[x][i]<=50){
                            nuevaImagen3[aux3] = '0';
                            nuevaImagen3[aux3+1] = '174';
                            nuevaImagen3[aux3+2] = '201';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>50 && json3[x][i]<=60){
                            nuevaImagen3[aux3] = '139';
                            nuevaImagen3[aux3+1] = '236';
                            nuevaImagen3[aux3+2] = '0';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>60 && json3[x][i]<=70){
                            nuevaImagen3[aux3] = '236';
                            nuevaImagen3[aux3+1] = '150';
                            nuevaImagen3[aux3+2] = '0';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>70 && json3[x][i]<=80){
                            nuevaImagen3[aux3] = '0';
                            nuevaImagen3[aux3+1] = '236';
                            nuevaImagen3[aux3+2] = '107';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>80 && json3[x][i]<=90){
                            nuevaImagen3[aux3] = '136';
                            nuevaImagen3[aux3+1] = '236';
                            nuevaImagen3[aux3+2] = '0'; 
                            nuevaImagen3[aux3+3] = '0';
                        }
                        else if (json3[x][i]>90 && json3[x][i]<=100){
                            nuevaImagen3[aux3] = '204';
                            nuevaImagen3[aux3+1] = '236';
                            nuevaImagen3[aux3+2] = '0';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>100 && json3[x][i]<=110){
                            nuevaImagen3[aux3] = '236';
                            nuevaImagen3[aux3+1] = '146';
                            nuevaImagen3[aux3+2] = '0';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>110 && json3[x][i]<=120){
                            nuevaImagen3[aux3] = '236';
                            nuevaImagen3[aux3+1] = '104';
                            nuevaImagen3[aux3+2] = '0';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>120 && json3[x][i]<=130){
                            nuevaImagen3[aux3] = '236';
                            nuevaImagen3[aux3+1] = '57';
                            nuevaImagen3[aux3+2] = '0';
                            nuevaImagen3[aux3+3] = '0'; 
                        }
                        else if (json3[x][i]>130){
                            nuevaImagen3[aux3] = '236';
                            nuevaImagen3[aux3+1] = '0';
                            nuevaImagen3[aux3+2] = '0';
                            nuevaImagen3[aux3+3] = '0'; 
                        } 
                

                        aux3 = aux3+4;
                    }
                }

                ctx3.drawImage(image3,0,0,600,200);
                const scannedImage3 = ctx3.getImageData(0,0, 600, 199);
        
                const scannedData3 = scannedImage3.data;
                for (i = 0 ; i < scannedData3.length ; i+=4){
                    scannedData3[i] = nuevaImagen3[i];
                    scannedData3[i+1] = nuevaImagen3[i+1];
                    scannedData3[i+2] = nuevaImagen3[i+2];
                }
                scannedImage3.data = scannedData3;
                ctx3.putImageData(scannedImage3,0,0);


            })

        }

    function borra_jaula(id){
        var opt1 = confirm("¿Está seguro que desea eliminar por completo esta jaula?");
        if (opt1 == true){
            var opt2 = confirm("Esta acción no se puede deshacer, confirme su decisión");
            if(opt2 == true){
                $.get('/jaula/borra', {id : id}, function(response){
                    if(response[0] == "borrado"){
                        alert("Jaula borrada con exito");
                        $('#tabla_jaula').html('');
                        $('#cierra_modal_1').click();
                    }
                });
            }
        }
    }

    function borra_centro(id){
        var opt1 = confirm("¿Está seguro que desea eliminar por completo este centro?");
        if (opt1 == true){
            var opt2 = confirm("Esta acción no se puede deshacer, confirme su decisión");
            if(opt2 == true){
                $.get('/centro/borra', {id : id}, function(response){
                    if(response[0] == "borrado"){
                        alert("Centro borrado con exito");
                        $('#tabla_centro').html('');
                        $('#cierra_modal_2').click();
                    }
                });
            }
        }
    }

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
