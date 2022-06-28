<?php

class clientesModel{

    public $id_cliente;
    public $cedula;
    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $correo;
    public $estado_civil;
    public $status;


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

    
    public function listarClientes(){
        $sql ="SELECT * FROM clientes WHERE id_cliente != 0 ORDER BY nombre DESC;";

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearCliente(){

        $sql = "INSERT INTO clientes (cedula, nombre, apellido , telefono, direccion, correo, estado_civil, status) 
                            VALUES (?,?,?,?,?,?,?,?)";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->cedula);
        $stm->bindParam(2, $this->nombre);
        $stm->bindParam(3, $this->apellido);
        $stm->bindParam(4, $this->telefono);
        $stm->bindParam(5, $this->direccion);
        $stm->bindParam(6, $this->correo);
        $stm->bindParam(7, $this->estado_civil);
        $stm->bindParam(8, $this->status);
        
        
        return $stm->execute(); // Retorna true o false

    }

    public function infoCliente(){
        $sql = "SELECT * FROM clientes WHERE id_cliente = ?;";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_cliente);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarCliente(){
        $sql = "UPDATE clientes SET cedula = ?, nombre = ?, apellido = ?, telefono = ?, direccion = ?, correo = ?, estado_civil = ?, status = ?
        WHERE id_cliente = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->cedula);
        $stm->bindParam(2, $this->nombre);
        $stm->bindParam(3, $this->apellido);
        $stm->bindParam(4, $this->telefono);
        $stm->bindParam(5, $this->direccion);
        $stm->bindParam(6, $this->correo);
        $stm->bindParam(7, $this->estado_civil);
        $stm->bindParam(8, $this->status);

        $stm->bindParam(9, $this->id_cliente);

        return $stm->execute(); // Retorna true o false
    }

}

?>