<?php

class Admin extends Controller {

    public $__layout = 'layout_admin';

    function __construct($param = NULL) {
        parent::__construct();
    }

    function index($param = NULL) {
        $this->view->layout = 'layout_note';
        $this->view->render('scripts/php/index');
    }
    
    function login ($param = NULL) {
        $this->view->layout = 'layout_adminlogin';
        $this->view->render('scripts/admin/login');
    }
    
    

}
