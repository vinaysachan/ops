<?php

class php extends Controller {

    public $__layout = 'layout_default';

    function __construct($param = NULL) {
        parent::__construct();
    }

    function index($param = NULL) {
        $this->view->layout = 'layout_note';
        $this->view->render('scripts/php/index');
    }

    function basic_php($param = NULL) {
        $param = ($param == NULL) ? 'front_page' : $param;
        $contentData = $this->model->getPageContent($param);
        if (count($contentData) == 0) {
            $this->view->msg = '<h2>This page doesn\'t exist!</h2>';
            $this->view->render('scripts/error/index');
        } else {
            $this->view->pageContent = $contentData;
            $this->view->render('scripts/php/basic_php');
        }
    }

}
