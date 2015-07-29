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
        $category = $_POST['category'];
        $cat = $_POST['cat']; 
        foreach ($cat as $value) {
            $cat_level[$value] = $category[$value]; 
        }
        $post['cat_level'] = $cat_level ;
        $post['sname'] = $_POST['sname'] ;
        $post['semail'] = $_POST['semail'] ; 
	$this->model->xhrStarttest($post); 
    }

}
