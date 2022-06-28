<?php

class authModel{

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


    public function login(){

        $local_status = 1;

        $sql ="SELECT COUNT(*) AS total FROM empleados WHERE username = ? AND status = ?;";

        $stm = $this->db->prepare($sql);

        $stm->bindParam(1 , $this->username);
        $stm->bindParam(2 , $local_status);

        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);

        //print_r($result['total']);

        // El usuario existe
        if ($result['total'] > 0) {

            $compare_result = $this->comparePasswords($this->password, $this->username);

            if ($compare_result == true) {

                $sql = "SELECT * FROM empleados WHERE username = ?;";

                $stm = $this->db->prepare($sql);
    
                $stm->bindParam(1 , $this->username);
        
                $stm->execute();
                $data = $stm->fetch(PDO::FETCH_ASSOC);

                $_SESSION['id'] = $data['id_empleado'];
                $_SESSION['nombre_completo'] = $data['nombre'] .' '. $data['apellido'];
                $_SESSION['area_empresa'] = $data['area_empresa_id'];
                return true;
            } else {
                return false;
            }
            

        } else {
            return false;
        }


    }


    function comparePasswords($current_password, $current_username){
        //try{
    
            $sql ="SELECT password FROM empleados WHERE username = ?;";
    
            $stm = $this->db->prepare($sql);
    
            $stm->bindParam(1 , $current_username);
    
            $stm->execute();
            $data = $stm->fetch(PDO::FETCH_ASSOC);
    
    
            if ($data != null) {
                return password_verify($current_password, $data['password']);
            } else {
                return false;
            }
    
        //}catch(PDOException $e){
        //    error_log('USERMODEL::comparePasswords->Exeption'. $e);
        //    return false;
        //}
    }


}

?>