<?php include("sesion.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximun-scale=1, minimum-scale=1">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/profile_style.css">
    <?php
        $listado = $_SESSION["ejercicios"];
        $piernas = substr_count($listado,'Piernas');
        $brazos = substr_count($listado,'Brazos');
        $abdomen = substr_count($listado,'Abdomen');
        $espalda = substr_count($listado,'Espalda');
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      
      var piernas = parseInt(<?php echo $piernas; ?>);
      var brazos = parseInt(<?php echo $brazos; ?>);
      var abdomen = parseInt(<?php echo $abdomen; ?>);
      var espalda = parseInt(<?php echo $espalda; ?>);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Zona Corporal', 'Cantidad de veces trabajada'],
          ['Piernas',    piernas],
          ['Brazos',      brazos],
          ['Abdomen',  abdomen],
          ['Espalda', espalda]
        ]);

        var options = {
          title: 'Zonas trabajadas',
          pieHole: 0.4,
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <input type="checkbox" name="" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
                <img src="../img/logo_blanco.png" width="60px" alt="">
                <div class="brand-icons">
                    <span class="las la-bell"></span>
                    <span class="las la-user-circle"></span>
                </div>
            </div>
        </div>
        
        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="../img/fotos/<?php echo $_SESSION["foto"]; ?>" alt="">
                <div>
                    <h3>Perfil de Usuario</h3>
                    <span><?php echo $_SESSION["email"]; ?></span>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Datos personales</span>
                </div>
                <ul>
                    <li>
                        <span class="las"></span>
                        Nombre: <?php echo $_SESSION["usuario"] ?>
                        
                    </li>
                    <li>
                        <span class="las"></span>
                        Apellidos: <?php echo $_SESSION["apellidos"]; ?>
                    </li>
                    <li>
                        <span class="las"></span>
                        Edad: <?php echo $_SESSION["edad"]; ?>
                    </li>
                </ul>
                <div class="menu-head">
                    <span>Estado físico</span>
                </div>
                <ul>
                    <li>
                        
                            <span class="las"></span>
                            Altura : <?php echo $_SESSION["altura"]; ?> m
                        
                    </li>
                    <li>
                        
                            <span class="las"></span>
                            Peso actual: <?php echo $_SESSION["peso"]; ?> kg
                        
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                    <span class="las la-bars"></span>
                </label>
            </div>
            <div class="header-icons">
                <span class="las la-search"></span>
                <span class="las la-bookmark"></span>
                <span class="las la-sms"></span>
            </div>
        </header>
        <main>
            <div class="page-header">
                <div>
                    <h1>Programa personalizado para <?php echo $_SESSION["usuario"] ?></h1>
                    <small>Programa personalizado de entrenamiento deportivo</small>
                </div>
                <div class="header-actions">
                    <a href="salir.php"><button><span class="las la-file-export"></span>Exit</button></a>
                    <a href="eliminar-perfil.php"><button><span class="las la-tools"></span>Eliminar cuenta</button></a>
                </div>
            </div>
            <div class="cards">
            <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Programa</span>
                                <small>de entrenamiento diario</small>
                            </div>
                            <h2><?php echo $_SESSION["id_programa"]; ?></h2>
                            <small>Definición y fitness</small>
                        </div>
                        <div class="card-chart danger">
                            <span class="las la-chart-line"></span>
                        </div>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Indice de Masa Corporal (IMC)</span>
                                <small>Valor aproximado</small>
                            </div>
                            <?php
                                $sexo =  $_SESSION["sexo"];
                                $peso = doubleval($_SESSION["peso"]);
                                $altura = doubleval($_SESSION["altura"]);
                                $imc = $peso/($altura*$altura);
                                $respuesta = "";
                                $imc_img = "";

                                if ($imc<15){
                                    $respuesta = "Delgadez muy severa";
                                    $imc_img = "1";
                                }else if($imc >= 15 && $imc < 15.9){
                                    $respuesta = "Delgadez severa";
                                    $imc_img = "1";
                                }else if($imc >= 16 && $imc < 18.4){
                                    $respuesta = "Delgadez";
                                    $imc_img = "1";
                                }else if($imc >= 18.5 && $imc < 24.9){
                                    $respuesta = "Peso Saludable";
                                    $imc_img = "2";
                                }else if($imc >= 25 && $imc < 29.9){
                                    $respuesta = "Sobrepeso";
                                    $imc_img = "3";
                                }else if($imc >= 30 && $imc < 34.9){
                                    $respuesta = "Obesidad Moderada";
                                    $imc_img = "4";
                                }else if($imc >= 35 && $imc < 39.9){
                                    $respuesta = "Obesidad Severa";
                                    $imc_img = "5";
                                }else if($imc > 40){
                                    $respuesta = "Obesidad muy severa";
                                    $imc_img = "5";
                                }else{
                                    $respuesta = "Sin respuesta posible";
                                    $imc_img = "";
                                }

                            ?>
                            <h2><?php echo($respuesta) ?></h2>
                            <small>resultado: <?php echo($imc) ?></small>
                        </div>
                        <div class="card-chart success">
                            <span><?php echo ('<img src="../img/imc/imc_'.$sexo.'_'.$imc_img.'.jpg"; style="height: 100px;" >') ?> </span>
                        </div>
                    </div>
                </div>
                <div class="card-single">
                    <div >
                        
                            <style>
                                .c-body{
                                    width: 100%;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }
                                .c-time{
                                    background-color: #353535;
                                    width: 100%;
                                    height: 135px;
                                    border-radius: 20px;
                                }
                                .c-time>.screen{
                                    color: white;
                                    background-color: #353535;
                                    margin: 6px;
                                    text-align: center;
                                }
                                .c-btn{
                                    display: grid;
                                    grid-template-columns: repeat(3, 1fr);
                                    gap: 70px;    
                                    margin: 1px 0.5rem;
                                }

                                .c-btn>button{    
                                    display: block;
                                    background: none;
                                    border: none;
                                    outline: inherit;
                                    cursor: pointer;

                                    height: 80px;
                                    border-radius: 50%;
                                    font-size: 50px;
                                    color: white;
                                }
                                .c-btn>button:hover{
                                    transform: scale(1.2);
                                    transition: 0.5s;
                                    color: #8da2fb;
                                }
                            </style>
                        <div class="c-body">
                            <div class="c-time" style="margin: 0 auto;">
                                <div class="screen">
                                    <span id="time" style="font-weight: 300;font-size: 50px;">00:00:00.00</span>
                                </div>  
                                <div class="c-btn">               
                                    <button id="btn-start">&#9658;</button>                          
                                    <button id="btn-stop">&#8718;</button>                             
                                    <button id="btn-reset">&#8635;</button>                                     
                                </div>          
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
            <div class="jobs-grid">
                <div class="analytics-card">
                    <div class="analytics-head">
                        <div class="analytics-chart">
                            <h3>Trabajo corporal durante la sesión</h3>
                            </br>
                            <div id="donutchart" style="width: 500px; height: 300px;"></div>
                            <div class="analytics-note">
                                <small>Nota: Para mantener un entrenamiento completo, las proporciones cambiarán de forma diaria</small>
                            </div>
                            <div class="analytics-btn">
                                <button>Generate report</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="jobs">
                    <h2>Ejercicios previstos <small>Dia: <?php echo $_SESSION["dia"] ?> <span class="las la-arrow-right"></span></small></h2>
                    <div class="table-responsive">
                        <table width="100%">
                            <tbody>
                            <?php 
                                $listado = $_SESSION["ejercicios"];
                                $listaEjer = explode(",",$listado);

                                for($i =0; $i<count($listaEjer); $i++){
                                    $sesion = $listaEjer[$i];
                                    $ejercicio = explode(".",$sesion);
                                    echo(
                                        '<tr>
                                            <td>
                                                <div>
                                                    <span class="indicator"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="nombreEjer'.$i.'">'.$ejercicio[0].'</div>
                                            </td>
                                            <td>
                                                <div>'.$ejercicio[1].'</div>
                                            </td>
                                            <td>
                                                <div>'.$ejercicio[2].'</div>
                                            </td>
                                            <td>
                                                <div><img src="../img/ejercicios/'.$ejercicio[3].'.gif" style="height: 60px" alt=""></div>
                                            </td>
                                            <td>
                                                <div>
                                                    <button onclick="tachado'.$i.'()">Realizado</button>
                                                </div>
                                            </td>
                                        </tr>'
                                    );
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <label for="sidebar-toggle" class="body-label"></label>
    <script>
        function tachado0(){
            document.getElementById("nombreEjer0").style="text-decoration: line-through; color:#ccc;";
        }
        function tachado1(){
            document.getElementById("nombreEjer1").style="text-decoration: line-through; color:#ccc;";
        }
        function tachado2(){
            document.getElementById("nombreEjer2").style="text-decoration: line-through; color:#ccc;";
        }
        function tachado3(){
            document.getElementById("nombreEjer3").style="text-decoration: line-through; color:#ccc;";
        }
        function tachado4(){
            document.getElementById("nombreEjer4").style="text-decoration: line-through; color:#ccc;";
        }
        function tachado5(){
            document.getElementById("nombreEjer5").style="text-decoration: line-through; color:#ccc;";
        }
        function tachado6(){
            document.getElementById("nombreEjer6").style="text-decoration: line-through; color:#ccc;";
        }
        function tachado7(){
            document.getElementById("nombreEjer7").style="text-decoration: line-through; color:#ccc;";
        }

        window.onload = () => {
            h = 0; m = 0; s = 0; mls = 0; timeStarted= 0;
            time = document.getElementById("time");
            btnStart = document.getElementById("btn-start");
            btnStop = document.getElementById("btn-stop");
            btnReset = document.getElementById("btn-reset");
            event();
        };
        function event(){
            btnStart.addEventListener("click", start); 
            btnStop.addEventListener("click", stop);
            btnReset.addEventListener("click", reset);   
        }
        function write(){
            let ht, mt, st, mlst;
            mls++;
            
            if (mls > 99){ s++ ; mls= 0; }
            if (s > 59){ m++; s= 0;}
            if (m > 59){ h++; m= 0;}
            if (h > 24) h= 0;
            
            mlst = ('0' + mls).slice(-2);
            st = ('0' + s).slice(-2);
            mt = ('0' + m).slice(-2);
            ht = ('0' + h).slice(-2);

            time.innerHTML = `${ht}:${mt}:${st}.${mlst}`;
        }
        function start(){
            write();
            timeStarted = setInterval(write, 10);
            btnStart.removeEventListener("click", start);
        }
        function stop(){
            clearInterval(timeStarted);
            btnStart.addEventListener("click", start);
        }
        function reset(){   
            clearInterval(timeStarted);
            time.innerHTML = "00:00:00.00"
            h= 0; m= 0 ; s= 0; mls= 0;
            btnStart.addEventListener("click", start);      
        }

    </script>
</body>
</html>

<!--

Elevación de rodillas.30 segundos.Piernas.1,Flexiones.30 segundos.Brazos.2,Flexión de rodillas andando.30 segundos.Piernas.3,Climbers.30 segundos.Piernas y Abdomen.4,Elevación de rodillas.30 segundos.Piernas.1,Shoulder Taps.30 segundos.Brazos.5,Sentadillas con salto.30 segundos.Piernas.6,Plancha con elevación.30 segundos.Brazos y Espalda.7

-->