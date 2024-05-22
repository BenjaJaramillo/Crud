<?php
require_once("sistema.class.php");
class Cliente extends Sistema
{
    function getAll()
    {
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_idioma, nombre, ultima_actualizacion FROM idioma;");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = $stmt->fetchAll();
        $this->setCount(count($datos));
        return $datos;
    }

    function getOne($id_idioma){
        $this->connect();
        $stmt = $this->conn->prepare("SELECT id_idioma, nombre, ultima_actualizacion
            FROM idioma
            WHERE id_idioma=:id_idioma;");
        $stmt->bindParam(':id_idioma', $id_idioma, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $datos = array();
        $datos = $stmt->fetchAll();
        if (isset($datos[0])) {
            $this->setCount(count($datos));
            return $datos[0];
        }
        return array();
    }
    function Insert($datos){
        $this->connect();
        if ($this->validateMarca($datos)) {
            $stmt=$this->conn->prepare("INSERT INTO idioma 
            (nombre)
            VALUES (:nombre);");
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->rowCount();
        }
        return 0;

    }

    function Delete($id_idioma){
        $this->connect();
        $stmt = $this->conn->prepare("DELETE FROM idioma
        WHERE id_idioma=:id_idioma;");
        $stmt->bindParam(':id_idioma', $id_idioma, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function Update($id_idioma,$datos){//datos es un array
        $this->connect();
        $stmt=$this->conn->prepare("UPDATE idioma SET 
        nombre=:nombre WHERE id_idioma=:id_idioma;");
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);+
        $stmt->bindParam(':id_idioma', $id_idioma, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
    function validateMarca($datos){
        if (empty($datos['nombre'])) {
            return false;
        }
        return true;
    }
}

