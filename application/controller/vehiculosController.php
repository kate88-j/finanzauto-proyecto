<?php

class vehiculosController extends Controller {

    private $modeloVehiculos;

    function __construct(){ //carga el modelo
        $this->modeloVehiculos = $this->loadModel("vehiculosModel"); //dice que modelo se utiliza
        $this->modeloMarcas = $this->loadModel("marcasModel");
        $this->modeloConcesionarios = $this->loadModel("concesionariosModel");
        $this->modeloTipos = $this->loadModel("tiposModel");
    }

    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloVehiculos->listarVehiculos();//recibe datos del modelo

        $page_title = "Lista de vehiculos"; //Titulo de la pestaña
        $open_menu = "inventario"; //Es para menu de flechas
        $opt_menu = 'listaVehiculos'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/vehiculos/listaVehiculos.php'; //tiene el codigo de la tabla que se va a mostrar
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

            $this->modeloVehiculos->__SET('nombre', $_POST['txtNombre']);
            $this->modeloVehiculos->__SET('precio', $_POST['txtPrecio']);
            $this->modeloVehiculos->__SET('concesionario_id', $_POST['selConcesionarios']);
            $this->modeloVehiculos->__SET('marca_id', $_POST['selMarcas']);
            $this->modeloVehiculos->__SET('tipo_id', $_POST['selTipos']); 
            
            $respuesta = $this->modeloVehiculos->crearVehiculo();

            if($respuesta == true){
                header('location: ' . URL . 'vehiculos'); // A donde redireccionar 
                exit();
            }else{
                echo "No se pudo guardar";
            }    
        }

        $listaMarcas = $this->modeloMarcas->listarMarcas();
        $listaConcesionarios = $this->modeloConcesionarios->listarConcesionarios();
        $listaTipos = $this->modeloTipos->listarTipos();
        
        $page_title = "Crear vehiculos"; //Titulo de la pestaña
        $open_menu = "inventario"; //Es para menu de flechas
        $opt_menu = 'listaVehiculos'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/vehiculos/crearVehiculo.php'; //tiene el codigo de la tabla que se va a mostrar
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

                $this->modeloVehiculos->__SET('id_vehiculo', $_GET['id']);

                $this->modeloVehiculos->__SET('nombre', $_POST['txtNombre']);
                $this->modeloVehiculos->__SET('precio', $_POST['txtPrecio']);
                $this->modeloVehiculos->__SET('concesionario_id', $_POST['selConcesionarios']);
                $this->modeloVehiculos->__SET('marca_id', $_POST['selMarcas']);
                $this->modeloVehiculos->__SET('tipo_id', $_POST['selTipos']); 
                
                $respuesta = $this->modeloVehiculos->actualizarVehiculo();

                if($respuesta){
                    header('location: ' . URL . 'vehiculos');
                }else{
                    echo "No se pudo guardar";
                }

            }else{
                header("Location: ".URL."vehiculos"); // A donde redireccionar 
                exit();
            }

        }

        if (isset($_GET['id']) && $_GET['id'] == 0) {
            header("Location: ".URL."vehiculos"); // A donde redireccionar 
            exit();
        }

        if (isset($_GET['id']) && $_GET['id'] > 0 ){

            $this->modeloVehiculos->__SET('id_vehiculo', $_GET['id']);
            $respuesta = $this->modeloVehiculos->infoVehiculos();

            if (isset($respuesta) && $respuesta != '' ) {

                $listaMarcas = $this->modeloMarcas->listarMarcas();
                $listaConcesionarios = $this->modeloConcesionarios->listarConcesionarios();
                $listaTipos = $this->modeloTipos->listarTipos();
                
                $page_title = "Editar vehiculo"; //Titulo de la pestaña
                $open_menu = "inventario"; //Es para menu de flechas
                $opt_menu = 'listaVehiculos'; //acitva el link del menu, se pone azul
                require APP . 'view/_templates/header.php'; //carga el header en view
                require APP . 'view/vehiculos/editarVehiculo.php'; //tiene el codigo de la tabla que se va a mostrar
                require APP . 'view/_templates/footer.php';

            }else{
                header("Location: ".URL."vehiculos"); // A donde redireccionar 
                exit();
            }
        
        }else{
            header("Location: ".URL."vehiculos"); // A donde redireccionar 
            exit();
        }

    }

}

?>