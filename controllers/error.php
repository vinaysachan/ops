<?php

class Error extends Controller {

    public $__layout = 'error_layout';

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->msg = 'This page doesnt exist';
        $this->view->render('scripts/error/index');
    }

}
