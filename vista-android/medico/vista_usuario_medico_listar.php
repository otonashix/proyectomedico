<script type="text/javascript" src="../index/js/usuario.js?rev=<?php echo time(); ?>"></script>
<div class="col-md-12">
            <div class="card card-success">
              <div class="card-header" style="background: #ac7110;">
                <h3 class="card-title">Panel de Control</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                
              <div class="row">
                <div class="col-md-10 ">
                        <div class="input-group">
                            <input type="text" class="global_filter form-control form-control-md" id="global_filter" placeholder="Ingresar dato a buscar">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-md btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    
                </div>
                <div class="col-md-2 ">
                  <button class="btn btn-block btn-success btn-md" onclick="AbrirModalRegistro();" ><i class="glyphicon glyphicon-plus"></i>+ Nuevo Registro</button>
              </div>
              </div>

                <table id="tabla_usuario_medico" class="display responsive nowrap" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>CC</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Estatus</th>
                        <th style="width: 100px;">Acci&oacute;n</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>#</th>
                        <th>CC</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Estatus</th>
                        <th style="width: 100px;">Acci&oacute;n</th>
                        
                      </tr>
                    </tfoot>
                    </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
<!-- /.col -->
<!-- Modal Nuevo Registro-->
<form action="" autocomplete="false" onsubmit="return false">
  <div class="modal fade" id="modal_registro"  role="dialog" >
    <div class="modal-dialog modal-sm" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo registro de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <!--Cedula-->
        <div class="col-lg-12">
          <label for="">CC:</label>
          <input type="text" onkeypress="return numeros(event)" class="form-control" id="txt_usu" autocomplete="new-password" placeholder="Ingrese Cedula de Ciudadania">
        </div>
        <!--Nombre-->
        <div class="col-lg-12">
          <label for="">NOMBRE:</label>
          <input type="text" class="form-control" id="txt_nom" autocomplete="new-password" placeholder="Ingrese Nombre del Usuario">
        </div>
          <!--Contraseña N°1-->
        <div class="col-lg-12">    
          <label for="">Contraseña:</label>
          <input type="password" class="form-control" id="txt_con1" autocomplete="new-password" placeholder="Ingrese Contraseña">
        </div><br>
          <!--Contraseña N°2-->
        <div class="col-lg-12">  
          <label for="">Repita Contraseña:</label>
          <input type="password" class="form-control" id="txt_con2" autocomplete="new-password" placeholder="Ingrese de Nuevo la Contraseña">
        </div><br>
          <!--Rol-->
        <div class="col-lg-12">  
                      <!-- select -->
                      
                        <label for="">Rol:</label><br>
                        <select class="js-example-basic-single" id="cbm_rol" name="state" style="width:100%;">
                        
                        </select>
                         
                         
                        
                      
        </div> <br>
  </div>

      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" onclick="registrar_usuario()"><i class="fa  fa-check"></i><b>&nbsp;Registrar</b></button>
        <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal"><i class="fa  fa-times"></i><b>&nbsp;Cerrar</b></button>
      </div>
    </div>
  </div>
</div>
</form>
<script>

    $(document).ready(function(){
     
        listar_usuario_medico();
        $('.js-example-basic-single').select2();
        listar_combo_rol();
        $("#modal_registro").on("shown.bs.modal",function (){

          $("#txt_usu").focus();
        });
    });
    
</script>
