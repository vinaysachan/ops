<?php

class Login extends Controller {

    public $__layout = 'login_layout';

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->css = [
            'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600',
            'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700',
            'public/bootstrap-3.2.0/css/bootstrap.css',
            'public/font-awesome/css/font-awesome.min.css',
            'public/css/login.css'
        ];
        $this->view->js = [
            'public/js/jquery-2.1.1.min.js',
            'http://code.jquery.com/ui/1.11.4/jquery-ui.js',
            'public/bootstrap-3.2.0/js/bootstrap.min.js'
        ];
    }

    function admin() {
        $this->view->title = SITENAME . ' Admin Login';
        $this->view->metaTags = [
            ['charset' => 'utf-8'],
            ['http-equiv' => 'Content-Type', 'content' => 'text/html;charset=utf-8'],
            ['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge'],
            ['name' => 'author', 'content' => 'Vinay Sachan'],
            ['name' => 'description', 'content' => 'put your page description here'],
            ['name' => 'Keywords', 'content' => 'put your page Keywords here'],
            ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'],
            ['name' => 'robots', 'content' => 'noindex, nofollow'],
        ];
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
                    Session::set('loggedIn', TRUE);
                    Session::set('userid', $data[0]['id']);
                    Session::set('name', $data[0]['name']);
                    header('location:' . URL . 'admin');
                }
            }
            $this->view->error = $error;
        }
        $this->view->render('scripts/login/admin');
    }

    public function adminlogout($param = NULL) {
        Session::destroy();
        header('location:' . URL . 'admin');
    }

}
