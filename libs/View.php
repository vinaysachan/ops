<?php

class View {

    private $__viewpage = null;

    function __construct() {
        //echo 'this is the view';
    }
            
    public function render($name, $noInclude = false) {
        if ($noInclude == TRUE) {
            require 'views/' . $name . '.php';
        } else {
            $__viewpage = $name;
            require 'views/layouts/' . $this->layout . '.php';
        }
    }

    public function menuCreator($data, $menuType) {
        switch ($menuType) {
            case $menuType:
                Util::$menuType($data);
                break;
            default:
                Util::defaultMenu($data);
                break;
        }
    }

}
