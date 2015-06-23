<?php

class Ajax extends Controller {

    function xhrSignUpNewsletter() {
	echo json_encode($this->model->xhrSignUpNewsletter());
	exit();
    }
 

}
 