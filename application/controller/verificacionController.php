<?php

class verificacionController extends Controller {

    private $modeloVerificacion;

    function __construct(){ //carga el modelo
        $this->modeloVerificacion = $this->loadModel("verificacionModel"); //dice que modelo se utiliza
        $this->modeloCreditos = $this->loadModel("creditosModel"); //dice que modelo se utiliza
    }

    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 2) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloVerificacion->listarVerficiaciones();//recibe datos del modelo

        $page_title = "Lista de verificación"; //Titulo de la pestaña
        $open_menu = ""; //Es para menu de flechas
        $opt_menu = 'listaVerificaciones'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/verificacion/listaVerificacion.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 
    }

    function verificar(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 2) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        if(isset($_POST['btnGuardar'])){

            if (isset($_GET['id']) && $_GET['id'] > 0 ){

                $this->modeloVerificacion->__SET('id_verificacion', $_GET['id']);

                $this->modeloVerificacion->__SET('descripcion', $_POST['txtDescripcion']);
                $this->modeloVerificacion->__SET('status', $_POST['selEstado']);

                $respuesta = $this->modeloVerificacion->actualizarVerificacion();

                if($respuesta){
                    header('location: ' . URL . 'verificacion'); // A donde redireccionar
                }else{
                    echo "No se pudo guardar";
                }

            }else{
                header("Location: ".URL."verificacion"); // A donde redireccionar 
                exit();
            }

        }


        if(isset($_GET['id']) && $_GET['id'] == 0){
            header("Location: ".URL."verificacion"); // A donde redireccionar 
            exit();
        }

        if(isset($_GET['id']) && $_GET['id'] > 0){

            $this->modeloVerificacion->__SET('id_verificacion', $_GET['id']);
            $respuesta = $this->modeloVerificacion->infoVerificacion();

            if(isset($respuesta) && $respuesta != ''){

                $this->modeloVerificacion->__SET('solicitud_credito_id', $respuesta['solicitud_credito_id']);
                $infoCredito = $this->modeloVerificacion->infoCreditoVerificacion();

                $page_title = "Verificando crédito: ".$infoCredito['id_solicitud_credito']; //Titulo de la pestaña
                $open_menu = ""; //Es para menu de flechas
                $opt_menu = 'listaVerificaciones'; //acitva el link del menu, se pone azul
                require APP . 'view/_templates/header.php'; //carga el header en view
                require APP . 'view/verificacion/formVerificacion.php'; //tiene el codigo de la tabla que se va a mostrar
                require APP . 'view/_templates/footer.php'; 

            }else{
                header("Location: ".URL."verificacion"); // A donde redireccionar 
                exit();
            }
        
        }else{
            header("Location: ".URL."concesionarios"); // A donde redireccionar 
            exit();
        }

    }

}

?>