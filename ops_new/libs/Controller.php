<?php

class Controller {

    public $__layout = 'layout_default';

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

}
