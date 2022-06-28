<?php

class tiposModel{

    public $id_tipo;
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

    
    public function listarTipos(){
        $sql ="SELECT * FROM tipos WHERE id_tipo != 0 ORDER BY nombre DESC;";

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearTipo(){

        $sql = "INSERT INTO tipos (nombre, descripcion)
        VALUES (?,?)";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->descripcion);

        return $stm->execute(); 
    }

}

?>