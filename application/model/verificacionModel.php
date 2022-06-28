<?php

class verificacionModel{

    public $id_verificacion;
    public $descripcion;
    public $fecha;
    public $status;
    public $solicitud_credito_id;
    public $empleado_id;


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

    
    public function listarVerficiaciones(){

        $sql ="SELECT * FROM verificaciones WHERE status = 0 OR status = 2 ;"; /*ORDER BY nombre DESC*/

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function infoCreditoVerificacion(){

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

    public function infoVerificacion(){
        $sql = "SELECT * FROM verificaciones WHERE id_verificacion = ?;";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_verificacion);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarVerificacion(){

        $now = date("Y-m-d H:i:s");

        $sql = "UPDATE verificaciones SET descripcion = ?, fecha = ?, status = ? WHERE id_verificacion = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->descripcion);
        $stm->bindParam(2, $now);
        $stm->bindParam(3, $this->status);

        $stm->bindParam(4, $this->id_verificacion);

        return $stm->execute(); // Retorna true o false
    }
}

?>