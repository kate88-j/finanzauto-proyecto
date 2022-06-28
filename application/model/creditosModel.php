<?php

class creditosModel{

    public $id_solicitud_credito;
    public $referencia_personal_1;
    public $referencia_personal_2;
    public $referencia_familiar_1;
    public $referencia_familiar_2;
    public $valor;
    public $valor_restante;
    public $cantidad_vehiculos;
    public $cuotas;
    public $cuotas_restantes;
    public $fecha_apertura;
    public $fecha_cancelacion;
    public $empleado_id;
    public $cliente_id;
    public $vehiculo_id;


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

    
    public function listarCreditos(){

        $sql = "SELECT S.id_solicitud_credito,
        S.referencia_personal_1,
        S.referencia_personal_2,
        S.referencia_familiar_1,
        S.referencia_familiar_2,
        S.valor,
        S.cantidad_vehiculos,
        S.cuotas,
        S.fecha_apertura,
        S.fecha_cancelacion,
        E.nombre AS empleado,
        C.nombre AS cliente,
        V.nombre AS vehiculo

        FROM solicitudes_creditos AS S

        INNER JOIN empleados AS E
        ON S.empleado_id = E.id_empleado

        INNER JOIN clientes AS C
        ON S.cliente_id = C.id_cliente

        INNER JOIN vehiculos AS V
        ON S.vehiculo_id = V.id_vehiculo

        WHERE S.id_solicitud_credito != 0 ORDER BY S.id_solicitud_credito DESC;";

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearCredito(){

        $now = date("Y-m-d H:i:s");

        $sql = "INSERT INTO solicitudes_creditos (referencia_personal_1, referencia_personal_2, referencia_familiar_1, referencia_familiar_2, valor, valor_restante, cantidad_vehiculos, cuotas, cuotas_restantes, fecha_apertura, empleado_id, cliente_id, vehiculo_id) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->referencia_personal_1);
        $stm->bindParam(2, $this->referencia_personal_2);
        $stm->bindParam(3, $this->referencia_familiar_1);
        $stm->bindParam(4, $this->referencia_familiar_2);
        $stm->bindParam(5, $this->valor);
        $stm->bindParam(6, $this->valor); //valor_restante
        $stm->bindParam(7, $this->cantidad_vehiculos);
        $stm->bindParam(8, $this->cuotas);
        $stm->bindParam(9, $this->cuotas); //cuotas_restantes
        $stm->bindParam(10, $now); /*$this->fecha_apertura*/
        $stm->bindParam(11, $this->empleado_id);
        $stm->bindParam(12, $this->cliente_id);
        $stm->bindParam(13, $this->vehiculo_id);

        $response = $stm->execute();  // Retorna true o false

        if ($response == true) {

            //Consultar el registro guardado
            $sql ="SELECT id_solicitud_credito FROM solicitudes_creditos 
            WHERE referencia_personal_1 = ? AND 
            referencia_personal_2 = ? AND 
            referencia_familiar_1 = ? AND 
            referencia_familiar_2 = ? AND 
            valor = ? AND 
            cantidad_vehiculos = ? AND 
            cuotas = ? AND
            empleado_id = ? AND
            cliente_id = ? AND
            vehiculo_id = ?;";

            $stm = $this->db->prepare($sql);

            $stm->bindParam(1, $this->referencia_personal_1);
            $stm->bindParam(2, $this->referencia_personal_2);
            $stm->bindParam(3, $this->referencia_familiar_1);
            $stm->bindParam(4, $this->referencia_familiar_2);
            $stm->bindParam(5, $this->valor);
            $stm->bindParam(6, $this->cantidad_vehiculos);
            $stm->bindParam(7, $this->cuotas);
            $stm->bindParam(8, $this->empleado_id);
            $stm->bindParam(9, $this->cliente_id);
            $stm->bindParam(10, $this->vehiculo_id);

            $stm->execute();
            $data = $stm->fetch(PDO::FETCH_ASSOC);
            //print_r($data); exit();


            $descripcion = "";
            $status = 0;
            $id_solicitud_credito = $data['id_solicitud_credito'];
            $user_id = $_SESSION['id'];

            // Tabla verificaciones
            $sql = "INSERT INTO verificaciones (descripcion, status, solicitud_credito_id, empleado_id) 
            VALUES (?,?,?,?)";

            $stm = $this->db->prepare($sql);

            $stm->bindParam(1, $descripcion);
            $stm->bindParam(2, $status);
            $stm->bindParam(3, $id_solicitud_credito);
            $stm->bindParam(4, $user_id);

            return $stm->execute();  // Retorna true o false


        }else{
            return false;
        }

    }

    public function infoCredito(){
        $sql = "SELECT * FROM solicitudes_creditos WHERE id_solicitud_credito = ?;";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_solicitud_credito);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

}

?>