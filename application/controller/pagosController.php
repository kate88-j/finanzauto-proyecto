<?php

class pagosController extends Controller {

    private $modeloPagos;

    function __construct(){ //carga el modelo
        $this->modeloPagos = $this->loadModel("pagosModel"); //dice que modelo se utiliza
        $this->modeloCreditos = $this->loadModel("creditosModel"); //dice que modelo se utiliza
    }

    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 5) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        if(isset($_POST['btnBuscarCredito'])){

            $this->modeloCreditos->__SET('id_solicitud_credito', $_POST['txtCredito']);

            $respuesta = $this->modeloCreditos->infoCredito();

            if($respuesta != null){

                header('location: ' . URL . 'pagos/detalle?id='.$respuesta['id_solicitud_credito']); // A donde redireccionar 
                exit();

            }else{
                header('location: ' . URL . 'pagos'); // A donde redireccionar 
                exit();
            } 
        }



        $page_title = "Lista de pagos"; //Titulo de la pestaña
        $open_menu = ""; //Es para menu de flechas
        $opt_menu = 'listaPagos'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        //require APP . 'view/pagos/listaPagos.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/pagos/buscarCredito.php';
        require APP . 'view/_templates/footer.php'; 
    }

    function detalle(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 5) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        if(isset($_POST['btnGuardarAbono'])){

            if (isset($_GET['id']) && $_GET['id'] > 0 ){

                $this->modeloPagos->__SET('solicitud_credito_id', $_GET['id']);
                $this->modeloPagos->__SET('valor', $_POST['txtAbono']);

                $respuesta = $this->modeloPagos->crearPago();

                if($respuesta == true){

                    $guardadoRestante = $this->modeloPagos->guardarRestanteCredito();

                    if ($guardadoRestante == true) {
                        header('location: ' . URL . 'pagos/detalle?id='.$_GET['id']); // A donde redireccionar
                        exit();
                    } else {
                        echo 'Error inesperado';
                    }

                }else{
                    echo "No se pudo guardar";
                }

            }else{
                header("Location: ".URL."concesionarios"); // A donde redireccionar 
                exit();
            }

        }

        if (isset($_GET['id']) && $_GET['id'] == 0) {
            header("Location: ".URL."pagos"); // A donde redireccionar 
            exit();
        }

        if (isset($_GET['id']) && $_GET['id'] > 0 ){

            $this->modeloPagos->__SET('solicitud_credito_id', $_GET['id']);
            $infoCredito = $this->modeloPagos->infoCreditoPagos();
            $infoAbonos = $this->modeloPagos->infoAbonos();

            if (isset($infoCredito) && $infoCredito != '' ) {

                $page_title = "Detalle crédito pagos"; //Titulo de la pestaña
                $open_menu = ""; //Es para menu de flechas
                $opt_menu = 'listaPagos'; //acitva el link del menu, se pone azul
                require APP . 'view/_templates/header.php'; //carga el header en view
                require APP . 'view/pagos/crearPago.php'; //tiene el codigo de la tabla que se va a mostrar
                require APP . 'view/_templates/footer.php';
                require APP . 'view/pagos/ajaxPago.php';

            }else{
                header("Location: ".URL."pagos"); // A donde redireccionar 
                exit();
            }
        
        }else{
            header("Location: ".URL."concesionarios"); // A donde redireccionar 
            exit();
        }
        

    }

}

?>