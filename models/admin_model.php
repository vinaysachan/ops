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
     
}
