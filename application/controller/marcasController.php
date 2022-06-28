<?php

class marcasController extends Controller {

    private $modeloMarcas;

    function __construct(){ //carga el modelo
        $this->modeloMarcas = $this->loadModel("marcasModel"); //dice que modelo se utiliza
    }

    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloMarcas->listarMarcas();//recibe datos del modelo

        $page_title = "Lista de marcas"; //Titulo de la pestaña
        $open_menu = "inventario"; //Es para menu de flechas
        $opt_menu = 'listaMarcas'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/marcas/listaMarcas.php'; //tiene el codigo de la tabla que se va a mostrar
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

            $this->modeloMarcas->__SET('nombre', $_POST['txtNombre']);
            $this->modeloMarcas->__SET('descripcion', $_POST['txtDescripcion']);

            $respuesta = $this->modeloMarcas->crearMarca();

            if($respuesta == true){
                header('location: ' . URL . 'marcas'); // A donde redireccionar 
                exit();
            }else{
                echo "No se pudo guardar";
            }

        }
        
        $page_title = "Crear marca"; //Titulo de la pestaña
        $open_menu = "inventario"; //Es para menu de flechas
        $opt_menu = 'listaMarcas'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/marcas/crearMarca.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 

    }

}

?>