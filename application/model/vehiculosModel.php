<?php

class vehiculosModel{

    public $id_vehiculo;
    public $nombre;
    public $precio;
    public $concesionario_id;
    public $marca_id;
    public $tipo_id;


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

    
    public function listarVehiculos(){

        $sql = "SELECT V.id_vehiculo,
        V.nombre,
        V.precio,
        C.nombre AS concesionario,
        M.nombre AS marca,
        T.nombre AS tipo
        
        FROM vehiculos AS V

        INNER JOIN concesionarios AS C 
        ON V.concesionario_id = C.id_concesionario

        INNER JOIN marcas AS M
        ON V.marca_id = M.id_marca

        INNER JOIN tipos AS T
        ON V.tipo_id = T.id_tipo

        WHERE V.id_vehiculo != 0 ORDER BY V.nombre ASC;";

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearVehiculo(){

        $sql = "INSERT INTO vehiculos (nombre, precio, concesionario_id, marca_id, tipo_id) 
                        VALUES (?,?,?,?,?)";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->precio);
        $stm->bindParam(3, $this->concesionario_id);
        $stm->bindParam(4, $this->marca_id);
        $stm->bindParam(5, $this->tipo_id);
        
        return $stm->execute(); // Retorna true o false

    }

    public function infoVehiculos(){
        $sql = "SELECT * FROM vehiculos WHERE id_vehiculo = ?;";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_vehiculo);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarVehiculo(){
        $sql = "UPDATE vehiculos SET nombre = ?, precio = ?, concesionario_id = ?, 
        marca_id = ?, tipo_id = ? WHERE id_vehiculo = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->precio);
        $stm->bindParam(3, $this->concesionario_id);
        $stm->bindParam(4, $this->marca_id);
        $stm->bindParam(5, $this->tipo_id);

        $stm->bindParam(6, $this->id_vehiculo); 

        return $stm->execute(); // Retorna true o false

    }

}

?>