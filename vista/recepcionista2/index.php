<?php  header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepcion</title>
      <!-- Font Awesome -->
 
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css" >
  <link rel="stylesheet" href="sweetalert2/css/sweetalert2.min.css" >
  <link rel="stylesheet" href="fontawesome/css/all.min.css" >

 

</head>
<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-4 offset-md-4">
                <div class="d-grid mx-auto">
                    <button class="btn btn-dark openModal"data-op="1" data-bs-toggle="modal" data-bs-target="#modalProductos">
                        <i class="fa-solid fa-plus"></i>Añadir</button>
                </div>
            </div>
        </div><!--END ROW-->
    <!--CUERPO DE LA TABLA-->
    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2"></div>
            <div class= "table-responsive">
                <table class="table table-bordered table-hover">
                    <thead><tr><td>#</td><td>NOMBRE</td><td>DESCRIPCION</td><td>PRECIO</td><td> </td></tr></thead>
                    <tbody id="contenido"></tbody>
                </table>
            </div>
        </div><!--END COL-->
    </div><!--END ROW-->
</div><!--END CONTAINER-->
<div class="modal fade" id="modalProductos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="h5" id="titulo_modal"></label>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div><!--END MODAL HEADER-->
            
            <div class="modal-body">
                <input type="hidden" id="id">

                <div class="input-group mb-3"><!--NOMBRE-->
                    <span class="input-group-text"><i class="fa-solid fa-person-circle-plus"></i></span>
                    <input type="text" id="Nombre" class="form-control" maxlength="50" placeholder="Nombre" required>
                </div><!--END INPUT GROUP NOMBRE-->

                <div class="input-group mb-3"><!--DESCRIPCION-->
                    <span class="input-group-text"><i class="fa-solid fa-comment"></i></span>
                    <input type="text" id="descripcion" class="form-control" maxlength="150" placeholder="Descripcion" required>
                </div><!--END INPUT GROUP-->

                <div class="input-group mb-3"><!--PRECIO-->
                    <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
                    <input type="number" id="precio" class="form-control" placeholder="Precio" step="0.1" required>
                </div><!--END INPUT GROUP-->
                
                <div class="d-grid col-6 mx-auto">
                    <button class="btn btn-success" id="btnGuardar"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div><!--END MODAL FOOTER-->
            </div><!--END MODAL BODDY-->
        </div><!--MODAL CONTENT-->
        
    </div><!--END MODAL DIALOG-->
    
</div><!--MODAL FADE-->

</body>
<!-- Bootstrap 4 -->
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="sweetalert2/js/sweetalert2.all.min.js"></script>
<script src="funciones.js"></script>
</html>