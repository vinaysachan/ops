<?php

class Admin extends Controller {

    public $__layout = 'layout_admin';

    function __construct($param = NULL) {
        parent::__construct();
        Util::handleAdminLogin();
    }

    public function index($param = NULL) {
        $this->view->active = 'admin';
        $this->view->render('scripts/admin/index');
    }

    public function content($param = NULL) {
        $this->view->active = 'admin/content';
        $this->view->heading = $this->view->title = 'Manage Page Content';
        /* js files */
        $this->view->js = ['public/dataTables/js/dataTables.responsive.min.js', 'public/dataTables/js/jquery.dataTables.min.js'];
        /* css files */
        $this->view->css = ['public/dataTables/css/jquery.dataTables.css', 'public/dataTables/css/dataTables.responsive.css'];




        $this->view->contentLists = $this->model->getContenLists();
        $this->view->render('scripts/admin/content');
    }

    public function contentae($id = NULL) {
        $this->view->active = 'admin/content';
        $this->view->heading = $this->view->title = 'Manage Page Content';
        /* js files */
        $this->view->js = ['public/form-validator/jquery.form-validator.min.js', 'public/select2/js/select2.full.min.js'];
        /* css files */
        $this->view->css = ['public/form-validator/form-validator.css', 'public/select2/css/select2.min.css'];
        $this->view->pageLists = $this->model->getPageLists();
        if (empty($id)) {
            /* in case of Add new page Content */
            $this->view->subheading = 'Add new Page Content<small><em>Here add the content of page</em></small>';
            if (isset($_POST['add'])) {
                $data = [
                    'parent' => $_POST['ppage'],
                    'page_heading' => $_POST['page_heading'],
                    'site_path' => $_POST['site_path'],
                    'content' => $_POST['content'],
                    'active' => $_POST['status']
                ];
                $this->model->contentInsert($data);
                $msg = urlencode('Page content added Successfully');
                header('location: ' . URL . 'admin/content?succ-msg=' . $msg);
            }
        } else {
            /* in case of Update existing page Content */
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




//            
        }
        $this->view->render('scripts/admin/contentae');
    }

    public function leftmenu($param = NULL) {
        $this->view->active = 'admin/leftmenu';
        $this->view->render('scripts/admin/leftmenu');
    }

    public function alexagraph($param = NULL) {
        $this->view->active = 'admin/alexagraph';
        $this->view->render('scripts/admin/alexagraph');
    }

    public function alexaadd($param = NULL) {
        $this->view->active = 'admin/alexaadd';
        $this->view->render('scripts/admin/alexaadd');
    }

}
