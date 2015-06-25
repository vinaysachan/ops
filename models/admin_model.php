<?php

class Admin_model extends Model {

    function __construct() {
	parent::__construct();
    }

    public function adminloginrun() {
	$password = Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY);
	$whereCon = ['username' => $_POST['username'],
	    'password' => $password,
	    'active' => FLAG_Y,
	    'role' => ROLE_ADMIN
	];
	return $this->db->select('SELECT * FROM users WHERE username = :username AND password = :password AND active = :active  AND role = :role', $whereCon);
    }

    public function getContenLists() {
	$whereCon = [];
	$sql = 'SELECT p.name AS parent_name,c.id,c.site_path,c.page_heading,c.active FROM  page_content AS c LEFT JOIN page_content_parent AS p ON p.id = c.parent';
	return $this->db->select($sql, $whereCon);
    }

    public function getPageLists() {
	$whereCon = [];
	$sql = 'SELECT p.id, p.name FROM page_content_parent AS p ORDER BY id ASC';
	return $this->db->select($sql, $whereCon);
    }

    public function contentInsert($data) {
	$this->db->insert('page_content', $data);
    }

    public function contentUpdate($data, $id) {
	$this->db->update('page_content', $data, "`id` = {$id}");
    }

    public function getContenData($id) {
	$whereCon = [ 'id' => $id];
	$sql = 'SELECT '
		. 'p.name AS parent_name,p.id AS parent_id,'
		. 'c.id,c.site_path,c.page_heading,c.active,c.content '
		. 'FROM  page_content AS c LEFT JOIN '
		. 'page_content_parent AS p ON p.id = c.parent '
		. 'WHERE c.id = :id';
	return $this->db->select($sql, $whereCon);
    }

    public function getblogCatLists() {
	$whereCon = [];
	$sql = 'SELECT id, name FROM blog_category ORDER BY name ASC';
	return $this->db->select($sql, $whereCon);
    }

    public function getblogUsersLists() {
	$whereCon = [
	    'role' => ROLE_BLOG
	];
	$sql = 'SELECT id, name FROM users WHERE role=:role ORDER BY name ASC';
	return $this->db->select($sql, $whereCon);
    }

    public function blogInsert($data) {
	$this->db->insert('blog', $data);
    }

    public function getBlogData($id) {
	$whereCon = [ 'id' => $id];
	$sql = 'SELECT * FROM blog WHERE id = :id';
	return $this->db->select($sql, $whereCon);
    }

    public function blogUpdate($data, $id) {
	$this->db->update('blog', $data, "`id` = {$id}");
    }

    public function getblogLists() {
	$whereCon = [];
	$sql = 'SELECT b.id,b.name,b.active,bc.name AS blog_cat,u.name AS writer '
		. 'FROM blog AS b LEFT JOIN blog_category AS bc ON bc.id = b.blog_cat '
		. 'LEFT JOIN users AS u ON u.id = b.writer AND u.role ="' . ROLE_BLOG . '" ';
	return $this->db->select($sql, $whereCon);
    }

    public function getQuesCatLists() {
	$whereCon = [];
	$sql = 'SELECT id, name FROM question_category ORDER BY name ASC';
	return $this->db->select($sql, $whereCon);
    }

    public function getQuestionData($id) {
	$whereCon = [ 'id' => $id];
	$sql = 'SELECT * FROM questions WHERE id = :id';
	return $this->db->select($sql, $whereCon);
    }

    public function questionInsert($data) {
	$this->db->insert('questions', $data);
	return $this->db->getlastInsertId();
    }

    public function questionUpdate($data, $id) {
	$this->db->update('questions', $data, "`id` = {$id}");
    }

    public function getQuestionsList() {
	$whereCon = [];
	$sql = 'SELECT q.id,q.question,q.level,q.active,c.name AS ques_cat FROM questions AS q LEFT JOIN question_category AS c ON c.id = q.question_category_id';
	return $this->db->select($sql, $whereCon);
    }

    public function getQuesAnsData($id) {
	$whereCon = [':id' => $id];
	$sql = 'SELECT '
		. 'q.id,q.question,q.level,q.active,'
		. 'a.id AS answer_id,a.answer,a.active AS answer_active, c.name AS cat_name '
		. 'FROM questions AS q LEFT JOIN questions_answer AS a ON q.id=a.questions_id '
		. 'LEFT JOIN question_category AS c ON c.id= q.question_category_id WHERE q.id = :id';
	return $this->db->select($sql, $whereCon);
    }

    public function quesAnsInsert($data) {
	$this->db->insert('questions_answer', $data);
    }

    public function quesAnsUpdate($data, $id) {
	$this->db->update('questions_answer', $data, "`id` = {$id}");
    }

    public function getifscData($statement, $startpoint, $per_page) {
	$whereCon = [];
	$sql = "SELECT ifsc_code,bank_name FROM {$statement} LIMIT {$startpoint} , {$per_page}";
	return $this->db->select($sql, $whereCon);
    }

    public function getTotalCount($statement) {
	$whereCon = [];
	$sql = "SELECT COUNT(*) as num FROM {$statement}";
	return $this->db->select($sql,$whereCon); 
    }
    
    public function galleryInsert($data) {
	$this->db->insert('gallery', $data);
    }
    
    public function getGalleryList() {
	$whereCon = [];
	$sql = "SELECT * FROM gallery";
	return $this->db->select($sql,$whereCon); 
    }
}
