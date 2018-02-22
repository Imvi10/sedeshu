<?php
require '../Helper/Linker.php';
require '../DB/Connection.php';
session_start();

Linker::getController();
Linker::getModel();

if (isset($_POST["target"])) {
    $control = null;
    switch ($_POST["target"]) {
        case "user":
            $control = new UserController();
            break;
        case "obra":
            $control = new ObrasController();
            break;
        default :
            break;
    }

    if ($control !== null) {
        if (isset($_POST["method"])) {
            $response = $control->deploy($_POST["method"]);
            if ($response['return'] == TRUE) {
                if ($response['tipoDeSolicitud'] == "JSON") {
                    echo json_encode($response);
                } else if ($response['tipoDeSolicitud'] == "TEXTO") {
                    echo $response['message'];
                }
            }
        }
    }
}
?>