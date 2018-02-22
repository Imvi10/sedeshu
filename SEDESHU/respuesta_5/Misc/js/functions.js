/*----------------------------------------INICIA USUARIOS--------------------------------------------------------*/
var url = "../Controller/ControllerRouter.php";
$(document).on("click", "#btnCreateUser", function () {
    var user = {
        correo: $("#txtCorreo").val(),
        password: $("#txtPass").val(),
        id_Tipo_Usuario: $("#slctTipoUsuario").val(),
    };
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'user': user,
            'target': 'user',
            'method': 'add'
        },
        context: document.body
    }).done(function (response) {
//console.log(response);
        response = JSON.parse(response);
        if (response !== null) {
            if (response.return === true && response.status === true) {
                toastr['success'](response.message, "Éxito");
                $("#modal_User").modal("toggle");
                getAllUsers();
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
});
function getAllUsers() {
    var user = {nada: ""};
    var strToAppend = "";
    var container = $("#containerUsers");
    container.empty();
    container.append("<h1>Administrar usuarios</h1>");
    container.append("<div class='row' style='margin-left:0 !important; margin-right: 0 !important'><a title='Usuarios Eliminados' id='btnUnlockUsers' class='btn btnUnlock col-xs-offset-10 col-xs-1 '><i class='fa fa-unlock' aria-hidden='true'></i></a><a title='Añadir Usuario' id='btnShowAddUser' class='btn blue col-xs-1 '><i class='fa fa-plus' aria-hidden='true'></i></a></div>");
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'user': user,
            'target': 'user',
            'method': 'getAll'
        },
        context: document.body
    }).done(function (response) {
        //console.log(response);
        response = JSON.parse(response);
        if (response != null) {
            if (response.return == true && response.status == true) {
                var user = response.data;
                var strToAppend = "<table id='tblUsers' class='table table-hover'><thead><tr><th>Correo</th><th>Acción</th></tr></thead><tbody>";
                for (var i = 0; i < user.length; i++) {
                    strToAppend += "<tr><td>" + user[i].correo + "</td><td><a title='Ver/Editar Usuario ' class='seeUserDetails' id='seeUserDetail_" + user[i].idUsuario + "'><i class='btn  fa fa-file-text btn-info btnActions'  aria-hidden='true'></i><a title='Eliminar usuario' id='deleteUser_" + user[i].idUsuario + "' class='deleteUser' > <i class='btn btn-danger  btnActions fa fa-trash-o'  aria-hidden='true'></i></td></td></tr>";
                }
                strToAppend += "</tbody></table>";
                container.append(strToAppend);
                $("#tblUsers").DataTable();
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
}

$(document).on("click", ".seeUserDetails", function () {
    var user = {
        idUsuario: $(this).attr('id').split("_")[1]
    };
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'user': user,
            'target': 'user',
            'method': 'get'
        },
        context: document.body
    }).done(function (response) {
//console.log(response);
        response = JSON.parse(response);
        clean_User_Modal();
        if (response !== null) {
            if (response.return === true && response.status === true) {
                user = response.data;
                var strToAppend = "";
                for (var i = 0; i < user.length; i++) {
                    $("#txtId").val(user[i].idUsuario);
                    strToAppend = "<label for='txtCorreo'>Correo: </label><input type ='email' value='" + user[i].correo + "' id='txtCorreo' class='form-control' / >" +
                            // "<label for='txtPassword'>Contraseña: </label><input type = 'text' value='" + user[i].password + "' id='txtMunicipio' class = 'form-control' / >" +
                            "<label for='slctTipoUsuario'>Tipo Usuario: </label><select  value='" + user[i].id_Tipo_Usuario + "' id='slctTipoUsuario' class='form-control'><option value='1'>Usuario</option><option value='2' >Administrador</option></select>";
                }
                $("#modal_User_Head").append("<h2>Editar Usuario</h2>");
                $("#modal_User_Content").append(strToAppend);
                $("#modal_User_Footer").append("<a href='#!' class='btn btn-default' data-dismiss='modal'>Cancelar</a><a id='btnUpdateUser' class='btn btn-success'>Actualizar</a>");
              
                $("#modal_User").modal();
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
});

function clean_User_Modal() {
    $("#modal_User_Head").empty();
    $("#modal_User_Content").empty();
    $("#modal_User_Footer").empty();
    $("#modal_User_Footer").append("<input type='hidden' id='txtId'/>");
}

$(document).on("click", "#btnShowAddUser", function () {
    var user = {nada: ""};
    clean_User_Modal();
    var strToAppend = "<label for='txtCorreo'>Correo: </label><input type='email'  id='txtCorreo' class='form-control' / >" +
            "<label for='txtPuesto'>Password: </label><input type ='password'  id='txtPass' class = 'form-control' / >" +
            "<label>Tipo de usuario: </label><select id='slctTipoUsuario' class='form-control'><option value='1'>Usuario</option><option value='2'>Administrador</option></select>";
    $("#modal_User_Head").append("<h2>Agregar Usuario</h2>");
    $("#containerFormUser").css("display", "block");
    $("#modal_User_Content").append(strToAppend);
    $("#modal_User_Footer").append("<a href='#!' class='btn btn-default' data-dismiss='modal'>Cancelar</a><a id='btnCreateUser' class='btn btn-success'>Crear</a>");
    $("#modal_User").modal();
});
$(document).on("click", "#btnUpdateUser", function () {
    var user = {
        idUsuario: $("#txtId").val(),
        correo: $("#txtCorreo").val(),
        id_Tipo_Usuario: $("#slctTipoUsuario").val(),
    };
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'user': user,
            'target': 'user',
            'method': 'update'
        },
        context: document.body
    }).done(function (response) {
//console.log(response);
        response = JSON.parse(response);
        if (response !== null) {
            if (response.return === true && response.status === true) {
                toastr['success'](response.message, "Éxito");
                $("#modal_User").modal("toggle");
                getAllUsers();
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
});

$(document).on("click", ".deleteUser", function () {
    if (confirm("Deseas borrar a este usuario? ")) {
        deleteUser($(this).attr('id').split("_")[1]);
    }
});
$(document).on("click", ".unlockUser", function () {
    if (confirm("Deseas restablecer a este usuario? ")) {
        deleteUser($(this).attr('id').split("_")[1]);
    }
});
function unlockUser(i) {
    var user = {
        idUsuario: i
    };
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'user': user,
            'target': 'user',
            'method': 'unlock'
        },
        context: document.body
    }).done(function (response) {
        //console.log(response);
        response = JSON.parse(response);
        if (response !== null) {
            if (response.return === true && response.status === true) {
                toastr['success'](response.message, "Éxito");
                getAllUsers();
                getAllDeleted();
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
}


function deleteUser(i) {
    var user = {
        idUsuario: i
    };
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'user': user,
            'target': 'user',
            'method': 'delete'
        },
        context: document.body
    }).done(function (response) {
//console.log(response);
        response = JSON.parse(response);
        if (response !== null) {
            if (response.return === true && response.status === true) {
                toastr['success'](response.message, "Éxito");
                getAllUsers();
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
}
$(document).on("click", "#btnUnlockUsers", function () {
    getAllDeleted();
});
function getAllDeleted() {
    var user = {
        nada: ""
    };
    clean_User_Modal();
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'user': user,
            'target': 'user',
            'method': 'getDeleted'
        },
        context: document.body
    }).done(function (response) {
        //console.log(response);
        clean_User_Modal();
        response = JSON.parse(response);
        if (response !== null) {
            if (response.return === true && response.status === true) {
                user = response.data;
                var strToAppend = "";
                for (var i = 0; i < user.length; i++) {
                    user = response.data;
                    var strToAppend = "<table id='tblUsersDeleted' class='table table-hover'><thead><tr><th>Correo</th><th>Tipo Usuario</th><th>Acción</th></tr></thead><tbody>";
                    for (var i = 0; i < user.length; i++) {
                        strToAppend += "<tr><td>" + user[i].correo + "</td><td>" + user[i].id_Tipo_Usuario + "</td><td><a title='Recuperar' class='unlockUser' id='unlockUser_" + user[i].idUsuario + "'><i class='btn  fa fa-key btn-success '  aria-hidden='true'></i></td></td></tr>";
                    }
                    strToAppend += "</tbody></table>";
                    $("#modal_User_Size").addClass("modal-lg");
                    $("#modal_User_Content").append(strToAppend);
                    $("#tblUsersDeleted").DataTable();
                }
                $("#modal_User_Head").append("<h2>Usuarios Eliminados</h2>");
                $("#modal_User_Footer").append("<a href='#!' class='btn btn-default' data-dismiss='modal'>Cerrar</a>");
                $("#modal_User").modal();
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
}


$(document).on("click" , "#btnLogOut" , function(){
    var user = {nada: ""} ;
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'user': user,
            'target': 'user',
            'method': 'logOut'
        },
        context: document.body
    }).done(function (response) {
        //console.log(response);
        clean_User_Modal();
        response = JSON.parse(response);
        if (response !== null) {
            if (response.return === true && response.status === true) {
               window.location.href = 'login.php';
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
});


/*----------------------------------------TERMINA USUARIOS --------------------------------------------------------*/

/* INICIA OBRAS */ 

function getAllObras(){
     var obra = {nada: ""};
    var strToAppend = "";
    var container = $("#containerObras");
    container.empty();
    container.append("<h1>Visualizar Mapas</h1>");
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'obra': obra,
            'target': 'obra',
            'method': 'getAll'
        },
        context: document.body
    }).done(function (response) {
        //console.log(response);
        response = JSON.parse(response);
        if (response != null) {
            if (response.return == true && response.status == true) {
                var user = response.data;
                var strToAppend = "<table id='tblObras' class='table table-hover'><thead><tr><th>Id Obra</th><th>Acción</th></tr></thead><tbody>";
                for (var i = 0; i < user.length; i++) {
                    strToAppend += "<tr><td>" + user[i].claveObra + "</td><td><a title='Ver Obra ' class='seeObraDetails' id='seeObraDetails_" + user[i].claveObra + "'><i class='btn  fa fa-file-text btn-info btnActions'  aria-hidden='true'></i></td></td></tr>";
                }
                strToAppend += "</tbody></table>";
                container.append(strToAppend);
                $("#tblObras").DataTable();
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
}


$(document).on("click", ".seeObraDetails", function () {
    var obra = {
        claveObra: $(this).attr('id').split("_")[1]
    };
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'obra': obra,
            'target': 'obra',
            'method': 'get'
        },
        context: document.body
    }).done(function (response) {
//console.log(response);
        response = JSON.parse(response);
        clean_User_Modal();
        if (response !== null) {
            if (response.return === true && response.status === true) {
                obra = response.data;
                var strToAppend = "";
                var lat = obra[0].geometria.split(",")[0].toString();
                var lon = obra[0].geometria.split(",")[1].toString();
                initMap(parseFloat(lat.slice(1 , lat.length)) , parseFloat(lon.slice(0, lon.length -1)));
                
            }
        } else {
            toastr['error'](response.message, "Error");
        }
    });
});



 function initMap(lat , long) {
        var uluru = {lat: lat , lng: long };
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: lat, lng: long},
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
//
/*TERMINA obras */