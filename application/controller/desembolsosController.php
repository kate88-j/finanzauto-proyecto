<?php

class desembolsosController extends Controller {

    private $modeloDesembolsos;

    function __construct(){ //carga el modelo
        $this->modeloDesembolsos = $this->loadModel("desembolsosModel"); //dice que modelo se utiliza
        
        $this->modeloVerificacion = $this->loadModel("verificacionModel"); 
        $this->modeloCreditos = $this->loadModel("creditosModel"); 
        
    }

    // TODO - marcasController - index
    function index(){

        if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 3) {
            //Permite ver esta ubicación al usuario
        }else{
            header("Location: ".URL.""); // A donde redireccionar 
            exit();
        }

        //logica
        $tabla = $this->modeloDesembolsos->listarDesembolsos();//recibe datos del modelo
        //var_dump($tabla); exit(); // es como el print_r

        $page_title = "Lista de desembolsos"; //Titulo de la pestaña
        $open_menu = ""; //Es para menu de flechas
        $opt_menu = 'listaDesembolsos'; //acitva el link del menu, se pone azul
        require APP . 'view/_templates/header.php'; //carga el header en view
        require APP . 'view/desembolsos/listaDesembolsos.php'; //tiene el codigo de la tabla que se va a mostrar
        require APP . 'view/_templates/footer.php'; 
    }

}

?>