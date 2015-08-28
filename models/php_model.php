<?php

class Php_model extends Model {

    function __construct() {
	parent::__construct();
    }

    public function getPageContent($param) {
	$whereCon = [
	    'site_path' => $param['site_path'],
	    'url' => $param['parent_page'],
	    'active' => FLAG_Y
	];
	$sql = 'SELECT '
		. 'p.page_heading,p.content '
		. 'FROM page_content AS p INNER JOIN page_content_parent AS pp ON pp.id = p.parent '
		. 'WHERE p.site_path = :site_path AND pp.url = :url AND p.active = :active';
	return $this->db->select($sql, $whereCon);
    }

    public function getPopularBlogs() {
	$whereCon = [ ':active' => FLAG_Y];
	$sql = ' SELECT b.id,b.name,b.url FROM blog AS b WHERE b.active = :active AND b.is_popular = :active ORDER BY DATE(b.date_created) DESC LIMIT 10';
	return $this->db->select($sql, $whereCon);
    }
    
    public function getLatestBlogs() {
	$whereCon = [ ':active' => FLAG_Y];
	$sql = ' SELECT b.id,b.name,b.url FROM blog AS b WHERE b.active = :active ORDER BY DATE(b.date_created) DESC LIMIT 6';
	return $this->db->select($sql, $whereCon);
    }

}
