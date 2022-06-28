<?php

class concesionariosController extends Controller {

    private $modeloConcesionarios;

    function __construct(){ //carga el modelo
        $this->modeloConcesionarios = $this->loadModel("concesionariosModel"); //dice que modelo se utiliza
    }

    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloConcesionarios->listarConcesionarios();//recibe datos del modelo

        $page_title = "Lista de concesionarios"; //Titulo de la pestaña
        $open_menu = "inventario"; //Es para menu de flechas
        $opt_menu = 'listaConcesionarios'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/concesionarios/listaConcesionarios.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 
    }

    function crear(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        if(isset($_POST['btnGuardar'])){


            $this->modeloConcesionarios->__SET('nombre', $_POST['txtNombre']);
            $this->modeloConcesionarios->__SET('direccion', $_POST['txtDireccion']);
            $this->modeloConcesionarios->__SET('telefono', $_POST['txtTelefono']);

            $respuesta = $this->modeloConcesionarios->crearConcesionario();

            if($respuesta == true){
                header('location: ' . URL . 'concesionarios'); // A donde redireccionar 
                exit();
            }else{
                echo "No se pudo guardar";
            }

        }
        
        $page_title = "Crear concesionarios"; //Titulo de la pestaña
        $open_menu = "inventario"; //Es para menu de flechas
        $opt_menu = 'listaConcesionarios'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/concesionarios/crearConcesionario.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 

    }

    function editar(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }
            
        if(isset($_POST['btnGuardar'])){

            if (isset($_GET['id']) && $_GET['id'] > 0 ){

                $this->modeloConcesionarios->__SET('id_concesionario', $_GET['id']);

                $this->modeloConcesionarios->__SET('nombre', $_POST['txtNombre']);
                $this->modeloConcesionarios->__SET('direccion', $_POST['txtDireccion']);
                $this->modeloConcesionarios->__SET('telefono', $_POST['txtTelefono']);

                $respuesta = $this->modeloConcesionarios->actualizarConcesionario();

                if($respuesta){
                    header('location: ' . URL . 'concesionarios'); // A donde redireccionar
                }else{
                    echo "No se pudo guardar";
                }

            }else{
                header("Location: ".URL."concesionarios"); // A donde redireccionar 
                exit();
            }

        }

        if (isset($_GET['id']) && $_GET['id'] == 0) {
            header("Location: ".URL."concesionarios"); // A donde redireccionar 
            exit();
        }

        if (isset($_GET['id']) && $_GET['id'] > 0 ){

            $this->modeloConcesionarios->__SET('id_concesionario', $_GET['id']);
            $respuesta = $this->modeloConcesionarios->infoConcesionario();
        
            if (isset($respuesta) && $respuesta != '' ) {

                $page_title = "Editar concesionarios"; //Titulo de la pestaña
                $open_menu = "inventario"; //Es para menu de flechas
                $opt_menu = 'listaConcesionarios'; //acitva el link del menu, se pone azul
                require APP . 'view/_templates/header.php'; //carga el header en view
                require APP . 'view/concesionarios/editarConcesionario.php'; //tiene el codigo de la tabla que se va a mostrar
                require APP . 'view/_templates/footer.php';

            }else{
                header("Location: ".URL."concesionarios"); // A donde redireccionar 
                exit();
            }
        
        }else{
            header("Location: ".URL."concesionarios"); // A donde redireccionar 
            exit();
        }
        

    }

    function eliminar(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        if (isset($_GET['id']) && $_GET['id'] == 0) {
            header("Location: ".URL."concesionarios"); // A donde redireccionar 
            exit();
        }

        if (isset($_GET['id']) && $_GET['id'] > 0 ){

            $this->modeloConcesionarios->__SET('id_concesionario', $_GET['id']);

            $respuesta = $this->modeloConcesionarios->eliminarConcesionario(); // Cambiar status a 0

            if ($respuesta) {
                header("Location: ".URL."concesionarios"); // A donde redireccionar 
                exit();
            } else {
                echo 'El registro no existe';
            }

        } else {
            header("Location: ".URL."concesionarios"); // A donde redireccionar 
            exit();
        }
    }

}

?>