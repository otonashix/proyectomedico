<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Medico</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./imagenes/logi.jpg">

    <!-- Bootstrap CSS v5.2.1 -->
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

</head>
<body>
   
<!--
    <header>
        <div class="header__superior">
            <div class="logo">
                <img src="./imagenes/portada.jpg" alt="">
            </div>
        </div>
--> 
<header>
        <div class="container__menu">

            <div class="menu">

                <nav>
                    <ul>
                        <li><a href="index.php" id="selected"></a></li>
                        <li><a href="Citas.php">Citas</a>
                            <ul>
                                <li><a href="#">Consultar</a></li>
                                <li><a href="#">Solicitar</a></li>
                                <li><a href="#">Cancelar</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="preguntas.php">Preguntas</a></li>
                        <li><a href="Contacto.php">Contactos</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </nav>
            </div>

        </div>

    
        <div class="header__superior">
            <div class="logo">
                <img src="./imagenes/portada.jpg" alt="">
            </div>
        </div>
    
        </header>

                <!-- Calentadio -->

        <div class="container">
            <div class="d-flex justify-content-start pt-3">
                <div id='calendar'></div>
            </div>

        </div>


                <script>

                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        locale: "es",
                        headerToolbar:{
                            left:'title',
                            center:'',
                            right:'prev,next',
                        }
                        });
                        calendar.render();
                    });

                </script>



 <!--pie de pagina-->

 <footer>
    
    <div class="logotipo">
        <img src="./imagenes/logi-removebg-preview.png" alt="">
    </div>


    <div class="pie">
        <h1>Nosotros</h1>
        <br>
        <p>Aliados <br> Empleadores <br> Contactanos <br> Normatividad <br> Ubicación <br> Servicios</p>
    </div>

    <div class="pie2">
        <h1>Lineas de Atención</h1>
        <p> Tolima: 6XXXXXXX  <br> Linea Nacional de Informacion: 01-8000-XXX-XXX (Tel. fijo) <br> Linea Nacional de Atención: 01-8000-XXX-XXX (Tel. fijo) 
            <br> Marcación desde Movil: #9XX (Tigo, Claro, Movistar) </p>
            <br><br><br><br>
            <a href="https://www.facebook.com/" class="face" ><img src="./imagenes/facebook.png" alt=""></a>
            <a href="https://twitter.com/home" class="twitter"><img src="./imagenes/x.png" alt=""></a>
            <a href="https://www.youtube.com/" class="youtube"><img src="./imagenes/youtube.png" alt=""></a>
    </div>

</footer>



<!--Burbujas-->
<div class="area" >
    <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
    </ul>
</div >


    <!-- Bootstrap JavaScript Libraries -->
    <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>


</body>
</html>