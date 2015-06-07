<?php

class Login_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function adminloginrun() {
        $password = Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY);
        
        echo $password ;
        
        $WhereCon = ['username' => $_POST['username'],
            'password' => $password,
            'active' => FLAG_Y,
            'role' => ROLE_ADMIN
        ];
        return $this->db->select('SELECT * FROM users WHERE username = :username AND password = :password AND active = :active  AND role = :role', $WhereCon);
    }

}
