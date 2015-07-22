<?php

class Admin extends Controller {

    public $__layout = 'admin_layout';

    function __construct($param = NULL) {
	parent::__construct();
	Util::handleAdminLogin();
	$this->view->css = array(
	    'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600',
	    'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700',
	    'public/bootstrap-3.2.0/css/bootstrap.min.css',
	    'public/font-awesome/css/font-awesome.min.css',
	    'public/css/main.css',
	    'public/css/admin.css',
	);
	$this->view->js = array(
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

	//====> Load Pagination Library
	$this->loadLibrary('pagination');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0)
	    $page = 1;
	$per_page = 10; // Set how many records do you want to display per page.
	$startpoint = ($page * $per_page) - $per_page;
	$statement = "`ifsc_code` ORDER BY `ifsc_code` ASC";
	//====> retun total number
	$totalv = $this->model->getTotalCount($statement);
	$total = $totalv[0]['num'];
	$this->view->ifscLists = $this->model->getifscData($statement, $startpoint, $per_page);

	$this->view->pagination = $this->library->pagging($total, $per_page, $page, $url = '?');

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

    public function blog_manage() {
	$this->view->active = 'admin/blog_manage';
	$this->view->heading = $this->view->title = 'Manage Blog Content';

	// ==> Add some more js files
	$this->view->js[] = 'public/dataTables/js/jquery.dataTables.min.js';
	$this->view->js[] = 'public/dataTables/Responsive/js/dataTables.responsive.min.js';
	// ==> Add some more css files
	$this->view->css[] = 'public/dataTables/css/jquery.dataTables.css';
	$this->view->css[] = 'public/dataTables/Responsive/css/dataTables.responsive.css';
	// ==> Get All Page 
	$this->view->blogLists = $this->model->getblogLists();


	$this->view->render('scripts/admin/blog_manage');
    }

    public function blogae($id = NULL) {
	$this->view->active = 'admin/blog_manage';
	$title = ($id == NULL) ? 'Add New Blog' : 'Update Blog';
	$this->view->heading = $this->view->title = $title;
	// ==> Add some more js files
	$this->view->js[] = 'public/tinymce/tinymce.min.js';
	$this->view->js[] = 'public/select2/js/select2.full.min.js';
	// ==> Add some more css files
	$this->view->css[] = 'public/select2/css/select2.min.css';
	// ==> Get All Parent Page
	$this->view->blogCatLists = $this->model->getblogCatLists();
	// ==> Get All Blog Users
	$this->view->getwriterLists = $this->model->getblogUsersLists();
	if ($id == NULL) {
	    $this->view->subheading = 'Add new Blog<small><em>Here add the content of blog</em></small>';
	    if (isset($_POST['add'])) {
		$target_dir = BLOG_IMG_PATH;
		$file_name = basename($_POST['url'] . '_' . $_FILES["blog_img"]["name"]);
		$target_file = $target_dir . $file_name;
		move_uploaded_file($_FILES["blog_img"]["tmp_name"], $target_file);
		$data = [
		    'blog_cat' => $_POST['blog_cat'],
		    'name' => $_POST['name'],
		    'url' => $_POST['url'],
		    'images' => $file_name,
		    'blog_intro' => $_POST['blog_intro'],
		    'content' => $_POST['content'],
		    'writer' => $_POST['writer'],
		    'active' => $_POST['status'],
		    'is_popular' => $_POST['is_popular'],
		    'date_created' => date("Y-m-d H:i:s")
		];
		$this->model->blogInsert($data);
		$msg = urlencode('Blog added Successfully');
		header('location: ' . URL . 'admin/blog_manage?succ-msg=' . $msg);
	    }
	} else {
	    $this->view->subheading = 'Update Blog<small><em>Here update the content of blog</em></small>';
	    $blogData = $this->model->getBlogData($id);
	    if (empty($blogData)) {
		$msg = urlencode('Unable to update blog content data');
		header('location: ' . URL . 'admin/blog_manage?succ-err=' . $msg);
	    } else {
		$this->view->blogData = $blogData;
		if (isset($_POST['update'])) {
		    $data = [
			'blog_cat' => $_POST['blog_cat'],
			'name' => $_POST['name'],
			'url' => $_POST['url'],
			'blog_intro' => $_POST['blog_intro'],
			'content' => $_POST['content'],
			'writer' => $_POST['writer'],
			'active' => $_POST['status'],
			'is_popular' => $_POST['is_popular']
		    ];
		    if ($_FILES["blog_img"]['name'] != '') {
			$file_name = basename($_POST['url'] . '_' . $_FILES["blog_img"]["name"]);
			if (!empty($blogData[0]['images'])) {
			    $oldImg = BLOG_IMG_PATH . $blogData[0]['images'];
			    if (file_exists($oldImg)) {
				unlink($oldImg); // Delete now
			    }
			    if (!file_exists($oldImg)) {
				$target_dir = BLOG_IMG_PATH;
				$file_name = basename($_POST['url'] . '_' . $_FILES["blog_img"]["name"]);
				$target_file = $target_dir . $file_name;
				move_uploaded_file($_FILES["blog_img"]["tmp_name"], $target_file);
				$data['images'] = $file_name;
			    }
			}
		    }
		    $this->model->blogUpdate($data, $id);
		    $msg = urlencode('Blog Updated Successfully');
		    header('location: ' . URL . 'admin/blog_manage?succ-msg=' . $msg);
		}
	    }
	}
	$this->view->render('scripts/admin/blogae');
    }

    public function interview_ques_cat() {
	$this->view->active = 'admin/interview_ques_cat';
	$this->view->heading = $this->view->title = 'Manage Interview Question Categories';
	// ==> Add Js file for validation and Ajax 
	$this->view->js[] = 'views/scripts/admin/js/in_ques_cat.js';
	$this->view->render('scripts/admin/interview_ques_cat');
    }

    public function interview_ques() {
	$this->view->active = 'admin/interview_ques';
	$this->view->heading = $this->view->title = 'Manager Interview Questions And their answers';
	// ==> Add some more js files
	$this->view->js[] = 'public/dataTables/js/jquery.dataTables.min.js';
	$this->view->js[] = 'public/dataTables/Responsive/js/dataTables.responsive.min.js';
	// ==> Add some more css files
	$this->view->css[] = 'public/dataTables/css/jquery.dataTables.css';
	$this->view->css[] = 'public/dataTables/Responsive/css/dataTables.responsive.css';
	// ==> Get All Questions
	$this->view->questionsList = $this->model->getQuestionsList();
	$this->view->render('scripts/admin/interview_ques');
    }

    public function interview_ques_ae($id = NULL) {
	$this->view->active = 'admin/interview_ques';
	$title = ($id == NULL) ? 'Add New Interview Questions' : 'Update Interview Questions';
	$this->view->heading = $this->view->title = $title;
	// ==> Add some more js files
	$this->view->js[] = 'public/tinymce/tinymce.min.js';
	$this->view->js[] = 'public/select2/js/select2.full.min.js';
	// ==> Add some more css files
	$this->view->css[] = 'public/select2/css/select2.min.css';
	// ==> Get Question category list
	$this->view->quesCatLists = $this->model->getQuesCatLists();
	if ($id == NULL) {
	    $this->view->subheading = 'Add new Interview Questions<small><em>Here we can add the Interview Questions with thier category and difficulty level.</em></small>';
	    if (isset($_POST['add'])) {
		$data = [
		    'question_category_id' => $_POST['question_category_id'],
		    'question' => $_POST['question'],
		    'level' => $_POST['level'],
		    'active' => $_POST['active'],
		    'date_created' => date("Y-m-d H:i:s")
		];
		$id = $this->model->questionInsert($data);
		$msg = urlencode('Interview Questions added Successfully');
		header('location: ' . URL . 'admin/interview_ques_ae/' . $id . '?succ-msg=' . $msg);
	    }
	} else {
	    $this->view->subheading = 'Update Interview Questions<small><em>Here we can update the Interview Questions and their answer</em></small>';
	    $quesData = $this->model->getQuestionData($id);
	    if (empty($quesData)) {
		$msg = urlencode('Unable to update Interview Questions');
		header('location: ' . URL . 'admin/interview_ques?succ-err=' . $msg);
	    } else {
		$this->view->quesData = $quesData;
		if (isset($_POST['update'])) {
		    $data = [
			'question_category_id' => $_POST['question_category_id'],
			'question' => $_POST['question'],
			'level' => $_POST['level'],
			'active' => $_POST['active'],
		    ];
		    $this->model->questionUpdate($data, $id);
		    $msg = urlencode('Interview Questions Updated Successfully');
		    header('location: ' . URL . 'admin/interview_ques_ae/' . $id . '?succ-msg=' . $msg);
		}
	    }
	}
	$this->view->render('scripts/admin/interview_ques_ae');
    }

    public function interview_ques_ans($id) {
	if (empty($id)) {
	    $msg = urlencode('Unable to View Interview Questions\'s Answer');
	    header('location: ' . URL . 'admin/interview_ques?succ-err=' . $msg);
	}
	$this->view->active = 'admin/interview_ques';
	$this->view->heading = $this->view->title = 'Manage Interview Questions\'s Answer';
	// ==> Add some more js files
	$this->view->js[] = 'public/tinymce/tinymce.min.js';
	//get
	$this->view->quesAnsData = $this->model->getQuesAnsData($id);
	if (isset($_POST['add'])) {
	    $data = [
		'answer' => $_POST['answer'],
		'questions_id' => $_POST['questions_id'],
		'active' => $_POST['active'],
		'date_created' => date("Y-m-d H:i:s")
	    ];
	    $this->model->quesAnsInsert($data);
	    $msg = urlencode('Interview Questions\'s Answer added Successfully');
	    header('location: ' . URL . 'admin/interview_ques_ae/' . $id . '?succ-msg=' . $msg);
	} else if (isset($_POST['update'])) {
	    $data = [
		'answer' => $_POST['answer'],
		'questions_id' => $_POST['questions_id'],
		'active' => $_POST['active']
	    ];
	    $this->model->quesAnsUpdate($data, $_POST['answer_id']);
	    $msg = urlencode('Interview Questions\'s Answer Updated Successfully');
	    header('location: ' . URL . 'admin/interview_ques_ae/' . $id . '?succ-msg=' . $msg);
	}
	$this->view->render('scripts/admin/interview_ques_ans');
    }

    public function gallery() {
	$this->view->active = 'admin/gallery';
	$this->view->heading = $this->view->title = 'Manage Gallery\'s Images ';
	$this->view->subheading = 'Manage Images<small><em>Here we can add new image or delete old image</em></small>';
	if (isset($_POST['add']) && (!empty($_FILES["img"]["name"]))) {
	    $target_dir = GALLERY_IMG_PATH;
	    $file_name = basename($_FILES["img"]["name"]);
	    $target_file = $target_dir . $file_name;
	    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
	    $data = [
		'path_full_img' => URL . $target_file,
		'active' => $_POST['active'],
		'date_created' => date("Y-m-d H:i:s")
	    ];
	    $this->model->galleryInsert($data);
	    $msg = urlencode('Image added Successfully');
	    header('location: ' . URL . 'admin/gallery?succ-msg=' . $msg);
	}
	// ==> Get All Images
	$this->view->gallery = $this->model->getGalleryList();
	$this->view->render('scripts/admin/gallery');
    }

    public function test_category() {
	$this->view->active = 'admin/test_category';
	$this->view->heading = $this->view->title = 'Manage Online Test Categories';
	// ==> Add Js file for validation and Ajax 
	$this->view->js[] = 'views/scripts/admin/js/test_cat.js';
	$this->view->render('scripts/admin/test_category');
    }

    public function test_quesAns() {
	$this->view->active = 'admin/test_quesAns';
	$this->view->heading = $this->view->title = 'Online Test Categories';
	// ==> Add some more js files
	$this->view->js[] = 'public/dataTables/js/jquery.dataTables.min.js';
	$this->view->js[] = 'public/dataTables/Responsive/js/dataTables.responsive.min.js';
	// ==> Add some more css files
	$this->view->css[] = 'public/dataTables/css/jquery.dataTables.css';
	$this->view->css[] = 'public/dataTables/Responsive/css/dataTables.responsive.css';
	// ==> Get All Questions
	$this->view->questionsList = $this->model->gettestQuestionsList();


	$this->view->render('scripts/admin/test_quesAns');
    }

    public function test_ques_ae($id = NULL) {
	$this->view->active = 'admin/test_quesAns';
	$title = ($id == NULL) ? 'Add New Online Test Question' : 'Update Online Test Question';
	$this->view->heading = $this->view->title = $title;
	// ==> Add some more js files
	$this->view->js[] = 'public/tinymce/tinymce.min.js';
	$this->view->js[] = 'public/select2/js/select2.full.min.js';
	$this->view->js[] = 'views/scripts/admin/js/test_ques_ae.js';
	// ==> Add some more css files
	$this->view->css[] = 'public/select2/css/select2.min.css';
	// ==> Get Question category list
	$this->view->quesCatLists = $this->model->gettestQuesLists();
	if ($id == NULL) {
	    $this->view->subheading = 'Add new Test Questions<small><em>Here we can add the test Questions with thier Answer Option and category .</em></small>';
	    if (isset($_POST['add'])) {
		$data = [
		    'cat_id' => $_POST['cat_id'],
		    'question' => $_POST['question'],
		    'level' => $_POST['level'],
		    'ans' => $_POST['ans'],
		    'mark' => $_POST['mark'],
		    'active' => $_POST['active'],
		    'date_created' => date("Y-m-d H:i:s")
		];
		$id = $this->model->testquestionInsert($data);
		$msg = urlencode('Test Questions added Successfully');
		header('location: ' . URL . 'admin/test_ques_ae/' . $id . '?succ-msg=' . $msg);
	    }
	} else {
	    $this->view->subheading = 'Update Test Questions<small><em>Here we can update the test Questions with thier Answer Option and category.</em></small>';
	    $quesData = $this->model->gettestQuesData($id);
	    if (empty($quesData)) {
		$msg = urlencode('Unable to update Test Questions');
		header('location: ' . URL . 'admin/test_quesAns?succ-err=' . $msg);
	    } else {
		$this->view->quesData = $quesData;
		if (isset($_POST['update'])) {
		    $data = [
			'cat_id' => $_POST['cat_id'],
			'question' => $_POST['question'],
			'level' => $_POST['level'],
			'ans' => $_POST['ans'],
			'mark' => $_POST['mark'],
			'active' => $_POST['active']
		    ];
		    $this->model->testquestionUpdate($data, $id);
		    $msg = urlencode('Test Questions Updated Successfully');
		    header('location: ' . URL . 'admin/test_ques_ae/' . $id . '?succ-msg=' . $msg);
		}
	    }
	}

	$this->view->render('scripts/admin/test_ques_ae');
    }

//    public function alexaaddaa($param = NULL) {
//	$this->view->active = 'admin/alexaaddaa';
//	$this->view->render('scripts/admin/alexaaddaa');
//    }
}
