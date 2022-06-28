<?php

class areas_empresaController extends Controller {

    private $modeloAreasEmpresa;

    function __construct(){ //carga el modelo
        $this->modeloAreasEmpresa = $this->loadModel("areas_empresaModel"); //dice que modelo se utiliza
    }

    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloAreasEmpresa->listarAreasEmpresa();//recibe datos del modelo

        $page_title = "Lista de Areas Empresa"; //Titulo de la pestaña
        $open_menu = "finanzautoSA"; //Es para menu de flechas
        $opt_menu = 'listaAreasEmpresa'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/areas-empresa/listaAreasEmpresa.php'; //tiene el codigo de la tabla que se va a mostrar
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
            //print_r($_POST); exit();

            $this->modeloAreasEmpresa->__SET('nombre', $_POST['txtNombre']);
            $this->modeloAreasEmpresa->__SET('descripcion', $_POST['txtDescripcion']);

            $respuesta = $this->modeloAreasEmpresa->crearAreaEmpresa();
            //print_r($respuesta); exit();

            if($respuesta == true){
                header('location: ' . URL . 'areas_empresa');
                exit();
            }else{
                echo "No se pudo guardar";
            }

        }
        
        $page_title = "Crear Area Empresa"; //Titulo de la pestaña
        $open_menu = "finanzautoSA"; //Es para menu de flechas
        $opt_menu = 'listaAreasEmpresa'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/areas-empresa/crearAreaEmpresa.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 

    }

    function editar(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        if(isset($_POST['btnGuardar'])){ //si la variable esta inicializada o existe = hacer:

            if (isset($_GET['id']) && $_GET['id'] > 0 ){

                $this->modeloAreasEmpresa->__SET('id_area_empresa', $_GET['id']);

                $this->modeloAreasEmpresa->__SET('nombre', $_POST['txtNombre']);
                $this->modeloAreasEmpresa->__SET('descripcion', $_POST['txtDescripcion']);

                $respuesta = $this->modeloAreasEmpresa->actualizarAreaEmpresa();

                if($respuesta){
                    header('location: ' . URL . 'areas_empresa');
                }else{
                    echo "No se pudo guardar";
                }

            }else{
                header("Location: ".URL."areas_empresa"); // A donde redireccionar 
                exit();
            }

        }

        if (isset($_GET['id']) && $_GET['id'] == 0) {
            header("Location: ".URL."areas_empresa"); // A donde redireccionar 
            exit();
        }
        
        if (isset($_GET['id']) && $_GET['id'] > 0 ){

            $this->modeloAreasEmpresa->__SET('id_area_empresa', $_GET['id']);
            $respuesta = $this->modeloAreasEmpresa->infoAreasEmpresa();

            if (isset($respuesta) && $respuesta != '' ) {

                $page_title = "Editar area empresa"; //Titulo de la pestaña
                $open_menu = "finanzautoSA"; //Es para menu de flechas
                $opt_menu = 'listaAreasEmpresa'; //acitva el link del menu, se pone azul
                require APP . 'view/_templates/header.php'; //carga el header en view
                require APP . 'view/areas-empresa/editarAreaEmpresa.php'; //tiene el codigo de la tabla que se va a mostrar
                require APP . 'view/_templates/footer.php';

            }else{
                header("Location: ".URL."areas_empresa"); // A donde redireccionar 
                exit();
            }
        
        }else{
            header("Location: ".URL."areas_empresa"); // A donde redireccionar 
            exit();
        }

    }

}

?>