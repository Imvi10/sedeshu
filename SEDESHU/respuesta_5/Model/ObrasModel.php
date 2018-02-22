<?php

/**
 * Description of ModelUsuario
 *
 * 
 * 
 * 
 */
class ObrasModel {

    private $claveObra;
    private $geometria;
    private $tipoGeometria;
   

    function __construct($array) {
        if (isset($array['claveObra'])) {
            $this->claveObra = $array['claveObra'];
        }
        if (isset($array['geometria'])) {
            $this->geometria = $array['geometria'];
        }
        if (isset($array['tipoGeometria'])) {
            $this->tipoGeometria = $array['tipoGeometria'];
        }
    }

    function getClaveObra() {
        return $this->claveObra;
    }

    function getGeometria() {
        return $this->geometria;
    }

    function getTipoGeometria() {
        return $this->tipoGeometria;
    }

    function setClaveObra($claveObra) {
        $this->claveObra = $claveObra;
    }

    function setGeometria($geometria) {
        $this->geometria = $geometria;
    }

    function setTipoGeometria($tipoGeometria) {
        $this->tipoGeometria = $tipoGeometria;
    }

        function get() {
        $sql = "SELECT claveObra, geometria, tipoGeometria  from obras WHERE ClaveObra = '$this->claveObra';";
        $statement = Connection::getInstance()->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    function getAll() {
        $sql = "SELECT claveObra, geometria, tipoGeometria  from obras ;";
        $statement = Connection::getInstance()->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

}
