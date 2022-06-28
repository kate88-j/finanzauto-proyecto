<?php

class clientesController extends Controller {

    private $modeloClientes;

    function __construct(){ //carga el modelo
        $this->modeloClientes = $this->loadModel("clientesModel"); //dice que modelo se utiliza
    }

    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloClientes->listarClientes();//recibe datos del modelo

        $page_title = "Lista de clientes"; //Titulo de la pestaña
        $open_menu = "gestionCreditos"; //Es para menu de flechas
        $opt_menu = 'listaClientes'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/clientes/listaClientes.php'; //tiene el codigo de la tabla que se va a mostrar
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

            $this->modeloClientes->__SET('cedula', $_POST['txtCedula']);
            $this->modeloClientes->__SET('nombre', $_POST['txtNombre']);
            $this->modeloClientes->__SET('apellido', $_POST['txtApellido']);
            $this->modeloClientes->__SET('telefono', $_POST['txtTelefono']);
            $this->modeloClientes->__SET('direccion', $_POST['txtDireccion']);
            $this->modeloClientes->__SET('correo', $_POST['txtCorreo']);
            $this->modeloClientes->__SET('estado_civil', $_POST['txtEstadoCivil']);
            $this->modeloClientes->__SET('status', $_POST['selEstado']);

            $respuesta = $this->modeloClientes->crearCliente();

            if($respuesta == true){
                header('location: ' . URL . 'clientes');
                exit();
            }else{
                echo "No se pudo guardar";
            }

        }
        
        $page_title = "Crear cliente"; //Titulo de la pestaña
        $open_menu = "gestionCreditos"; //Es para menu de flechas
        $opt_menu = 'listaClientes'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/clientes/crearCliente.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 

    }

    function editar(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        if(isset($_POST['btnGuardar'])){ //si la variable esta inicializada o existe = hacer:

            if (isset($_GET['id']) && $_GET['id'] > 0 ){

                $this->modeloClientes->__SET('id_cliente', $_GET['id']);

                $this->modeloClientes->__SET('cedula', $_POST['txtCedula']);
                $this->modeloClientes->__SET('nombre', $_POST['txtNombre']);
                $this->modeloClientes->__SET('apellido', $_POST['txtApellido']);
                $this->modeloClientes->__SET('telefono', $_POST['txtTelefono']);
                $this->modeloClientes->__SET('direccion', $_POST['txtDireccion']);
                $this->modeloClientes->__SET('correo', $_POST['txtCorreo']);
                $this->modeloClientes->__SET('estado_civil', $_POST['txtEstadoCivil']);
                $this->modeloClientes->__SET('status', $_POST['selEstado']);

                $respuesta = $this->modeloClientes->actualizarCliente();

                if($respuesta){
                    header('location: ' . URL . 'clientes'); // A donde redireccionar
                }else{
                    echo "No se pudo guardar";
                }
        
            }else{
                header("Location: ".URL."clientes"); // A donde redireccionar 
                exit();
            }  
        }  

        if (isset($_GET['id']) && $_GET['id'] == 0) {
            header("Location: ".URL."clientes"); // A donde redireccionar 
            exit();
        }

        if (isset($_GET['id']) && $_GET['id'] > 0 ){

            $this->modeloClientes->__SET('id_cliente', $_GET['id']);
            $respuesta = $this->modeloClientes->infoCliente();
        
            if (isset($respuesta) && $respuesta != '' ) {

                $page_title = "Editar cllientes"; //Titulo de la pestaña
                $open_menu = "gestionCreditos"; //Es para menu de flechas
                $opt_menu = 'listaClientes'; //acitva el link del menu, se pone azul
                require APP . 'view/_templates/header.php'; //carga el header en view
                require APP . 'view/clientes/editarCliente.php'; //tiene el codigo de la tabla que se va a mostrar
                require APP . 'view/_templates/footer.php';

            }else{
                header("Location: ".URL."clientes"); // A donde redireccionar 
                exit();
            }

        }else{
            header("Location: ".URL."clientes"); // A donde redireccionar 
            exit();
        }

    }

}

?>