<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: ../login');
            exit;
        }

        $this->view->js = array('views/dashboard/js/default.js');
    }

    function index() {
        $this->view->render('dashboard/index');
    }

    function logout() {
        Session::destroy();
        header('location: ../login');
        exit;
    }

    function xhrInsert() {
        $this->model->xhrInsert();
    }

    function xhrGetListing() {
        $this->model->xhrGetListing();
    }

    function xhrDeleteListing() {
        $this->model->xhrDeleteListing();
    }

}
