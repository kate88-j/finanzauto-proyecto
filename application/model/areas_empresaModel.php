<?php

class areas_empresaModel{

    public $id_area_empresa;
    public $nombre;
    public $descripcion;


    public $db;

    function __construct($db){
        $this->db = $db;
    }

    public function __SET($atr, $valor){
        $this->$atr = $valor;
    }

    public function __GET($atr){
        return $this->$atr;
    }

    
    public function listarAreasEmpresa(){
        $sql ="SELECT * FROM areas_empresa WHERE id_area_empresa != 0 ORDER BY nombre ASC;";

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearAreaEmpresa(){

        $sql = "INSERT INTO areas_empresa (nombre, descripcion)
                            VALUES (?,?)";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->descripcion);

        return $stm->execute(); 
    }

    public function infoAreasEmpresa(){
        $sql = "SELECT * FROM areas_empresa WHERE id_area_empresa = ?;";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_area_empresa);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarAreaEmpresa(){
        $sql = "UPDATE areas_empresa SET nombre = ?, descripcion = ? WHERE id_area_empresa = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->descripcion);

        $stm->bindParam(3, $this->id_area_empresa);

        return $stm->execute(); 
    }

}

?>