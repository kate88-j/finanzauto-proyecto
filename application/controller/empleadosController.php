<?php

class empleadosController extends Controller {

    private $modeloEmpleados;
    private $modeloAreasEmpresa;

    function __construct(){ //carga el modelo
        $this->modeloEmpleados = $this->loadModel("empleadosModel"); //dice que modelo se utiliza
        $this->modeloAreasEmpresa = $this->loadModel("areas_empresaModel");
    }

    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloEmpleados->listarEmpleados();//recibe datos del modelo

        $page_title = "Lista de empleados"; //Titulo de la pestaña
        $open_menu = "finanzautoSA"; //Es para menu de flechas
        $opt_menu = 'listaEmpleados'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/empleados/listaEmpleados.php'; //tiene el codigo de la tabla que se va a mostrar
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

            $this->modeloEmpleados->__SET('cedula', $_POST['txtCedula']);
            $this->modeloEmpleados->__SET('nombre', $_POST['txtNombre']);
            $this->modeloEmpleados->__SET('apellido', $_POST['txtApellido']);
            $this->modeloEmpleados->__SET('telefono', $_POST['txtTelefono']);
            $this->modeloEmpleados->__SET('direccion', $_POST['txtDireccion']);
            $this->modeloEmpleados->__SET('email', $_POST['txtCorreo']);
            $this->modeloEmpleados->__SET('username', $_POST['txtUssername']);
            $this->modeloEmpleados->__SET('password', $_POST['txtPassword']);
            $this->modeloEmpleados->__SET('status', $_POST['selEstado']);
            $this->modeloEmpleados->__SET('area_empresa_id', $_POST['selAreaEmpresa']);

            $respuesta = $this->modeloEmpleados->crearEmpleado();

            if($respuesta){
                header('location: ' . URL . 'empleados');
            }else{
                echo "No se pudo guardar";
            }

        }

        $listaAreasEmpresa = $this->modeloAreasEmpresa->listarAreasEmpresa();
        
        $page_title = "Crear empleado"; //Titulo de la pestaña
        $open_menu = "finanzautoSA"; //Es para menu de flechas
        $opt_menu = 'listaEmpleados'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/empleados/crearEmpleado.php'; //tiene el codigo de la tabla que se va a mostrar
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

            $this->modeloEmpleados->__SET('id_empleado', $_GET['id']);

            $this->modeloEmpleados->__SET('nombre', $_POST['txtNombre']);
            $this->modeloEmpleados->__SET('apellido', $_POST['txtApellido']);
            $this->modeloEmpleados->__SET('telefono', $_POST['txtTelefono']);
            $this->modeloEmpleados->__SET('direccion', $_POST['txtDireccion']);
            $this->modeloEmpleados->__SET('email', $_POST['txtCorreo']);
            $this->modeloEmpleados->__SET('username', $_POST['txtUssername']);
            $this->modeloEmpleados->__SET('status', $_POST['selEstado']);
            $this->modeloEmpleados->__SET('area_empresa_id', $_POST['selAreaEmpresa']);

            $respuesta = $this->modeloEmpleados->actualizarEmpleado();

            if($_POST['txtPassword'] != ""){
                $this->modeloEmpleados->__SET('password', $_POST['txtPassword']);
                $this->modeloEmpleados->actualizarPassword();
            }
            

            if($respuesta){
                header('location: ' . URL . 'empleados');
            }else{
                echo "No se pudo guardar";
            }

        }

        if (isset($_GET['id']) && $_GET['id'] == 0) {
            header("Location: ".URL."empleados"); // A donde redireccionar 
            exit();
        }

        if (isset($_GET['id']) && $_GET['id'] > 0 ){

            $this->modeloEmpleados->__SET('id_empleado', $_GET['id']);
            $respuesta = $this->modeloEmpleados->infoEmpleado();

            if ( isset($respuesta) && $respuesta != '' ) { // Si la consulta trajo un registro

                $listaAreasEmpresa = $this->modeloAreasEmpresa->listarAreasEmpresa();
                
                $page_title = "Editar Empleado"; //Titulo de la pestaña
                $open_menu = "finanzautoSA"; //Es para menu de flechas
                $opt_menu = 'listaEmpleados'; //acitva el link del menu, se pone azul
                require APP . 'view/_templates/header.php'; //carga el header en view
                require APP . 'view/empleados/editarEmpleado.php'; //tiene el codigo de la tabla que se va a mostrar
                require APP . 'view/_templates/footer.php';

            } else { // Sino trajo nada
                //echo 'El registro no existe';

                header("Location: ".URL."empleados"); // A donde redireccionar 
                exit();
            }

        } else {
            header("Location: ".URL."empleados"); // A donde redireccionar 
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
            header("Location: ".URL."empleados"); // A donde redireccionar 
            exit();
        }

        if (isset($_GET['id']) && $_GET['id'] > 0 ){

            $this->modeloEmpleados->__SET('id_empleado', $_GET['id']);

            $respuesta = $this->modeloEmpleados->eliminarEmpleado(); // Cambiar status a 0

            if ($respuesta) {
                header("Location: ".URL."empleados"); // A donde redireccionar 
                exit();
            } else {
                echo 'El registro no existe';
            }

        } else {
            header("Location: ".URL."empleados"); // A donde redireccionar 
            exit();
        }
    }

}

?>