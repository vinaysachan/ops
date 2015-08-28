<?php

class Error extends Controller {

    public $__layout = 'error_layout';

    function __construct() {
	parent::__construct();
	$this->view->css = array(
	    'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600',
	    'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700',
	    'public/bootstrap-3.2.0/css/bootstrap.min.css',
	    'public/font-awesome/css/font-awesome.min.css',
	    'public/css/main.css',
	    'public/css/blog.css'
	);
	$this->view->js = array(
	    'public/js/jquery-2.1.1.min.js',
	    'public/js/jquery-ui.min.js',
	    'public/bootstrap-3.2.0/js/bootstrap.min.js',
	    'public/js/custom.js'
	);
    }

    function index() {
	$this->view->title = '404 - Not Found :: ' . SITENAME;
	$this->view->metaTags = [
	    ['charset' => 'utf-8'],
	    ['http-equiv' => 'Content-Type', 'content' => 'text/html;charset=utf-8'],
	    ['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge'],
	    ['name' => 'author', 'content' => 'Vinay Sachan'],
	    ['name' => 'description', 'content' => SITENAME . " : 404 Page Not Found"],
	    ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'],
	    ['name' => 'robots', 'content' => 'noindex, nofollow'],
	];
	//====> Manage Page Navigation
	$this->view->breadcrumb = [
	    ['link' => URL, 'title' => SITENAME, 'name' => 'Home'],
	    ['link' => '', 'title' => '404 - Not Found :: ' . SITENAME, 'name' => '404 - Not Found :: ' . SITENAME]
	];
	$this->view->heading1 = '404 - Sorry Page not found';
	$this->view->heading41 = 'Blog Categories';
	//====> Get the Blogs List With Pagination Library
	$this->loadOtherModel('blog');
	//====> Get Blog CatList
	$this->view->catList = $this->model->getblogCatLists();
	$this->view->active_cat = '';
	//====> get Most Popular Posts
	$this->view->popularBlogs = $this->model->getPopularBlogs();

	$this->view->msg = 'This page doesnt exist';
	$this->view->render('scripts/error/page404');
    }

    function page404() {
	$this->view->title = '404 - Not Found :: ' . SITENAME;
	$this->view->metaTags = [
	    ['charset' => 'utf-8'],
	    ['http-equiv' => 'Content-Type', 'content' => 'text/html;charset=utf-8'],
	    ['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge'],
	    ['name' => 'author', 'content' => 'Vinay Sachan'],
	    ['name' => 'description', 'content' => SITENAME . " : 404 Page Not Found"],
	    ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'],
	    ['name' => 'robots', 'content' => 'noindex, nofollow'],
	];
	//====> Manage Page Navigation
	$this->view->breadcrumb = [
	    ['link' => URL, 'title' => SITENAME, 'name' => 'Home'],
	    ['link' => '', 'title' => '404 - Not Found :: ' . SITENAME, 'name' => '404 - Not Found :: ' . SITENAME]
	];
	$this->view->heading1 = '404 - Sorry Page not found';
	$this->view->heading41 = 'Blog Categories';
	//====> Get the Blogs List With Pagination Library
	$this->loadOtherModel('blog');
	//====> Get Blog CatList
	$this->view->catList = $this->model->getblogCatLists();
	$this->view->active_cat = '';
	//====> get Most Popular Posts
	$this->view->popularBlogs = $this->model->getPopularBlogs();

	$this->view->msg = 'This page doesnt exist';
	$this->view->render('scripts/error/page404');
    }

}
