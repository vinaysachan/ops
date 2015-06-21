<?php

class Admin_ajax_model extends Model {

    function __construct() {
	parent::__construct();
    }

    public function xhrGetblogCatListings() {
	$whereCon = [];
	$sql = 'SELECT id,name,link FROM blog_category ORDER BY name ASC';
	echo json_encode($this->db->select($sql, $whereCon));
    }

    public function xhrGetblogCatList() {
	$whereCon = ['id' => (int) $_REQUEST['id']];
	$sql = 'SELECT id,name,link FROM blog_category WHERE id = :id LIMIT 1';
	echo json_encode($this->db->select($sql, $whereCon));
    }

    public function xhrDelblogCatListing() {
	$id = (int) $_POST['id'];
	$whereCon = ['id' => $id];
	$sql = 'select count(id) as num from blog WHERE blog_cat = :id';
	$count = $this->db->select($sql, $whereCon);
	if ($count[0]['num'] == 0) {
	    $this->db->delete('blog_category', "id = '$id'", 1);
	    return 'Del';
	} else if ($count[0]['num'] > 0) {
	    return 'blogExist';
	}
	return 'NoDel';
    }

    public function xhrAddblogCat() {
	$id = (int) $_POST['id'];
	$name = $_POST['name'];
	$link = $_POST['link'];
	$data = array('name' => $name, 'link' => $link, 'date_created' => date("Y-m-d H:i:s"));
	if (empty($id)) {
	    $this->db->insert('blog_category', $data);
	    return 'added';
	} else {
	    $this->db->update('blog_category', $data, "`id` = {$id}");
	    return 'updated';
	}
	return FALSE;
    }

    public function xhrGetQuestionCatListings() {
	$whereCon = [];
	$sql = 'SELECT id,name,link FROM question_category ORDER BY name ASC';
	echo json_encode($this->db->select($sql, $whereCon));
    }

    public function xhrDelQuestionCatListing() {
	$id = (int) $_POST['id'];
	$whereCon = ['id' => $id];
	$sql = 'select count(id) as num from questions WHERE question_category_id = :id';
	$count = $this->db->select($sql, $whereCon);
	if ($count[0]['num'] == 0) {
	    $this->db->delete('question_category', "id = '$id'", 1);
	    return 'Del';
	} else if ($count[0]['num'] > 0) {
	    return 'quesExist';
	}
	return 'NoDel';
    }

    public function xhrGetQuestionCatList() {
	$whereCon = ['id' => (int) $_REQUEST['id']];
	$sql = 'SELECT id,name,link FROM question_category WHERE id = :id LIMIT 1';
	echo json_encode($this->db->select($sql, $whereCon));
    }

    public function xhrAddQuestionCat() {
	$id = (int) $_POST['id'];
	$name = $_POST['name'];
	$link = $_POST['link'];
	$data = array('name' => $name, 'link' => $link, 'date_created' => date("Y-m-d H:i:s"));
	if (empty($id)) {
	    $this->db->insert('question_category', $data);
	    return 'added';
	} else {
	    $this->db->update('question_category', $data, "`id` = {$id}");
	    return 'updated';
	}
	return FALSE;
    }

}
