<?php

class Admin extends Controller {

    public $__layout = 'admin_layout';

    function __construct($param = NULL) {
        parent::__construct();
        Util::handleAdminLogin();
        $this->view->css = array(
            'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600',
            'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700',
            'public/bootstrap-3.2.0/css/bootstrap.css',
            'public/font-awesome/css/font-awesome.min.css',
            'public/css/main.css'
        );
        $this->view->js = array(
            'public/js/custom.js',
            'public/js/jquery-2.1.1.min.js',
            'public/js/jquery-ui.min.js',
            'public/bootstrap-3.2.0/js/bootstrap.min.js',
            'public/js/custom.js'
        );
        $this->view->metaTags = [
            ['charset' => 'utf-8'],
            ['http-equiv' => 'Content-Type', 'content' => 'text/html;charset=utf-8'],
            ['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge'],
            ['name' => 'author', 'content' => 'Vinay Sachan'],
            ['name' => 'description', 'content' => 'put your page description here'],
            ['name' => 'Keywords', 'content' => 'put your page Keywords here'],
            ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'],
            ['name' => 'robots', 'content' => 'noindex, nofollow'],
        ];
    }

    function index() {
        $this->view->active = 'admin';
        $this->view->render('scripts/admin/index');
    }

    public function alexagraph($param = NULL) {
        $this->view->active = 'admin/alexagraph';
        $this->view->render('scripts/admin/alexagraph');
    }

    public function alexaadd($param = NULL) {
        $this->view->active = 'admin/alexaadd';
        $this->view->render('scripts/admin/alexaadd');
    }

    public function content($param = NULL) {
        $this->view->active = 'admin/content';
        $this->view->heading = $this->view->title = 'Manage Page Content';
        // ==> Add some more js files
        $this->view->js[] = 'public/dataTables/js/jquery.dataTables.min.js';
        $this->view->js[] = 'public/dataTables/Responsive/js/dataTables.responsive.min.js';
        // ==> Add some more css files
        $this->view->css[] = 'public/dataTables/css/jquery.dataTables.css';
        $this->view->css[] = 'public/dataTables/Responsive/css/dataTables.responsive.css';
        // ==> get All Page 
        $this->view->contentLists = $this->model->getContenLists();
        $this->view->render('scripts/admin/content');
    }

//    public function alexaaddaa($param = NULL) {
//        $this->view->active = 'admin/alexaaddaa';
//        $this->view->render('scripts/admin/alexaaddaa');
//    }
}
