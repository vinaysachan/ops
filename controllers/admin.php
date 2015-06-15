<?php

class Admin extends Controller {

    public $__layout = 'admin_layout';

    function __construct($param = NULL) {
        parent::__construct();
        Util::handleAdminLogin();
        $this->view->css = array(
            'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600',
            'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700',
            'public/bootstrap-3.2.0/css/bootstrap.css',
            'public/font-awesome/css/font-awesome.min.css',
            'public/css/main.css'
        );
        $this->view->js = array(
            'public/js/custom.js',
            'public/js/jquery-2.1.1.min.js',
            'public/js/jquery-ui.min.js',
            'public/bootstrap-3.2.0/js/bootstrap.min.js',
            'public/js/custom.js'
        );
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
    }

    function index() {
        $this->view->active = 'admin';
        $this->view->render('scripts/admin/index');
    }

    public function alexagraph($param = NULL) {
        $this->view->active = 'admin/alexagraph';
        $this->view->render('scripts/admin/alexagraph');
    }

    public function alexaadd($param = NULL) {
        $this->view->active = 'admin/alexaadd';
        $this->view->render('scripts/admin/alexaadd');
    }

    public function content($param = NULL) {
        $this->view->active = 'admin/content';
        $this->view->heading = $this->view->title = 'Manage Page Content';
        // ==> Add some more js files
        $this->view->js[] = 'public/dataTables/js/jquery.dataTables.min.js';
        $this->view->js[] = 'public/dataTables/Responsive/js/dataTables.responsive.min.js';
        // ==> Add some more css files
        $this->view->css[] = 'public/dataTables/css/jquery.dataTables.css';
        $this->view->css[] = 'public/dataTables/Responsive/css/dataTables.responsive.css';
        // ==> Get All Page 
        $this->view->contentLists = $this->model->getContenLists();
        $this->view->render('scripts/admin/content');
    }

    public function contentae($id = NULL) {
        $this->view->active = 'admin/content';
        $title = ($id == NULL) ? 'Add New Page Content' : 'Update Page Content';
        $this->view->heading = $this->view->title = $title;
        // ==> Add some more js files
        $this->view->js[] = 'public/tinymce/tinymce.min.js';
        $this->view->js[] = 'public/select2/js/select2.full.min.js';
        // ==> Add some more css files
        $this->view->css[] = 'public/select2/css/select2.min.css';
        // ==> Get All Parent Page
        $this->view->pageLists = $this->model->getPageLists();
        if ($id == NULL) {
            $this->view->subheading = 'Add new Page Content<small><em>Here add the content of page</em></small>';
            if (isset($_POST['add'])) {
                $data = [
                    'parent' => $_POST['ppage'],
                    'page_heading' => $_POST['page_heading'],
                    'site_path' => $_POST['site_path'],
                    'content' => $_POST['content'],
                    'active' => $_POST['status'],
                    'date_created' => date("Y-m-d H:i:s")
                ];
                $this->model->contentInsert($data);
                $msg = urlencode('Page content added Successfully');
                header('location: ' . URL . 'admin/content?succ-msg=' . $msg);
            }
        } else {
            $this->view->subheading = 'Update Page Content<small><em>Here update the content of page</em></small>';
            $contentData = $this->model->getContenData($id);
            if (empty($contentData)) {
                $msg = urlencode('Unable to update page content data');
                header('location: ' . URL . 'admin/content?succ-err=' . $msg);
            } else {
                $this->view->contentdata = $contentData;
                if (isset($_POST['update'])) {
                    $data = [
                        'parent' => $_POST['ppage'],
                        'page_heading' => $_POST['page_heading'],
                        'site_path' => $_POST['site_path'],
                        'content' => $_POST['content'],
                        'active' => $_POST['status']
                    ];
                    $this->model->contentUpdate($data, $id);
                    $msg = urlencode('Page content Updated Successfully');
                    header('location: ' . URL . 'admin/content?succ-msg=' . $msg);
                }
            }
        }
        $this->view->render('scripts/admin/contentae');
    }

    public function blog_cat() {
        $this->view->active = 'admin/blog_cat';
        $this->view->heading = $this->view->title = 'Manage Blog Category'; 
        // ==> Add Js file for validation and Ajax 
        $this->view->js[] = 'views/scripts/admin/js/blog_cat.js';

         
        $this->view->render('scripts/admin/blog_cat');
    }

//        public function alexaaddaa($param = NULL) {
//        $this->view->active = 'admin/alexaaddaa';
//        $this->view->render('scripts/admin/alexaaddaa');
//    }
}
