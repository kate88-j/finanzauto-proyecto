<?php

class authController extends Controller {

    function __construct(){//carga el modelo
        $this->modeloAuth = $this->loadModel("authModel");//dice que modelo se utiliza
    }

    function login(){

        if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
            header('Location:'.URL.'');
            exit();
        }

        if(isset($_POST['btnLogin'])){

            $this->modeloAuth->__SET('username', $_POST['txtUsuario']);
            $this->modeloAuth->__SET('password', $_POST['txtContrasena']);

            $respuesta = $this->modeloAuth->login();

            if ($respuesta == true) {
                // puede ingresar
                //echo 'Datos correctos / redireccionar a / ';
                //print_r($_SESSION);

                header("Location: " .URL. "");
                exit();

            } else {
                // no puede ingresar
                //echo 'Usuario y/o contraseña incorrecta';

                header('Location:'.URL.'auth/login');
                exit();

            }

        }

        //
        //
        //

        require APP . 'view/login/loginForm.php';

    }


    function logout(){
        $_SESSION = null;
        session_destroy();
        echo 'has salido del sistema';
        //print_r($_SESSION);
        header("Location: " .URL. "auth/login");
    }


}

?>