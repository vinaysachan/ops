<?php

class Blog extends Controller {

    public $__layout = 'blog_layout';

    function __construct() {
	parent::__construct();
	$this->view->css = array(
	    'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600',
	    'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700',
	    'public/bootstrap-3.2.0/css/bootstrap.css',
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
	$this->view->hactive = 'blog';
	$this->view->heading1 = 'Blogs';
	$this->view->heading41 = 'Blog Categories';
    }

    function index() {
	$this->view->title = SITENAME . ' : Blog Page'; //Change this In future 
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
	//====> Manage Page Navigation
	$this->view->breadcrumb = [
	    ['link' => URL, 'title' => SITENAME, 'name' => 'Home'],
	    ['link' => URL . 'blog', 'title' => SITENAME . ' : Blog', 'name' => 'Blog']
	];
	//====> Get Blog CatList
	$this->view->catList = $this->model->getblogCatLists();
	$this->view->active_cat = '';
	//====> Page Main Heading
	$this->view->heading1 = 'Blogs';
	//====> get Most Popular Posts
	$this->view->popularBlogs = $this->model->getPopularBlogs();

	//====> Get the Blogs List With Pagination Library
	$this->loadLibrary('pagination');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0)
	    $page = 1;
	$per_page = 1; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	//====> Question List with Answer
	$statement = $this->model->getBlogStatement();
	$this->view->blogList = $this->model->getBlogsList($statement, $catagery = NULL, $startpoint, $per_page);
	//====> retun total number
	$total = $this->model->getTotalCount($statement);
	$this->view->pagination = $this->library->pagging($total, $per_page, $page, $url = '?');



	$this->view->render('scripts/blog/index');
    }

    function cat($catagery) {
	$this->view->title = SITENAME . ' : Blog Page'; //Change this In future
	$this->view->active_cat = $catagery;
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
	//====> Get Blog CatList
	$this->view->catList = $this->model->getblogCatLists();
	//====> get Most Popular Posts
	$this->view->popularBlogs = $this->model->getPopularBlogs();

	//====> Get the Blogs List With Pagination Library
	$this->loadLibrary('pagination');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0)
	    $page = 1;
	$per_page = 1; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	//====> Question List with Answer
	$statement = $this->model->getBlogStatement($catagery);
	$this->view->blogList = $this->model->getBlogsList($statement, $catagery, $startpoint, $per_page);
	//====> retun total number
	$total = $this->model->getTotalCount($statement, $catagery);
	$this->view->pagination = $this->library->pagging($total, $per_page, $page, $url = '?');

	//====> Page Main Heading
	$this->view->heading1 = 'Blogs <small>' . $this->view->blogList[0]['cat_name'] . '</small>';
	//====> Manage Page Navigation
	$this->view->breadcrumb = [
	    ['link' => URL, 'title' => SITENAME, 'name' => 'Home'],
	    ['link' => URL . 'blog', 'title' => SITENAME . ' : Blog', 'name' => 'Blog'],
	    ['link' => '', 'title' => $this->view->blogList[0]['cat_name'], 'name' => $this->view->blogList[0]['cat_name']],
	];
	$this->view->render('scripts/blog/index');
    }

    function view($blogid) {
	$this->view->title = SITENAME . ' : Blog detail Page'; //Change this In future 
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
	//====> Get Blog CatList
	$this->view->catList = $this->model->getblogCatLists();
	$this->view->active_cat = '';
	$this->view->blogData = $this->model->getBlogdata($blogid);
	//====> get Most Popular Posts
	$this->view->popularBlogs = $this->model->getPopularBlogs();

	//====> Manage Page Navigation
	$this->view->breadcrumb = [
	    ['link' => URL, 'title' => SITENAME, 'name' => 'Home'],
	    ['link' => URL . 'blog', 'title' => SITENAME . ' : Blog', 'name' => 'Blog'],
	    ['link' => URL . 'blog/cat/'.$this->view->blogData[0]['link'], 'title' => $this->view->blogData[0]['cat_name'], 'name' => $this->view->blogData[0]['cat_name']]
	];
	$this->view->render('scripts/blog/view');
    }

}
