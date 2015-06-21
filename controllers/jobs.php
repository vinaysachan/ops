<?php

class Jobs extends Controller {

    public $__layout = 'jobs_layout';

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
	    'public/js/custom.js',
	    'public/js/jquery-2.1.1.min.js',
	    'public/js/jquery-ui.min.js',
	    'public/bootstrap-3.2.0/js/bootstrap.min.js',
	    'public/js/custom.js'
	);
	$this->view->hactive = 'jobs';
    }

    function interview_question_answer($param1 = NULL, $param2 = NULL) {
	$this->view->layout = 'interview_layout';
	$this->view->title = SITENAME . ' : Interview Question Answer';
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

	//====> Question categories :-
	$this->view->heading41 = 'Interview Question Categories';
	$this->view->catList = $this->model->getQuesCatLists();
	$this->view->catURL = URL . 'jobs/interview_question_answer/cat/';
	if ((!empty($param1)) && ($param1) && (!empty($param2)) && ($param2)) {
	    $this->view->catlink = $cat = $param2;
	} else {
	    $this->view->catlink = $cat = FALSE;
	}

	//====> Load Pagination Library
	$this->loadLibrary('pagination');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0)
	    $page = 1;
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	 
	//====> Question List with Answer
	$statement = $this->model->getQuestStatement($cat);
	$data = $this->model->getQuesLists($statement, $cat, $startpoint, $per_page);
	if (count($data) == 0) {
	    $statement = $this->model->getQuestStatement($cat = FALSE);
	    $this->view->quesLists = $this->model->getQuesLists($statement, $cat = FALSE, $startpoint, $per_page);
	} else {
	    $this->view->quesLists = $data;
	}
	//====> retun total number
	$total = $this->model->getTotalCount($statement, $cat);
	$this->view->pagination = $this->library->pagging($total, $per_page, $page, $url = '?');
	$this->view->render('scripts/jobs/interview_question_answer');
    }

}
