<?php

class Login extends Controller {

    public $__layout = 'login_layout';

    function __construct($param = NULL) {
        parent::__construct();
        Session::init();
    }

    public function admin($param = NULL) {
        if (isset($_POST['submit'])) {
            if (empty($_POST['username'])) {
                $error[] = 'Please enter username.';
            }
            if (empty($_POST['password'])) {
                $error[] = 'Please enter password.';
            }
            if (empty($error)) {
                $data = $this->model->adminloginrun();
                if (empty($data)) {
                    $error[] = 'Username And password not match';
                } else {
                    Session::set('role', $data[0]['role']);
                    Session::set('loggedIn', true);
                    Session::set('userid', $data[0]['id']);
                    Session::set('name', $data[0]['name']);
                    header('location:' . URL . 'admin');
                }
            }
            $this->view->error = $error;
        }
        $this->view->layout = 'login_layout';
        $this->view->render('scripts/admin/login');
    }

    public function adminlogout($param = NULL) {
        Session::destroy();
        header('location:' . URL . 'admin');
    }

}
