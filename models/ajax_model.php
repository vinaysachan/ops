<?php

class Ajax_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function xhrSignUpNewsletter() {
        $data = array(
            'email' => $_POST['email'],
            'date_created' => date("Y-m-d H:i:s"),
            'active' => FLAG_N
        );
        if ($this->checkExistemail($_POST['email'])) {
            return 'already';
        } else {
            $this->db->insert('newsletter_registration', $data);
            return 'added';
        }
    }

    public function checkExistemail($email) {
        $whereCon = ['email' => $email];
        $data = $this->db->select('SELECT count(id) as num FROM newsletter_registration WHERE email = :email', $whereCon);
        if ($data[0]['num'] > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function xhrtestCategories() {
        $whereCon = [];
        $sql = 'SELECT id,cat_name, list_order,logo FROM test_category ORDER BY list_order ASC,cat_name ASC';
        return $this->db->select($sql, $whereCon);
    }

    public function xhrStarttest($post) {

        foreach ($post['cat_level'] as $cat => $level) {
            $a = $this->getQuesList($cat, $level, '30');
        }


        
 





//        
//        Array
//(
//    [cat_level] => Array
//        (
//            [1] => m
//            [4] => e
//        )
//
//    [sname] => Vinay Sachan
//    [semail] => vnyscn@gmail.com
//)
    }

    private function getQuesList($catid, $level = 'M', $limit = '30') {
        $whereCon = ['level' => $level, 'cat_id' => $catid];
        $sql = 'SELECT * FROM test_ques WHERE level = :level AND cat_id = :cat_id ORDER BY rand() LIMIT ' . $limit;
        return $this->db->select($sql, $whereCon);
    }

}
