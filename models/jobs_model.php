<?php

class Jobs_model extends Model {

    function __construct() {
	parent::__construct();
    }

    public function getQuesCatLists() {
	$whereCon = [':active' => FLAG_Y];
	$sql = 'SELECT c.name,c.link, count(q.id) AS ques_count FROM questions AS q INNER JOIN question_category AS c ON c.id = q.question_category_id WHERE q.active = :active GROUP BY q.question_category_id';
	return $this->db->select($sql, $whereCon);
    }

    public function getQuesListsOLD($catLink = NULL) {
	$whereCon = [
	    ':active' => FLAG_Y,
	    ':cat_link' => $catLink
	];
	$catCondition = ($catLink) ? "AND c.link = :cat_link " : '';
	$catname = ($catLink) ? ",c.name AS cat_name " : '';
	$sql = 'SELECT '
		. 'q.id,q.question,q.level,a.answer '
		. $catname
		. 'FROM questions AS q '
		. 'INNER JOIN questions_answer AS a ON a.questions_id = q.id '
		. 'INNER JOIN question_category AS c ON c.id = q.question_category_id '
		. 'WHERE q.active = :active AND a.active = :active '
		. $catCondition
		. 'ORDER BY q.id DESC';
	return $this->db->select($sql, $whereCon);
    }

    public function getQuestStatement($catLink = NULL) {
	$catCondition = ($catLink) ? "AND c.link = :cat_link " : '';
	return ' questions AS q '
		. 'INNER JOIN questions_answer AS a ON a.questions_id = q.id '
		. 'INNER JOIN question_category AS c ON c.id = q.question_category_id '
		. 'WHERE q.active = :active AND a.active = :active '
		. $catCondition;
    }

    public function getQuesLists($statement, $catLink = NULL ,$startpoint, $per_page) {
	$whereCon = [
	    ':active' => FLAG_Y,
	    ':cat_link' => $catLink
	];
	$catname = ($catLink) ? ",c.name AS cat_name " : '';
	$catCondition = ($catLink) ? "AND c.link = :cat_link " : '';
	$sql = "SELECT q.id,q.question,q.level,a.answer $catname FROM {$statement} ". "LIMIT {$startpoint} , {$per_page}";
	return $this->db->select($sql, $whereCon);
    }

    public function getTotalCount($statement, $catLink = NULL) {
	$whereCon = [
	    ':active' => FLAG_Y,
	    ':cat_link' => $catLink
	];
	$catCondition = ($catLink) ? "AND c.link = :cat_link " : '';
	$sql = "SELECT COUNT(*) as num FROM {$statement}";
	$totalRec = $this->db->select($sql, $whereCon);
	return $totalRec[0]['num'];
    }
    
    public function getPopularBlogs() {
	$whereCon = [ ':active' => FLAG_Y];
	$sql = ' SELECT b.id,b.name,b.url FROM blog AS b WHERE b.active = :active AND b.is_popular = :active ORDER BY DATE(b.date_created) DESC LIMIT 10';
	return $this->db->select($sql, $whereCon);
    }
}

?>