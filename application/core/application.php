<?php

class Application
{
    /** @var null The controller */
    private $url_controller = null;

    /** @var null The method (of the above controller), often also named "action" */
    private $url_action = null;

    /** @var array URL parameters */
    private $url_params = array();

    /**
     * "Start" the application:
     * Analyze the URL elements and calls the according controller/method or the fallback
     */
    public function __construct()
    {
        // create array with URL parts in $url
        $this->splitUrl();

        if ($this->url_controller != null) {
            /* https://stackoverflow.com/questions/35708461/php-variable-contains-string-and-replace */
            if (strpos($this->url_controller,'-') !== false) { //first we check if the url contains the string '-'
                $this->url_controller = str_replace('-', '_', $this->url_controller); //if yes, we simply replace it with '_'
            }
        }

        if ( !isset($_SESSION['id']) && $_GET['url'] != 'auth/login' ) {
            header("Location: " .URL. "auth/login");
        }

        // check for controller: no controller given ? then load start-page
        
        if (!$this->url_controller) {

            require APP . 'controller/homeController.php';
            $page = new homeController();
            $page->index();

            //require APP . 'controller/productoController.php';
            //$page = new productoController();
            //$page->index();

        } elseif (file_exists(APP . 'controller/' . $this->url_controller . 'Controller.php')) {
            // here we did check for controller: does such a controller exist ?

            // if so, then load this file and create this controller
            // example: if controller would be "car", then this line would translate into: $this->car = new car();
            require APP . 'controller/' . $this->url_controller . 'Controller.php';
            $controller_fullname = $this->url_controller . 'Controller';
            $this->url_controller = new $controller_fullname();

            // check for method: does such a method exist in the controller ?
            if ( isset($this->url_action) && method_exists($this->url_controller, $this->url_action)) {

                if (!empty($this->url_params)) {
                    // Call the method and pass arguments to it
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    // If no parameters are given, just call the method without parameters, like $this->home->method();
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                if ($this->url_action == null || strlen($this->url_action) == 0) {
                    // no action defined: call the default index() method of a selected controller
                    $this->url_controller->index();
                }
                else {
                    header('location: ' . URL . 'problem');
                }
            }
        } else {
            header('location: ' . URL . 'problem');
        }
    }

    /**
     * Get and split the URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Put URL parts into according properties
            // By the way, the syntax here is just a short form of if/else, called "Ternary Operators"
            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            $this->url_controller = isset($url[0]) ? $url[0] : null;

            $this->url_action = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->url_params = array_values($url);

            // for debugging. uncomment this if you have problems with the URL
            //echo 'Controller: ' . $this->url_controller . '<br>';
            //echo 'Action: ' . $this->url_action . '<br>';
            //echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
        }
    }
}
