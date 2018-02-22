<?php

class Linker {

    public static function getController() {
        require '../Controller/UserController.php';
        require '../Controller/ControllerObras.php';
    }

    public static function getModel() {
        require '../Model/UserModel.php';
        require '../Model/ObrasModel.php';
    }

}

?>