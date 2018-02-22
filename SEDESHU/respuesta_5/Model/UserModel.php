<?php

/**
 * Description of ModelUsuario
 *
 * 
 * 
 * 
 */
class UserModel {

    private $idUsuario;
    private $correo;
    private $password;
    private $array;
    private $id_Tipo_Usuario;

    function __construct($array) {
        if (isset($array['idUsuario'])) {
            $this->idUsuario = $array['idUsuario'];
        }
        if (isset($array['correo'])) {
            $this->correo = $array['correo'];
        }
        if (isset($array['password'])) {
            $this->password = $array['password'];
        }
        if (isset($array['id_Tipo_Usuario'])) {
            $this->id_Tipo_Usuario = $array['id_Tipo_Usuario'];
        }
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getPassword() {
        return $this->password;
    }

    function getArray() {
        return $this->array;
    }

    function getId_Tipo_Usuario() {
        return $this->id_Tipo_Usuario;
    }

    function setArray($array) {
        $this->array = $array;
    }

    function setId_Tipo_Usuario($id_Tipo_Usuario) {
        $this->id_Tipo_Usuario = $id_Tipo_Usuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function login() {
        $sql = "SELECT * FROM usuario WHERE correo = '$this->correo' AND password = md5('$this->password');";
        $statement = Connection::getInstance()->prepare($sql);
        $statement->execute();
        $obj = $statement->fetchAll();
        if ($obj != null) {
            $_SESSION['loggedIn'] = True;
            $_SESSION['id_Usuario'] = $obj[0]['idUsuario'];
            $_SESSION['correo'] = $obj[0]['correo'];
            $_SESSION['type'] = $obj[0]['id_Tipo_Usuario'];
        }
        return $obj;
    }

    static function isAdmin() {
        if ($_SESSION['type'] === '2' || $_SESSION['type'] === '3') {
            return True;
        }
    }

    function get() {
        $sql = "SELECT idUsuario, correo, id_Tipo_Usuario    , status FROM usuario WHERE idUsuario = $this->idUsuario;";
        $statement = Connection::getInstance()->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getAll() {
        $sql = "SELECT idUsuario, correo,  status  FROM usuario WHERE status = 1 order by idUsuario asc";
        $statement = Connection::getInstance()->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getDeleted() {
        $sql = "select idUsuario, correo, password, id_Tipo_Usuario, status from usuario where status = 0";
        $statement = Connection::getInstance()->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    function logOut() {

        unset($_SESSION['loggedIn']);
        unset($_SESSION['idUsuario']);
        unset($_SESSION['type']);
        if (!isset($_SESSION['loggedIn'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function add() {
        $sql = "INSERT INTO usuario (correo, password , id_Tipo_Usuario) VALUES ('$this->correo', md5('" . $this->password . "') , $this->id_Tipo_Usuario);";
        $statement = Connection::getInstance()->prepare($sql);
        return $statement->execute();
    }

    function avoidDuplicates() {

        $sql = "SELECT * FROM usuario WHERE correo = '$this->correo';";
        $statement = Connection::getInstance()->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    function delete() {
        $sql = "UPDATE usuario SET status = 0 WHERE idUsuario  = $this->idUsuario;";
        $statement = Connection::getInstance()->prepare($sql);
        return $statement->execute();
    }

    function update() {
        $sql = "UPDATE usuario SET   correo = '$this->correo'  ,  id_Tipo_Usuario = $this->id_Tipo_Usuario WHERE idUsuario  = $this->idUsuario ;";
        $statement = Connection::getInstance()->prepare($sql);
        return $statement->execute();
    }

    function unlock() {
        $sql = "UPDATE usuario SET  status =  1 WHERE idUsuario  = $this->idUsuario;";
        $statement = Connection::getInstance()->prepare($sql);
        return $statement->execute();
    }

}
