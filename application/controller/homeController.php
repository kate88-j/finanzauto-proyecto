<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class homeController extends Controller
{

    private $modeloHome;

    function __construct(){//carga el modelo
        $this->modeloHome = $this->loadModel("homeModel");//dice que modelo se utiliza
    }

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {

        //$ventas = $this->modeloHome->cantidadVentas();
        //$intercambios = $this->modeloHome->cantidadIntercambios();

        // load views
        $page_title = "Inicio";
        $open_menu = "";
        $opt_menu = 'Dashboard';
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
