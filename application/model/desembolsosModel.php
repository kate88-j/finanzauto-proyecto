<?php

class desembolsosModel{

    public $id_desembolso;
    public $valor;
    public $descripcion;
    public $fecha;
    public $status;
    public $solicitud_credito_id;
    public $verificacion_id;
    public $emmpleado_id;


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

    
    public function listarDesembolsos(){

        $sql ="SELECT * FROM verificaciones WHERE status = 1 ;"; /*ORDER BY nombre DESC*/

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>