<?php

class Admin_ajax extends Controller {

    function xhrGetblogCatListings() {
	$this->model->xhrGetblogCatListings();
	exit();
    }

    function xhrDelblogCatListing() {
	if ($this->model->xhrDelblogCatListing()) {
	    echo json_encode('Del');
	} else {
	    echo json_encode('NoDel');
	}
    }

    function xhrGetblogCatList() {
	$this->model->xhrGetblogCatList();
	exit();
    }

    function xhrAddblogCat() {
	$msg = $this->model->xhrAddblogCat();
	echo json_encode($msg);
	exit();
    }
    
    function xhrGetQuestionCatListings() {
	$this->model->xhrGetQuestionCatListings();
	exit();
    }
    
    function xhrDelQuestionCatListing() {
	if ($this->model->xhrDelQuestionCatListing()) {
	    echo json_encode('Del');
	} else {
	    echo json_encode('NoDel');
	}
    }
    
    function xhrGetQuestionCatList() {
	$this->model->xhrGetQuestionCatList();
	exit();
    }
    
    function xhrAddQuestionCat() {
	$msg = $this->model->xhrAddQuestionCat();
	echo json_encode($msg);
	exit();
    }
}

//