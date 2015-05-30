<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->render('scripts/index/index');
    }
    
    function details() {
        $this->view->render('scripts/index/index');
    }
    
}