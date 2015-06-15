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
	$this->model->xhrAddblogCat();
	exit();
    }

}

//