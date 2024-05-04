<?php
//SESION
session_start();
if(isset($_SESSION["S_IDUSUARIO"])){
  header('Location: ../vista-android/index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<!--<img src="img/inde_logo1.svg">-->
		</div>
		<div class="login-content">
			<div class="form">
				<img src="img/avatar.svg">
				<h2 class="title">Bienvenido</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Cc:</h5>
           		   		<input type="text"  class="input" id="txt_cc" autocomplete="new-password" maxlength="10" onkeypress="return numeros(event)">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" class="input"  id="txt_pass" autocomplete="new-password"">
            	   </div>
            	</div>
            	<a href="#">Olvidaste la Contraseña?</a>
            	<input type="submit" class="btn" value="Ingresar" onclick="verificar_usuario()">
			</div>
        </div>
    </div>



<script type="text/javascript" src="js/main.js"></script>
<!--====scripts===-->
<script src="../index/js/funciones.js"></script>
<script src="../index/js/jquery-3.7.1.min.js"></script>
<script src="../index/js/usuario.js?rev=<?php echo time(); ?>"></script>
<script src="../plantilla/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<script>
    txt_cc.focus();
</script>

</html>
</body>
</html>
