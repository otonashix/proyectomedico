/*Funcion para verificar usuario*/
function verificar_usuario() {
  var cc = $("#txt_cc").val();
  var pass = $("#txt_pass").val();

  if (cc.length == 0 || pass.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Llene los Campos Vacios",
      "warning"
    );
  }
  $.ajax({
    url: "../controlador/usuario/controlador_verificar_usuario.php",
    type: "POST",
    data: {
      user: cc,
      pwd: pass,
    },
  }).done(function (resp) {
    if (resp == 0) {
      Swal.fire(
        "Mensaje De Error",
        "Usuario y/o Contraseña Incorrecta",
        "error"
      );
    } else {
      var data = JSON.parse(resp);
      if (data[0][5] === "2") {
        return Swal.fire(
          "Mensaje de advertencia",
          "Lo sentimos el usuario con la identificacion <h2>" +
            cc +
            "</h2> se encuentra suspendido, comuniquese con la administración",
          "warning"
        );
      }
      $.ajax({
        url: "../controlador/usuario/controlador_crear_sesion.php",
        type: "POST",
        data: {
          idusuario: data[0][0],
          user: data[0][2],
          ape: data[0][3],
          rol: data[0][1],
        },
      }).done(function (resp) {
        let timerInterval;
        Swal.fire({
          title: "Bienvenido al Sistema ",
          html: "Usted sera redireccionado en  <b></b> milliseconds.",
          timer: 2000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
              timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
          },
          willClose: () => {
            clearInterval(timerInterval);
          },
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            location.reload();
          }
        });
      });
    }
  });
}

/*Funcion Listar tabla usuario*/
var table;
function listar_usuario() {
  table = $("#tabla_usuario").DataTable({
    ordering: false,
    paging: false,
    searching: { regex: true },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    destroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../controlador/usuario/controlador_usuario_listar.php",
      type: "POST",
    },
    columns: [
      { data: "Usr_Id" },
      { data: "Usr_Nombre" },
      { data: "Usr_Apellido" },
      { data: "Rol_Descripcion" },
      {
        data: "Est_Descripcion",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return "<span class='badge badge-success'>" + data + "</span>";
          } else {
            return "<span class='badge badge-danger'>" + data + "</span>";
          }
        },
      },
      {
        data: "Est_Descripcion",
        render: function (data, type, row) {
          if (data == "ACTIVO") {
            return "<button style='font-size:13px;' type='button' title='Editar'class='editar btn btn-primary'><i class='fa fa-fw fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Desactivar'class='desactivar btn btn-danger'><i class='fa fa-fw fa-times-circle'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Eliminar'class='eliminar btn btn-dark'><i class='fa fa-fw fa-trash'></i></button>";
          } else {
            return "<button style='font-size:13px;' type='button' title='Editar'class='editar btn btn-primary'><i class='fa fa-fw fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Activar' class='activar btn btn-success'><i class='fa fa-check-circle'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Eliminar'class='eliminar btn btn-dark'><i class='fa fa-fw fa-trash'></i></button>";
          }
        },
      },
    ],
  });

  //Buscador
  document.getElementById("tabla_usuario_filter").style.display = "none";
  $("input.global_filter").on("keyup click", function () {
    filterGlobal();
  });

  $("input.column_filter").on("keyup click", function () {
    filterColumn($(this).parents("tr").attr("data-column"));
  });
}

//Editar
$("#tabla_usuario").on("click", ".editar", function () {
  var data = table.row($(this).parents("tr")).data();
  if (table.row(this).child.isShown()) {
    var data = table.row(this).data();
  }
  $("#modal_editar").modal({ backdrop: "static", keyboard: false });
  $("#modal_editar").modal("show");
  $("#txt_usu_editar").val(data.Usr_Id);
  $("#txt_nom_editar").val(data.Usr_Nombre);
  $("#txt_ape_editar").val(data.Usr_Apellido);
  $("#cbm_rol_editar").val(data.Rol_Id).trigger("change");
  $("#txt_email_editar").val(data.Usr_Email);
  $("#txt_tel_editar").val(data.Usr_Tel);
});

//Cambiar Estado "DESACTIVAR"
$("#tabla_usuario").on("click", ".desactivar", function () {
  var data = table.row($(this).parents("tr")).data();
  if (table.row(this).child.isShown()) {
    var data = table.row(this).data();
  }
  Swal.fire({
    title:
      "Estas seguro de <u>Desactivar</u> el usuario. <h2><b>Id:</b><u> " +
      data.Usr_Id +
      "</u></h2>",
    text: "Una vez realizado esto el usuario no podra ingresar al sistema.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Desactivar",
  }).then((result) => {
    if (result.isConfirmed) {
      modificar_estado(data.Usr_Id, 2);
    }
  });
});

//Cambiar Estado "ACTIVAR"
$("#tabla_usuario").on("click", ".activar", function () {
  var data = table.row($(this).parents("tr")).data();
  if (table.row(this).child.isShown()) {
    var data = table.row(this).data();
  }
  Swal.fire({
    title:
      "Esta seguro de <U>ACTIVAR</U> el usuario. <h2><b>Id:</b><u> " +
      data.Usr_Id +
      "</u></h2>",
    text: "Una vez realizado esto el usuario podra ingresar al sistema.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Activar",
  }).then((result) => {
    if (result.isConfirmed) {
      modificar_estado(data.Usr_Id, 1);
    }
  });
});

function modificar_estado(idusuario, idestado) {
  var mensaje = "";
  if (idestado == 2) {
    mensaje = "Desactivado";
  } else {
    mensaje = "Activado";
  }
  $.ajax({
    url: "../controlador/usuario/controlador_modificar_estado_usuario.php",
    type: "POST",
    data: {
      idusuario: idusuario,
      idestado: idestado,
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje De Confirmacion",
        "El Usuario con la <b>Id:</b> <h2><u>" +
          idusuario +
          "</u></h2> Ha sido " +
          mensaje,
        "success"
      ).then((value) => {
        table.ajax.reload();
      });
    }
  });
}


//Eliminar Usuario
$("#tabla_usuario").on("click", ".eliminar", function () {
  var data = table.row($(this).parents("tr")).data();
  if (table.row(this).child.isShown()) {
    var data = table.row(this).data();
  }
  Swal.fire({
    title:
      "Estas seguro de <u>Eliminar</u> el usuario"+data.Usr_Nombre+" "+data.Usr_Apellido+"<h2><b>Id:</b><u> " +
      data.Usr_Id +
      "</u></h2>",
    text: "Una vez realizado esto el usuario quedara eliminado definitivamente",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      eliminar_usuario(data.Usr_Id);
    }
  });
});
function eliminar_usuario(idusuario) {
  $.ajax({
    url: "../controlador/usuario/controlador_eliminar_usuario.php",
    type: "POST",
    data: {
      idusuario: idusuario
    },
  }).done(function (resp) {
    if (resp > 0) {
      Swal.fire(
        "Mensaje De Confirmacion",
        "El Usuario con la <b>Id:</b> <h2><u>" +
          idusuario +
          "</u></h2> Ha sido Eliminado",
        "success"
      ).then((value) => {
        table.ajax.reload();
      });
    }
  });
}

//Tabla usuarios
function filterGlobal() {
  $("#tabla_usuario").DataTable().search($("#global_filter").val()).draw();
}

//Nuevo Registro-BOTON
function AbrirModalRegistro() {
  $("#modal_registro").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro").modal("show");
}

//Lista deplegable ROLES
function listar_combo_rol() {
  $.ajax({
    url: "../controlador/usuario/controlador_combo_rol_listar.php",
    type: "POST",
  }).done(function (resp) {
    var data = JSON.parse(resp);
    var cadena = "";
    if (data.length > 0) {
      for (var i = 0; i < data.length; i++) {
        cadena +=
          "<option value= '" + data[i][0] + "'>" + data[i][1] + "</option>";
      }

      $("#cbm_rol").html(cadena);
      $("#cbm_rol_editar").html(cadena);
    } else {
      cadena += "<option value= ''>No se encontraron registros</option";
      $("#cbm_rol").html(cadena);
      $("#cbm_rol_editar").html(cadena);
    }
  });
}

//Nuevo Registro
function registrar_usuario() {
  var usu = $("#txt_usu").val();
  var nombre = $("#txt_nom").val();
  var apellido = $("#txt_ape").val();
  var contra = $("#txt_con1").val();
  var contra2 = $("#txt_con2").val();
  var rol = $("#cbm_rol").val();
  var email = $("#txt_email").val();
  var tel = $("#txt_tel").val();

  if (
    usu.length == 0 ||
    nombre.length == 0 ||
    apellido.length == 0 ||
    contra.length == 0 ||
    contra2.length == 0 ||
    rol.length == 0 ||
    email.length == 0 ||
    tel.length == 0
  ) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Llene los Campos Vacios",
      "warning"
    );
  }

  if (contra != contra2) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Las Contraseñas No Coinciden",
      "warning"
    );
  }

  $.ajax({
    url: "../controlador/usuario/controlador_usuario_resgistrar.php",
    type: "POST",
    data: {
      cedula: usu,
      rol: rol,
      nombre: nombre,
      apellido: apellido,
      contrasena: contra,
      email:email,
      tel:tel
    },
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        $("#modal_registro").modal("hide");

        Swal.fire(
          "Mensaje De Confirmacion",
          "Nuevo Usuario<h2>" +
            usu +
            "<br>" +
            nombre +
            " " +
            apellido +
            " </h2> Registrado Correctamente",
          "success"
        ).then((value) => {
          limpiar_registro();
          table.ajax.reload();
        });
      } else {
        return Swal.fire(
          "Mensaje De Advertencia",
          "No se pudo completar el registro la Cedula:<br><h2>" +
            usu +
            "</h2>Ya se encuentra registrada",
          "warning"
        );
      }
    } else {
      Swal.fire(
        "Mensaje De Error",
        "No se pudo completar el registro",
        "error"
      );
    }
  });

  function limpiar_registro() {
    $("#txt_usu").val("");
    $("#txt_nom").val("");
    $("#txt_ape").val("");
    $("#txt_con1").val("");
    $("#txt_con2").val("");
    $("#cbm_rol").val("");
    $("#txt_email").val("");
    $("#txt_tel").val("");
  }
}

//Editar
function modificar_usuario() {
  var idusu = $("#txt_usu_editar").val();
  var nombre_edit = $("#txt_nom_editar").val();
  var apellido_edit = $("#txt_ape_editar").val();
  var rol_edit = $("#cbm_rol_editar").val();
  var email_edit = $("#txt_email_editar").val();
  var tel_edit = $("#txt_tel_editar").val();

  if (
    idusu.length == 0 ||
    nombre_edit.length == 0 ||
    apellido_edit.length == 0 ||
    rol_edit.length == 0 ||
    email_edit.length == 0 ||
    tel_edit.length == 0
  ) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Llene los Campos Vacios",
      "warning"
    );
  }
  $.ajax({
    url: "../controlador/usuario/controlador_usuario_modificar.php",
    type: "POST",
    data: {
      idusu: idusu,
      rol_edit: rol_edit,
      nombre_edit: nombre_edit,
      apellido_edit: apellido_edit,
      email_edit:email_edit,
      tel_edit:tel_edit
    },
  }).done(function (resp) {
    if (resp > 0) {
      $("#modal_editar").modal("hide");

      Swal.fire(
        "Mensaje De Confirmacion",
        "Datos del Usuario:<h2>" + idusu + "</h2>Actualizados Correctamente",
        "success"
      ).then((value) => {
        table.ajax.reload();
      });
    } else {
      Swal.fire(
        "Mensaje De Error",
        "No se pudo completar la actualizacion",
        "error"
      );
    }
  });

  function limpiar_registro() {
    $("#txt_usu").val("");
    $("#txt_nom").val("");
    $("#txt_ape").val("");
    $("#txt_con1").val("");
    $("#txt_con2").val("");
    $("#cbm_rol").val("");
    $("#txt_email").val("");
    $("#txt_tel").val("");
  }
}

function TraerDatoUsuario(){
var usuario= $("#textprincipal").val();
$.ajax({

  url: "../controlador/usuario/controlador_traer_datos_usuario.php",
  type:"POST",
  data:{
    usuario:usuario
  }
}).done(function(resp){
  var data =  JSON.parse(resp);
  if(data.length>0){
    $("#txtcontra_bd").val(data[0][4]);
    if(data[0][3]){

    }
  }
})


}

function AbrirModalEditarContra(){
  $("#modal_editar_contra").modal({ backdrop: "static", keyboard: false })
  $("#modal_editar_contra").modal("show");
  $("#modal_editar_contra").on('shown.bs.modal',function (){
  $("#txt_contra_actual").focus();
  })
}

function Editar_Contra(){
  var idusuario =$("#textprincipal").val();
  var contrabd =$("#txtcontra_bd").val();
  var contractual =$("#txt_contra_actual").val();
  var contranueva =$("#txt_contra_nueva").val();
  var contrarep =$("#txt_repetir_contra_nueva").val();
  
  if(contractual.length==0 || contranueva.length==0 || contrarep.length==0){

    return Swal.fire("Mensaje de Advertencia","Llene los Campos Vacios","warning");
  }
  if(contranueva != contrarep){

    return Swal.fire("Mensaje de Advertencia","Debes Ingresar la misma clave dos Veces para confirmarla","warning");


  }
  $.ajax({

    url:"../controlador/usuario/controlador_modificar_contra.php",
    type:"POST",
    data:{
      idusuario:idusuario,
      contrabd:contrabd,
      contractual:contractual,
      contranueva:contranueva,
      contrarep:contrarep
    }

  }).done(function(resp){
      
      if(resp>0){
        if(resp==1){
          $("#modal_editar_contra").modal("hide");
          limpiareditarcontra();
          Swal.fire(
            "Mensaje De Confirmacion",
            "Contraseña  Actualizada Correctamente",
            "success"
          ).then((value) => {
          TraerDatoUsuario();
          });
        }else{
        
          Swal.fire("Mensaje de Error","La Contraseña Actual Ingrersada no es Correcta","error");

        }
        }else{
          Swal.fire("Mensaje de Error","No se Actualizo la Contraseña","error");
    }
})
}

function limpiareditarcontra(){
  $("#txt_contra_actual").val("");
  $("#txt_contra_nueva").val("");
  $("#txt_repetir_contra_nueva").val("");

}
function AbrirModalEstablecerContra(){

  $("#modal_estab_contra").modal({ backdrop: "static", keyboard: false })
  $("#modal_estab_contra").modal("show");
  $("#modal_estab_contra").on('shown.bs.modal',function (){
  $("#txt_email").focus();
  })

}

function RestablecerContra(){

  var emailrestab=$("#txt_email").val();
  if(emailrestab.length==0){
    return Swal.fire("Mensaje de Advertencia","Llene el Campo","warning")

  }
  var caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  var contrasena="";

  for(var i= 0;i<6;i++){
    contrasena+=caracteres.charAt(Math.floor(Math.random()*caracteres.length));
  }
 $.ajax({
    url:"../controlador/usuario/controlador_restablecer_contra.php",
    type:'POST',
    data:{ 
          emailrestab:emailrestab,
          contrasena:contrasena
        }

  }).done(function(resp){
    
  })
}