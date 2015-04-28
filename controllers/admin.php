<?php

class Admin extends Controller {

    public $__layout = 'layout_admin';

    function __construct($param = NULL) {
        parent::__construct();
        Util::handleAdminLogin();
    }

    public function index($param = NULL) {
        $this->view->active = 'admin';
        $this->view->render('scripts/admin/index');
    }

    public function content($param = NULL) {
        $this->view->active = 'admin/content';
        $this->view->render('scripts/admin/content');
    }

    public function leftmenu($param = NULL) {
        $this->view->active = 'admin/leftmenu';
        $this->view->render('scripts/admin/leftmenu');
    }

    public function alexagraph($param = NULL) {
        $this->view->active = 'admin/alexagraph';
        $this->view->render('scripts/admin/alexagraph');
    }

    public function alexaadd($param = NULL) {
        $this->view->active = 'admin/alexaadd';
        $this->view->render('scripts/admin/alexaadd');
    }

}
