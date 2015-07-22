<?php

class Ajax extends Controller {

    function xhrSignUpNewsletter() {
	echo json_encode($this->model->xhrSignUpNewsletter());
	exit();
    }

    function xhrtestCategories() {
	echo json_encode($this->model->xhrtestCategories());
	exit();
    }

    function xhrStarttest() {
	$this->model->xhrStarttest();
	print_r($_POST);
    }

}
