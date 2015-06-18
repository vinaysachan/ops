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

}
