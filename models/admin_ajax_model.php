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
	$data = array('name' => $name, 'link' => $link);
	if (empty($id)) {
	    $data['date_created'] = date("Y-m-d H:i:s");
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
	$data = array('name' => $name, 'link' => $link);
	if (empty($id)) {
	    $data['date_created'] = date("Y-m-d H:i:s");
	    $this->db->insert('question_category', $data);
	    return 'added';
	} else {
	    $this->db->update('question_category', $data, "`id` = {$id}");
	    return 'updated';
	}
	return FALSE;
    }

    public function xhrGettestCatListings() {
	$whereCon = [];
	$sql = 'SELECT id,cat_name, list_order,logo FROM test_category ORDER BY list_order ASC,cat_name ASC ';
	echo json_encode($this->db->select($sql, $whereCon));
    }

    public function xhrDeltestCatListing() {
	$id = (int) $_POST['id'];
	$whereCon = ['id' => $id];
	$sql = 'select count(id) as num from test_ques WHERE cat_id = :id';
	$count = $this->db->select($sql, $whereCon);
	if ($count[0]['num'] == 0) {
	    $this->db->delete('test_category', "id = '$id'", 1);
	    return 'Del';
	} else if ($count[0]['num'] > 0) {
	    return 'quesExist';
	}
	return 'NoDel';
    }

    public function xhrGettestCatList() {
	$whereCon = ['id' => (int) $_REQUEST['id']];
	$sql = 'SELECT id,cat_name, list_order,logo FROM test_category WHERE id = :id LIMIT 1';
	echo json_encode($this->db->select($sql, $whereCon));
    }

    public function xhrAddtestCat() {
	$id = (int) $_POST['id'];
	$cat_name = $_POST['cat_name'];
	$logo = $_POST['logo'];
	$list_order = (int) $_POST['list_order'];
	$data = array('cat_name' => $cat_name, 'logo' => $logo, 'list_order' => $list_order);
	if (empty($id)) {
	    $data['date_created'] = date("Y-m-d H:i:s");
	    $this->db->insert('test_category', $data);
	    return 'added';
	} else {
	    $this->db->update('test_category', $data, "`id` = {$id}");
	    return 'updated';
	}
	return FALSE;
    }

}
