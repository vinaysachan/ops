<?php

class Php_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getPageContent($param) {
        return $this->db->select('SELECT * FROM page_content WHERE site_path = :site_path', array('site_path' => $param));
    }

}
