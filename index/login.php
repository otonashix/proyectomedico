<?php
//SESION
session_start();
if(isset($_SESSION["S_IDUSUARIO"])){
  header('Location: ../vista/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Medico</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">
 


  

  
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./imagenes/inde_logo1.png">
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
 <!--Login-->

<main>
        <div class="imglogo">
            <img src="./imagenes/logi-removebg-preview.png" alt="" class="logotipo">
             <img src="./imagenes/respon1.jpg" alt="" class="logotipo2">
        </div>

        <div class="main">  	
                <input type="checkbox" id="chk" aria-hidden="true">

                    <!--<div class="signup">
                        <form  method="post">
                            <label for="chk" aria-hidden="true">Sign up</label>
                            <input type="text" name="name" placeholder="User name" required="">
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="password" name="pswd" placeholder="Password" required="">
                            <button name="register" value="Enviar">Sign up</button>
                        </form>
                    </div>-->
                    <div class="singup">
                        <!-- "-->
                            <label for="chk" aria-hidden="true" name="registro">Login</label>
                            <input type="text" name="cc" id="txt_cc" autocomplete="new-password" placeholder="Cedula"  maxlength="10" onkeypress="return numeros(event)" >
                            <input type="password" name="pswd" id="txt_pass" autocomplete="new-password" placeholder="Password" >
                            <button class="btn_login" onclick="verificar_usuario()" >Login</button>
                            <a href="#" class="label2" onclick="AbrirModalEstablecerContra()">Olvidaste la contraseña?</a>
                        
                    </div>
        </div>

        <div class="imglogo2">
                <img src="./imagenes/logocontainer.jpg" alt="">
        </div>

</main>

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
            <a href="https://twitter.com/home" class="twitter"><img src="./imagenes/twitter.png" alt=""></a>
            <a href="https://www.youtube.com/" class="youtube"><img src="./imagenes/youtube.png" alt=""></a>
    </div>

</footer>

<!--Modal Recuperar Contraseña-->
<div class="modal fade" id="modal_estab_contra"  role="dialog" >
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success" >
                <h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
            </div>
            <div class="modal-body">
        
            <!--Correo Actual-->
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                  <h3 type="button" class="btn btn" style=""><strong>Correo de Recuperacion:</strong></h3>
                  </div>
                  <!-- /btn-group -->
                  <input  class="form-control input2" id="txt_email" autocomplete="new-password" placeholder="Escriba Correo Registrado">
          </div>

            <div class="modal-footer">
        
                <button type="button" class="btn btn-primary" onclick="RestablecerContra()"><i class="fa  fa-check"></i><b>&nbsp;Enviar</b></button>
                <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal"><i class="fa  fa-times"></i><b>&nbsp;Cerrar</b></button>
            </div>
        </div>
    </div>
</div>


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

<?php /*include("conexion/registrar.php");
    include("conexion/register.php")*/
?>



<!--====scripts===-->
<script src="js/funciones.js"></script>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/usuario.js?rev=<?php echo time(); ?>"></script>
<script src="../plantilla/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<script>
    txt_cc.focus();
</script>

</html>