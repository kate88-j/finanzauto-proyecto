<?php

class concesionariosModel{

    public $id_concesionario;
    public $nombre;
    public $direccion;
    public $telefono;


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

    
    public function listarConcesionarios(){
        $sql ="SELECT * FROM concesionarios WHERE status != 0 ORDER BY nombre DESC;";

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearConcesionario(){

        $sql = "INSERT INTO concesionarios (nombre, direccion , telefono) 
                            VALUES (?,?,?)";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->direccion);
        $stm->bindParam(3, $this->telefono);
        
        return $stm->execute(); // Retorna true o false

    }

    public function infoConcesionario(){
        $sql = "SELECT * FROM concesionarios WHERE id_concesionario = ?;";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_concesionario);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarConcesionario(){
        $sql = "UPDATE concesionarios SET nombre = ?, direccion = ?, telefono = ? WHERE id_concesionario = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->direccion);
        $stm->bindParam(3, $this->telefono);

        $stm->bindParam(4, $this->id_concesionario);

        return $stm->execute(); // Retorna true o false
    }

    public function eliminarConcesionario(){
        $sql = "UPDATE concesionarios SET status = 0 WHERE id_concesionario = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->id_concesionario);
        
        return $stm->execute();
    }

}

?>