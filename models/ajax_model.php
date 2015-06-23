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

}
