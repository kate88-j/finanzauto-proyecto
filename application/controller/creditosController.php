<?php

class creditosController extends Controller {

    private $modeloCreditos;
    private $modeloClientes;
    private $modeloVehiculos;

    function __construct(){ //carga el modelo
        $this->modeloCreditos = $this->loadModel("creditosModel"); //dice que modelo se utiliza
        $this->modeloClientes = $this->loadModel("clientesModel");
        $this->modeloVehiculos = $this->loadModel("vehiculosModel");
    }

    // TODO - marcasController - index
    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloCreditos->listarCreditos();//recibe datos del modelo

        $page_title = "Lista de creditos"; //Titulo de la pestaña
        $open_menu = "gestionCreditos"; //Es para menu de flechas
        $opt_menu = 'listaCreditos'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/creditos/listaCreditos.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 
    }

    function crear(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        if(isset($_POST['btnGuardar'])){

            $this->modeloCreditos->__SET('referencia_personal_1', $_POST['txtReferenciaPersonal1']);
            $this->modeloCreditos->__SET('referencia_personal_2', $_POST['txtReferenciaPersonal2']);
            $this->modeloCreditos->__SET('referencia_familiar_1', $_POST['txtReferenciaFamiliar1']);
            $this->modeloCreditos->__SET('referencia_familiar_2', $_POST['txtReferenciaFamiliar2']);
            $this->modeloCreditos->__SET('valor', $_POST['txtValorCredito']);
            $this->modeloCreditos->__SET('cantidad_vehiculos', $_POST['txtCantidadVehiculos']);
            $this->modeloCreditos->__SET('cuotas', $_POST['txtCuotas']);
            $this->modeloCreditos->__SET('empleado_id', $_SESSION['id']); // $_SESSION['id']
            $this->modeloCreditos->__SET('cliente_id', $_POST['selListaClientes']);
            $this->modeloCreditos->__SET('vehiculo_id', $_POST['selListaVehiculos']);

            $respuesta = $this->modeloCreditos->crearCredito();

            if($respuesta){
                header('location: ' . URL . 'creditos');
            }else{
                echo "No se pudo guardar";
            }
        }

        $listaClientes = $this->modeloClientes->listarClientes();
        $listaVehiculos = $this->modeloVehiculos->listarVehiculos();

        $page_title = "Crear credito"; //Titulo de la pestaña
        $open_menu = "gestionCreditos"; //Es para menu de flechas
        $opt_menu = 'crearCredito'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/creditos/crearCredito.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 

    }

}

?>