<?php

class ObrasController {

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
            case 'get':
                return $this->get();
            case 'getAll':
                return $this->getAll();
            default :
                break;
        }
    }

    function getAll() {
        $this->object = $_POST["obra"];
        $this->message['success'] = "Usuarios obtenidos correctamente";
        $this->message['error'] = "Error al obtener a los usuarios";
        $this->method = "getAll";
        return $this->getReponse();
    }

    function get() {
        $this->object = $_POST["obra"];
        $this->message['success'] = "Usuario obtenido correctamente";
        $this->message['error'] = "Error al obtener al usuario";
        $this->method = "get";
        return $this->getReponse();
    }

    function getReponse() {
        $this->reponse['tipoDeSolicitud'] = "JSON";
        if (isset($this->object)) {
            $array = $this->object;
            $object = new ObrasModel($array);
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
