<?php

class tiposController extends Controller {

    private $modeloTipos;

    function __construct(){ //carga el modelo
        $this->modeloTipos = $this->loadModel("tiposModel"); //dice que modelo se utiliza
    }

    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloTipos->listarTipos();//recibe datos del modelo

        $page_title = "Lista de tipos de vehiculo"; //Titulo de la pestaña
        $open_menu = "inventario"; //Es para menu de flechas
        $opt_menu = 'listaTipos'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/tipos/listaTipos.php'; //tiene el codigo de la tabla que se va a mostrar
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

            $this->modeloTipos->__SET('nombre', $_POST['txtNombre']);
            $this->modeloTipos->__SET('descripcion', $_POST['txtDescripcion']);

            $respuesta = $this->modeloTipos->crearTipo();

            if($respuesta == true){
                header('location: ' . URL . 'tipos');
                exit();
            }else{
                echo "No se pudo guardar";
            }

        }
        
        $page_title = "Crear tipo de vehiculo"; //Titulo de la pestaña
        $open_menu = "inventario"; //Es para menu de flechas
        $opt_menu = 'listaTipos'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/tipos/crearTipo.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 

    }

}

?>