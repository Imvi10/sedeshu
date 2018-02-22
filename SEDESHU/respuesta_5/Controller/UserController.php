<?php

class UserController {

    private $reponse = array(
        'return' => TRUE,
        'status' => FALSE,
        'message' => 'Empty',
        'data' => array(),
        'tipoDeSolicitud' => 'JSON'
    );
    private $method;
    private $message;
    private $object;

    function deploy($method) {
        switch ($method) {
            case 'login':
                return $this->login();
            case 'logOut':
                return $this->logOut();
            case 'changePassword':
                return $this->changePassword();
            case 'add':
                return $this->add();
            case 'activateAccount':
                return $this->activateAccount();
            case 'avoidDuplicates':
                return $this->avoidDuplicates();
            case 'get':
                return $this->get();
            case 'getAll':
                return $this->getAll();
            case 'update':
                return $this->update();
            case 'delete':
                return $this->delete();
            case 'getDeleted':
                return $this->getDeleted();
            case 'unlock':
                return $this->unlock();
            default :
                break;
        }
    }

    /*
      function generic($cunt) {
      $this->reponse['tipoDeSolicitud'] = "JSON";
      if (isset($_POST['object'])) {
      $array = $_POST['object'];
      $object = new UserModel($array);
      $response = $object->$cunt();
      if ($response != null) {
      $this->reponse['status'] = TRUE;
      $this->reponse['message'] = "lala";
      $this->reponse['data'] = $response;
      } else {
      $this->reponse['status'] = FALSE;
      $this->reponse['message'] = "Error al obtener la informacion del  cliente ";
      }
      }
      return $this->reponse;
      }

      function lala() {
      $nombreMetodo = "get";
      return $this->generic($nombreMetodo);
      }

      function lalala() {
      $cunt["mensaje"]['success'] = "Mensaje Exito";
      $cunt["mensaje"]['error'] = "Mensaje Error";
      $cunt["method"] = "get";
      // return $this->generic2($cunt);
      } */

    function add() {
        $this->object = $_POST["user"];
        $this->message['success'] = "El usuario fue agregado correctamente";
        $this->message['error'] = "Error al agregar al usuario ";
        $this->method = "add";
        return $this->getReponse();
    }

    function unlock() {
        $this->object = $_POST["user"];
        $this->message['success'] = "El usuario fue desloqueado correctamente";
        $this->message['error'] = "Error al desbloquear al usuario ";
        $this->method = "unlock";
        return $this->getReponse();
    }

    function getAll() {
        $this->object = $_POST["user"];
        $this->message['success'] = "Usuarios obtenidos correctamente";
        $this->message['error'] = "Error al obtener a los usuarios";
        $this->method = "getAll";
        return $this->getReponse();
    }

    function getDeleted() {
        $this->object = $_POST["user"];
        $this->message['success'] = "Usuarios obtenidos correctamente";
        $this->message['error'] = "Error al obtener a los usuarios";
        $this->method = "getDeleted";
        return $this->getReponse();
    }

    function get() {
        $this->object = $_POST["user"];
        $this->message['success'] = "Usuario obtenido correctamente";
        $this->message['error'] = "Error al obtener al usuario";
        $this->method = "get";
        return $this->getReponse();
    }

    function update() {
        $this->object = $_POST["user"];
        $this->message['success'] = "Usuario actualizado correctamente";
        $this->message['error'] = "Error al actualizar al usuario";
        $this->method = "update";
        return $this->getReponse();
    }

    function delete() {
        $this->object = $_POST["user"];
        $this->message['success'] = "Usuario eliminado correctamente";
        $this->message['error'] = "Error al eliminar al usuario";
        $this->method = "delete";
        return $this->getReponse();
    }

    function login() {
        $this->object = $_POST["user"];
        $this->message['success'] = "Bienvenido";
        $this->message['error'] = "Error al iniciar sesión";
        $this->method = "login";
        return $this->getReponse();
    }

    function logOut() {
        $this->object = $_POST["user"];
        $this->message['success'] = "Se cerró sesión correctamente";
        $this->message['error'] = "Error al salir del sistema";
        $this->method = "logOut";
        return $this->getReponse();
    }
    
    function getReponse() {
        $this->reponse['tipoDeSolicitud'] = "JSON";
        if (isset($this->object)) {
            $array = $this->object;
            $object = new UserModel($array);
            $method = $this->method;
            $response = $object->$method();
            if ($response != null) {
                $this->reponse['status'] = TRUE;
                $this->reponse['message'] = $this->message["success"];
                $this->reponse['data'] = $response;
            } else {
                $this->reponse['status'] = FALSE;
                $this->reponse['message'] = $this->message['error'];
            }
        }
        return $this->reponse;
    }

    
}
