<?php

class Index extends Controller {

    public $__layout = 'frontPage_layout';

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
            'public/js/jquery-2.1.1.min.js',
            'public/js/jquery-ui.min.js',
            'public/bootstrap-3.2.0/js/bootstrap.min.js',
            'public/js/custom.js'
        );
    }

    function index() {
        $this->view->title = 'Learn PHP Tutorial with PHP Jobs, Tutorial of MYSQL, MYSQLi, Ajax, JavaScript, Wordpess, Joomla, Zend, CodeIgniter | '.SITENAME;        
        $this->view->metaTags = [
            ['charset'=> 'utf-8'],
            ['http-equiv'=> 'Content-Type','content' => 'text/html;charset=utf-8'],
            ['http-equiv'=> 'X-UA-Compatible','content' => 'IE=edge'],
            ['name'=> 'author','content' => 'Vinay Sachan'],
            ['name'=> 'description','content' => 'Online PHP Study is an Online tutorial for Learn PHP, MYSQL, MYSQLi, Ajax, java-script, CMS Like WordPress, Drupal and Joomla, Framework Like Yii, CodeIgniter, Zend and Cake-PHP and more related to PHP Study with PHP Jobs.'],
            ['name'=> 'Keywords','content' => 'PHP Tutorial, Learn PHP, PHP Jobs, PHP Study Guide, Complete Reference of PHP, Object Oriented PHP, Advanced PHP Tutorial,Study php online, PHP Programming, MySQL Tutorial, Learn web development with PHP, html tutorial, CSS tutorial, JavaScript tutorial, Ajax tutorial, WordPress tutorial'],
            ['name'=> 'viewport','content' => 'width=device-width, initial-scale=1.0'],
            ['name'=> 'robots','content' => 'index,follow'],
	    	['name'=> 'alexaVerifyID','content' => 'uhLLcAmPD-rHAWR4z2X1xkp9JYk'],
        ];
          
         
        
        $this->view->render('scripts/index/index');
    }

}
