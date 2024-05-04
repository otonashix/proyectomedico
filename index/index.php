<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Medico</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./imagenes/logi-removebg-preview.png">
</head>
    
<!-- Cabecera de pagina-->
<body>
<script type="importmaps">
{
  "imports": {
    "firebase-app": "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js",
    "firebase-auth": "https://www.gstatic.com/firebasejs/10.4.0/firebase-auth.js",
    "lit": "https://ga.jspm.io/npm:lit@3.1.1/index.js",
    "mustache": "https://ga.jspm.io/npm:mustache@4.2.0/mustache.mjs"
  },
  "scopes": {
    "https://ga.jspm.io/": {
      "@lit/reactive-element": "https://ga.jspm.io/npm:@lit/reactive-element@2.0.3/development/reactive-element.js",
      "lit-element/lit-element.js": "https://ga.jspm.io/npm:lit-element@4.0.3/development/lit-element.js",
      "lit-html": "https://ga.jspm.io/npm:lit-html@3.1.1/development/lit-html.js",
      "lit-html/is-server.js": "https://ga.jspm.io/npm:lit-html@3.1.1/development/is-server.js"
    }
  }
}
    
</script>

<script type="module" src="js/app.js"></script>

<?php 
/*
session_start();
include('conexion/conexion.php');


if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

  
    $stmt = $conn->prepare("SELECT `email` FROM `datos` WHERE `email` = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        $user_email= $row['email'];
    }
}*/
?>
<!--<h5>Bienvenido <?//$user_email?></h5>-->

       
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
                        <li><a href="../ligas/">Ligas</a></li>
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

    <div class="slider">
        <ul>
            <li>
                <img src="./imagenes/respon3.jpg">
            </li>
            <li>
                <img src="./imagenes/respon5.jpg">
            </li>
            <li>
                <img src="./imagenes/respon6.jpg">
            </li>
            <li>
                <img src="./imagenes/respon2.jpg">
            </li>
        </ul>
    </div>


    <section>
        <div class="texto">
            <p>La salud es un aspecto fundamental tanto a nivel individual como en el ámbito laboral. 
              <br>  En el caso de una compañía de deportes como Indeportes, la importancia de promover y cuidar la salud de sus colaboradores 
               <br> adquiere un valor aún mayor. La salud de la compañía no se limita únicamente a la condición física de los empleados, 
               <br> sino que abarca aspectos emocionales, mentales y sociales que impactan en su bienestar integral.</p>
        </div>

        <div>
            <img src="./imagenes/logocontainer.jpg" alt="" class="textimg">
        </div>

    </section>

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



</body>
</html>