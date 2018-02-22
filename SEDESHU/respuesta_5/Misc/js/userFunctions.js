$(document).on('click', '#btn_Login', function () {
    login();
});
function loginEnter(e) {
    if (e.keyCode == 13) {
        login();
    }
}
function login() {
    var user = {
        correo: $("#txtUser").val(),
        password: $("#txtPass").val(),
    }
    $.ajax({
        url: '../Controller/ControllerRouter.php',
        type: 'POST',
        data: {
            user: user,
            target: 'user',
            method: 'login'
        },
        context: document.body
    }).done(function (response) {

        response = JSON.parse(response);
        if (response != null) {

            if (response.return == true && response.status == true) {

                window.location.href = 'Index.php';
            } else {
                swal({
                    title: "Error al entrar",
                    text: "Usuario y/o cotraseña incorrectos",
                    type: "error"}
                );
            }
        } else {
//toastr['error'](response.message, error);
            swal({
                title: "Error al entrar",
                text: "Usuario y/o cotraseña incorrectos",
                type: "error"});
        }

    }
    );
}



function activateAccount(nombre, correo, token) {

    var password1 = $("#password1").val();
    var password2 = $("#password2").val();
    if (password1 != password2) {
        swal({
            title: "Verifique la contraseña",
            text: "Las contraseñas no coinciden",
            type: "error"});
        return;
    }


    if ((password1.length == 0 || password2.length == 0) || (password1.length < 8 || password2.length < 8)) {
        swal({
            title: "Verifique la contraseña",
            text: "Las contraseñas deben tener al menos 8 caracteres",
            type: "error"});
        return;
    }

    var usuario = {};
    usuario.nombre = $("#nombre").val();
    usuario.correo = $("#correo").val();
    usuario.password = $("#password1").val();
    usuario.token = $("#token").val();
    $.ajax({
        url: "../Controller/ControllerRouter.php",
        type: "POST",
        data: {
            'usuario': usuario,
            'target': 'usuario',
            'method': 'activateAccount'
        },
        context: document.body

    }).done(function (response) {

        response = JSON.parse(response);
        if (response != null) {
            if (response.return == true && response.status == true) {

                $('#password1').val('');
                $('#password2').val('');
                swal("Cuenta activada", "Tu cuenta ha sido activada", "success");
                // Usage!
                sleep(3000).then(() => {
                    window.location = "index.php";
                });
            }
        } else {
            toastr['error'](response.message, "error");
        }

    });
}


function sleep(time) {

    return new Promise((resolve) => setTimeout(resolve, time));
}

function getAllUsers() {
    var idUsuario = idUser;
    $.ajax({
        url: "../Controller/ControllerRouter.php",
        type: "POST",
        data: {
            'usuario': idUsuario,
            'target': 'usuario',
            'method': 'getAll'
        },
        context: document.body

    }).done(function (response) {

        response = JSON.parse(response);
        var usuarios = response.data;
        if (response !== null) {
            if (response.return === true && response.status == true) {
                var tableUsers = $("#tblUsers");
                var strTable = "";
                tableUsers.empty();
                strTable = "<thead><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th><th>Correo</th><th>Sexo</th><th>Acciones</th></thead><tbody>";
                usuarios.forEach(function (e, i) {
                    strTable += "<tr><td>" + usuarios[i].nombre + "</td><td>" + usuarios[i].a_Paterno + "</td><td>" + usuarios[i].a_Materno + "</td><td>" + usuarios[i].correo + "</td><td>" + usuarios[i].sexo + "</td><td class='center'><a class='seeUserDetails' id='seeUserDetail_" + usuarios[i].id_Usuario + "'><i class='btn  fa fa-file-text btnActions'  aria-hidden='true'></i><a id='deleteUser_" + usuarios[i].id_Usuario + "' class='deleteUser' > <i class='btn btn-danger  btnActions fa fa-trash-o'  aria-hidden='true'></i></td></tr>";
                });
                strTable += "</tbody></table>";
                tableUsers.append(strTable);
                tableUsers.DataTable();
            }
        } else {
            toastr['error'](response.message, "error");
        }
    });
}

$(document).on("click", ".deleteUser", function () {
    var mensaje = {
        confirm: [],
        success: [],
        cancel: []
    };
    mensaje.confirm.push({title: "¿Quieres eliminar a este usuario ?"}, {text: "Esta acción no se podrá revertir"});
    mensaje.success.push({title: "Èxito"}, {text: "El usuario se eliminò correctamente"});
    mensaje.cancel.push({title: "Cancelado"}, {text: "El usuario no se eliminò"});
    swalConfirm(mensaje, 'deleteUser', $(this).attr('id').split('_')[1]);
});
function cleanUsersModal() {
    $("#modal_User_Head").empty();
    $("#modal_User_Content").empty();
    $("#modal_User_Footer").empty();
    $("#modal_User_Footer").append("<input type='hidden' id='txtId'/>");
}

$(document).on("click", ".seeUserDetails", function () {
    var usuario = {id_Usuario: $(this).attr('id').split('_')[1]};
    $.ajax({
        url: "../Controller/ControllerRouter.php",
        type: "POST",
        data: {
            'usuario': usuario,
            'target': 'usuario',
            'method': 'get'
        },
        context: document.body

    }).done(function (response) {

        response = JSON.parse(response);
        var usuario = response.data;
        if (response != null) {
            if (response.return == true && response.status == true) {
                cleanUsersModal();
                var strUsuario = "<div class='row'><div class='col-xs-12 col-sm-12 col-md-4'><label for='txtName'>Nombre(s): </label></br>" + usuario[0].nombre + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Apellido paterno: </label></br>" + usuario[0].a_Paterno + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Apellido materno: </label></br>" + usuario[0].a_Materno + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Correo: </label></br>" + usuario[0].correo + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Medio : </label></br>" + usuario[0].medio + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Sexo: </label></br>" + usuario[0].sexo + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Fecha nacimiento: </label></br>" + usuario[0].fecha_Nacimiento + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Celular: </label></br>" + usuario[0].telefono_Celular + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Telefono fijo: </label></br>" + usuario[0].telefono_Fijo + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Facebook: </label></br>" + usuario[0].facebook + "</div><div class='col-xs-12 col-sm-12 col-md-4'><label>Twitter: </label></br>" + usuario[0].twitter + "</div></div>";
                $("#txtId").val(usuario[0].id_Usuario);
                $("#modal_User_Head").append("<h2>Visualizar Usuario</h2>");
                $("#modal_User_Content").append(strUsuario);
                $("#modal_User_Footer").append("<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Cerrar</a>");
                $("#modalUser").modal('open');
            }
        } else {
            toastr['error'](response.message, "error");
        }

    });
});
function swalConfirm(mensaje, funcion1, id) {
    swal({
        title: mensaje.confirm[0].title,
        text: mensaje.confirm[0].text,
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si, borrar",
        closeOnConfirm: true
    },
            function () {
                //funcion1 + "(" + (id) + ");";
                deleteUser(id);
            });
}


function deleteUser(id) {
    var usuario = {id_Usuario: id};
    $.ajax({
        url: "../Controller/ControllerRouter.php",
        type: "POST",
        data: {
            'usuario': usuario,
            'target': 'usuario',
            'method': 'delete'
        },
        context: document.body
    }).done(function (response) {

        response = JSON.parse(response);
        if (response != null) {
            if (response.return == true && response.status == true) {
                toastr['success'](response.message, "success");
                getAllUsers();
            }
        } else {
            toastr['error'](response.message, "error");
        }
    });
}


