<?php

class pagosModel{

    public $id_pagos_credito;
    public $valor;
    public $fecha;
    public $solicitud_credito_id;


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

    
    public function infoCreditoPagos(){

        $sql = "SELECT SC.*,
        CL.cedula AS cedula_cliente,
        CL.nombre AS nombre_cliente,
        CL.apellido AS apellido_cliente,
        V.nombre AS vehiculo, 
        C.nombre AS concesionario,
        M.nombre AS marca,
        T.nombre AS tipo

        FROM solicitudes_creditos AS SC

        INNER JOIN clientes AS CL
        ON SC.cliente_id = CL.id_cliente

        INNER JOIN vehiculos AS V
        ON SC.vehiculo_id = V.id_vehiculo

        INNER JOIN concesionarios AS C 
        ON V.concesionario_id = C.id_concesionario

        INNER JOIN marcas AS M
        ON V.marca_id = M.id_marca

        INNER JOIN tipos AS T
        ON V.tipo_id = T.id_tipo

        WHERE SC.id_solicitud_credito = ?;";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->solicitud_credito_id);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function infoAbonos(){
        $sql ="SELECT * FROM pagos_creditos WHERE solicitud_credito_id = ? ;";
        $stm = $this->db->prepare($sql); //Preparar una consulta
        
        $stm->bindParam(1 , $this->solicitud_credito_id);
        
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearPago(){

        $now = date("Y-m-d H:i:s");

        $sql = "INSERT INTO pagos_creditos (valor, fecha, solicitud_credito_id)
                    VALUE (?,?,?)";
        
        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->valor);
        $stm->bindParam(2, $now);
        $stm->bindParam(3, $this->solicitud_credito_id);
        
        return $stm->execute(); // Retorna true o false
    }

    public function guardarRestanteCredito(){

        $sql ="SELECT valor_restante FROM solicitudes_creditos WHERE id_solicitud_credito = ? ;";
        $stm = $this->db->prepare($sql); //Preparar una consulta
        $stm->bindParam(1 , $this->solicitud_credito_id);
        $stm->execute();
        $data = $stm->fetch(PDO::FETCH_ASSOC);

        $result_resta = $data['valor_restante'] - $this->valor;

        $sql = "UPDATE solicitudes_creditos SET valor_restante = ? WHERE id_solicitud_credito = ?;";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $result_resta);
        $stm->bindParam(2, $this->solicitud_credito_id);
        return $stm->execute(); // Retorna true o false

    }

}

?>