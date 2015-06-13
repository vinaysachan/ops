<?php

class Admin_ajax_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function xhrGetblogCatListings() {
        $whereCon = [];
        $sql = 'SELECT id,name,link FROM blot_category ORDER BY name ASC';
        echo json_encode($this->db->select($sql, $whereCon));
    }

    public function xhrDelblogCatListing() {
        $id = (int) $_POST['id'];
        if ($this->db->delete('blot_category', "id = '$id'", 1)) {
            return TRUE;
        }
        return FALSE;
    }

}
