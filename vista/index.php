<?php
session_start();
if(!isset($_SESSION["S_IDUSUARIO"])){
  header('Location: ../index/login.php');
}
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrador | Dashboard</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plantilla/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plantilla/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plantilla/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plantilla/plugins/summernote/summernote-bs4.min.css">
<!-- Datatable -->
  <link rel="stylesheet" href="../plantilla/plugins/datatables-usuarios/datatables.min.css" >
  <link rel="stylesheet" href="../plantilla/plugins/select2/css/select2.min.css" >
  <link rel="stylesheet" href="../plantilla/plugins/select2/css/select2.min.css" >
  <!-- Datatable Responsive -->
  <link rel="stylesheet" href="../plantilla/plugins/bootstrap/css/boostrap.css" >
  <link rel="stylesheet" href="../plantilla/plugins/datatables-bs4/css/dataTables.bootstrap4.css" >
  <link rel="stylesheet" href="../plantilla/plugins/datatables-responsive/css/responsive.bootstrap4.css" >
  
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../plantilla/dist/img/inde_logo1.png" alt="Indeportes Tolima" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
                
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../plantilla/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../plantilla/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../plantilla/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a style="background: #ac7110" href="index.php" class="brand-link">
      <img style="background: #711900" src="../plantilla/dist/img/inde_logo1.png" alt="Indeportes_Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Indeportes Tolima</span>

      
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #711900">
     
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     <div class="image">
          <img src="../plantilla/dist/img/user2-160x160.jpg" style="margin-top: 20px;"class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info"> 
         <div class="col-md-3 col-sm-4"><a class="d-block"><?php echo $_SESSION["S_USER"]; ?></a></div>
         <div class="col-md-3 col-sm-4" style="color:#c2c7d0;"><i class="fa fa-user-gear"></i> <span>Administrador</span></div>
          <div class="col-md-3 col-sm-4" ><a href="../controlador/usuario/controlador_cerrar_sesion.php" class="d-block"><i class="fa fa-right-from-bracket"></i><span>Salir</span></a></div>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active" style="background-color:#ac7110;" onclick="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" onclick="cargar_contenido('contenido_principal','usuario/vista_usuario_medico_listar.php')" class="nav-link">
                  <i class="fa fa-user-md nav-icon"></i>
                  <p>Medicos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../plantilla/index2.html" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  
                  <p>Recepcionistas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="fa fa-futbol nav-icon"></i>
                  <p>Deportistas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" onclick="AbrirModalEditarContra()" class="nav-link">
            <i class="fa-solid fa-key"></i>
              <p>
                Cambiar Contraseña
              </p>
            </a>
            
         
          </li>
        </ul>
      
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
     <div class="row" id="contenido_principal">
        <!-- /.content -->
        <div class="col-md-12">
            <div class="card card-success">
            <div class="cardusuarioprincipal">
              <!--Id de usuario-->
              <input type="text" id="textprincipal" value="<?php echo $_SESSION["S_IDUSUARIO"]?>" hidden>

              <div class="card-header" style="background: #ac7110;">
                <h3 class="card-title" style="color:white;" >Mensaje de Bienvenida</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Mensaje de bienvenida-->
                 <p style="font-size:19px; text-align: justify; margin-left: 25px;margin-right: 25px;">
                 <b>¡Bienvenido <u><?php echo $_SESSION['S_USER']," ",$_SESSION['S_APE']?></u>!</b></p>
                <!--Texto Bienvenida-->
                <p style="font-size:18px; text-align: justify; margin-left: 25px;margin-right: 25px;">Estamos encantados de darle la bienvenida como administrador del sistema. Su rol es fundamental para garantizar una gestión eficiente de los usuarios, contribuyendo al éxito de brindar atención médica de calidad a los deportistas de la entidad.
                Como administrador, tendrá acceso privilegiado para gestionar usuarios y supervisar el flujo de información.<br><br>
                Le animamos a explorar las herramientas y funciones disponibles para administrar usuarios y contribuir al desarrollo continuo del proyecto. Estamos comprometidos con la excelencia en la atención médica a los deportistas, y confiamos en que su experiencia y liderazgo serán invaluables.<br><br>
                Si tiene alguna pregunta o necesita asistencia, nuestro equipo está aquí para ayudarle. Juntos, trabajaremos para alcanzar nuevos niveles de eficiencia y excelencia.
                Gracias por contribuir a la gestion de este proceso.¡éxito!<br><br>
                Atentamente, <b>NobleTeam Dev.</b></p>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
        <!-- /.row-contenido_principañ -->
    </section>
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong style="color: #ac7110;">Copyright &copy; 2022 <a href="" style="color: #711900;">NobleTeam.DEV.</a></strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!--Modal Editar Contraseña-->
  <div class="modal fade" id="modal_editar_contra"  role="dialog" >
    <div class="modal-dialog modal-md" role="document">
     <div class="modal-content">
      <div class="modal-header bg-success" >
        <h5 class="modal-title" id="exampleModalLabel">Editar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <!--Contraseña Actual-->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <input type="password" id="txtcontra_bd" hidden>
                  <button type="button" class="btn btn" style=""><strong>Contraseña Actual:</strong></button>
                  </div>
                  <!-- /btn-group -->
                  <input type="password" class="form-control" id="txt_contra_actual" autocomplete="new-password">
          </div>
        <!--Contraseña Nueva-->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                  <button type="button" class="btn btn" style=""><strong>Contraseña Nueva:</strong></button>
                  </div>
                  <!-- /btn-group -->
                  <input type="password" class="form-control" id="txt_contra_nueva" autocomplete="new-password">
          </div>

          <!--Repetir Contraseña-->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                  <button type="button" class="btn btn" style=""><strong>Repetir Nueva Contraseña:</strong></button>
                  </div>
                  <!-- /btn-group -->
                  <input type="password" class="form-control" id="txt_repetir_contra_nueva" autocomplete="new-password">
          </div>

      </div>

      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" onclick="Editar_Contra()"><i class="fa  fa-check"></i><b>&nbsp;Editar</b></button>
        <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal"><i class="fa  fa-times"></i><b>&nbsp;Cerrar</b></button>
      </div>
    </div>
  </div>
  </div>

<!-- jQuery -->
<script src="../plantilla/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plantilla/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  function cargar_contenido(contenedor,contenido){
    $("#"+contenedor).load(contenido);
    
    }

  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plantilla/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plantilla/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plantilla/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plantilla/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plantilla/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plantilla/plugins/moment/moment.min.js"></script>
<script src="../plantilla/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plantilla/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plantilla/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../plantilla/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../plantilla/dist/js/pages/dashboard.js"></script>
<script src="../plantilla/plugins/datatables-usuarios/datatables.min.js"></script>
<script src="../plantilla/plugins/select2/js/select2.min.js"></script>
<script src="../plantilla/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="../plantilla/plugins/funciones-jstr/funciones.js"></script>

<!--Responsive Datatable-->
<script src="../plantilla/plugins/popper/popper.min.js"></script>
<script src="../plantilla/plugins/bootstrap/js/boostrap.min.js"></script>
<script src="../plantilla/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../plantilla/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="../plantilla/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
<script type="text/javascript" src="../index/js/usuario.js?rev=<?php echo time(); ?>"></script>
<script>
TraerDatoUsuario();
</script>
</body>
</html>
