<?php

class Controller {

    public $__layout = 'default';

    function __construct() {
	//echo 'Main controller<br />';
	$this->view = new View();
	$this->view->layout = $this->__layout;
    }

    /**
     * 
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modelPath = 'models/') {

	$path = $modelPath . $name . '_model.php';

	if (file_exists($path)) {
	    require $path;
	    $modelName = $name . '_Model';
	    $this->model = new $modelName();
	}
    }
    
    /**
     * 
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadOtherModel($name, $modelPath = 'models/') {
	$path = $modelPath . $name . '_model.php';
	if (file_exists($path)) {
	    require $path;
	    $modelName = $name . '_Model';
	    $this->model = new $modelName();
	}
    }

    public function loadLibrary($name, $librarypath = 'library/') {
	$path = $librarypath . $name . '.php';
	if (file_exists($path)) {
	    require $path;
	    $name = rtrim($name, '/');
	    $name = filter_var($name, FILTER_SANITIZE_URL);
	    $nameArr = explode('/', $name);
	    $libraryName = end($nameArr);
	    $this->library = new $libraryName();
	}
    }

}
