<?php

class empleadosModel{

    public $id_empleado;
    public $cedula;
    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $email;
    public $username;
    public $password;
    public $status;
    public $area_empresa_id;


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

    
    public function listarEmpleados(){

        $sql ="SELECT E.id_empleado, 
        E.cedula, 
        E.nombre, 
        E.apellido, 
        E.telefono, 
        E.direccion, 
        E.email, 
        E.username, 
        E.password, 
        E.status, 
        A.nombre AS area_empresa

        FROM empleados AS E

        INNER JOIN areas_empresa AS A 
        ON E.area_empresa_id = A.id_area_empresa
            
        WHERE E.status != 0 ORDER BY E.nombre ASC;";

        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearEmpleado(){

        $passwordCifrado = $this->passwordCrypt($this->password);

        $sql = "INSERT INTO empleados (cedula, nombre, apellido, telefono, direccion, email, username, password, status, area_empresa_id) 
                        VALUES (?,?,?,?,?,?,?,?,?,?)";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->cedula);
        $stm->bindParam(2, $this->nombre);
        $stm->bindParam(3, $this->apellido);
        $stm->bindParam(4, $this->telefono);
        $stm->bindParam(5, $this->direccion);
        $stm->bindParam(6, $this->email);
        $stm->bindParam(7, $this->username);
        $stm->bindParam(8, $passwordCifrado);
        $stm->bindParam(9, $this->status);
        $stm->bindParam(10, $this->area_empresa_id);
        
        return $stm->execute(); // Retorna true o false

    }

    function passwordCrypt($password){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    public function infoEmpleado(){ // Traer info
        $sql = "SELECT * FROM empleados WHERE id_empleado = ?;";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id_empleado);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarEmpleado(){
        $sql = "UPDATE empleados SET nombre = ?, apellido = ?, telefono = ?, direccion = ?, email = ?, username = ?, status = ?, area_empresa_id = ? 
        WHERE id_empleado = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->apellido);
        $stm->bindParam(3, $this->telefono);
        $stm->bindParam(4, $this->direccion);
        $stm->bindParam(5, $this->email);
        $stm->bindParam(6, $this->username);
        $stm->bindParam(7, $this->status);
        $stm->bindParam(8, $this->area_empresa_id);

        $stm->bindParam(9, $this->id_empleado);

        return $stm->execute();
    }

    public function actualizarPassword(){

        $passwordCifrado = $this->passwordCrypt($this->password);

        $sql = "UPDATE empleados SET password = ? WHERE id_empleado = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $passwordCifrado);
        $stm->bindParam(2, $this->id_empleado);

        return $stm->execute();
    }

    public function eliminarEmpleado(){

        $sql = "UPDATE empleados SET status = 0 WHERE id_empleado = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->id_empleado);
        
        return $stm->execute();
    }

}

?>