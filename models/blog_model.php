<?php

//blog

class Blog_model extends Model {

    function __construct() {
	parent::__construct();
    }

    public function getblogCatLists() {
	$whereCon = [':active' => FLAG_Y];
	$sql = 'SELECT count(b.id) AS blog_count,c.name AS blog_category,c.link FROM blog AS b INNER JOIN blog_category AS c ON c.id = b.blog_cat WHERE b.active= :active GROUP BY b.blog_cat';
	return $this->db->select($sql, $whereCon);
    }

    public function getblogLists() {
	$whereCon = [':active' => FLAG_Y];
	$sql = 'SELECT b.id,b.name,b.url,b.blog_intro,b.images,b.date_created, c.name AS cat_name, u.name AS writer_name, bc.commnets_count FROM blog AS b INNER JOIN blog_category AS c ON c.id = b.blog_cat INNER JOIN users AS u ON u.id = b.writer LEFT JOIN (SELECT blog_id, count(id) AS commnets_count FROM blog_comments WHERE active = :active  GROUP BY blog_id ) AS bc ON bc.blog_id = b.id WHERE b.active = :active ORDER BY DATE(b.date_created) DESC';
	return $this->db->select($sql, $whereCon);
    }

    public function getBlogStatement($catagery = NULL) {
	$catCondition = ($catagery) ? "AND c.link = :cat_link " : '';
	return ' blog AS b INNER JOIN blog_category AS c ON c.id = b.blog_cat INNER JOIN users AS u ON u.id = b.writer LEFT JOIN (SELECT blog_id, count(id) AS commnets_count FROM blog_comments WHERE active = :active  GROUP BY blog_id) AS bc ON bc.blog_id = b.id WHERE b.active = :active ' . $catCondition;
    }

    public function getBlogsList($statement, $catagery = NULL, $startpoint, $per_page) {
	$whereCon = [
	    ':active' => FLAG_Y,
	    ':cat_link' => $catagery
	];
	$sql = "SELECT b.id,b.name,b.url,b.blog_intro,b.images,b.date_created, c.name AS cat_name, u.name AS writer_name, bc.commnets_count FROM {$statement} ORDER BY DATE(b.date_created) DESC " . "LIMIT {$startpoint} , {$per_page}";
	return $this->db->select($sql, $whereCon);
    }

    public function getTotalCount($statement, $catagery = NULL) {
	$whereCon = [
	    ':active' => FLAG_Y,
	    ':cat_link' => $catagery
	];
	$sql = "SELECT COUNT(*) as num FROM {$statement}";
	$totalRec = $this->db->select($sql, $whereCon);
	return $totalRec[0]['num'];
    }

    public function getBlogData($id) {
	$whereCon = [ 'id' => $id, ':active' => FLAG_Y];
	$sql = 'SELECT b.id,b.name,b.content,b.images,b.date_created,c.name AS cat_name,c.link, u.name AS writer_name, bc.commnets_count FROM blog AS b INNER JOIN blog_category AS c ON c.id = b.blog_cat INNER JOIN users AS u ON u.id = b.writer LEFT JOIN (SELECT blog_id, count(id) AS commnets_count FROM blog_comments WHERE active = :active GROUP BY blog_id) AS bc ON bc.blog_id = b.id WHERE b.active = :active AND b.id = :id';
	return $this->db->select($sql, $whereCon);
    }
    
    public function getPopularBlogs() {
	$whereCon = [ ':active' => FLAG_Y];
	$sql = ' SELECT b.id,b.name,b.url FROM blog AS b WHERE b.active = :active AND b.is_popular = :active ORDER BY DATE(b.date_created) DESC LIMIT 10';
	return $this->db->select($sql, $whereCon);
    }
    
    
//   
}
