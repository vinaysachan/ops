<?php

class Php extends Controller {

    public $__layout = 'php_layout';

    function __construct() {
        parent::__construct();
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
        $this->view->hactive = 'php';
    }

    function index() {
        $this->view->title = SITENAME . ' : First Page'; //Change this In future 
        $this->view->metaTags = [
            ['charset' => 'utf-8'],
            ['http-equiv' => 'Content-Type', 'content' => 'text/html;charset=utf-8'],
            ['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge'],
            ['name' => 'author', 'content' => 'Vinay Sachan'],
            ['name' => 'description', 'content' => 'put your page description here'],
            ['name' => 'Keywords', 'content' => 'put your page Keywords here'],
            ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'],
            ['name' => 'robots', 'content' => 'index,follow'],
        ];
        $this->view->render('scripts/php/index');
    }

    function basic_php($param = NULL) {
        $url = ($param == NULL) ? 'php/basic_php' : 'php/basic_php/' . $param;
        $this->view->active = $url;
        
        $params['parent_page'] = BASIC_PHP;
        $params['site_path'] = ($param == NULL) ? FRONT_PAGE : $param;
        $contentData = $this->model->getPageContent($params);
        $this->view->heading = $contentData[0]['page_heading'];
        
        $this->view->pageContent = $contentData;
        
        $this->view->allLeftLinks = Navigation::basicPHPLeftMenu();

        $this->view->render('scripts/php/basic_php');
    }
    
    
//    

    function advance_php($param = NULL) {
        $url = ($param == NULL) ? 'php/'.ADVANCE_PHP : 'php/'.ADVANCE_PHP.'/' . $param;
        $this->view->active = $url;
        
        $params['parent_page'] = ADVANCE_PHP;
        $params['site_path'] = ($param == NULL) ? FRONT_PAGE : $param;
        $contentData = $this->model->getPageContent($params);
        $this->view->heading = $contentData[0]['page_heading'];
        
        $this->view->pageContent = $contentData;
        
        $this->view->allLeftLinks = Navigation::advancePHPLeftMenu();

        $this->view->render('scripts/php/basic_php');
    }
}
