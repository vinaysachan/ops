<?php

class Navigation {

    public static function MainHeaderMenu() {
	return array(
	    array(
		'label' => 'PHP / Database (Mysql)',
		'link' => 'php',
		'subMenu' => array(
		    array(
			'label' => 'Basic PHP',
			'link' => 'php/basic_php',
		    ),
		    array(
			'label' => 'Advance PHP',
			'link' => 'php/advance_php',
		    ),
		)
	    ),
//	    array(
//		'label' => 'HTML / JS / CSS',
//		'link' => 'html',
//	    ),
//	    array(
//		'label' => 'PHP Framework',
//		'link' => 'framework',
//		'subMenu' => array(
//		    array(
//			'label' => 'CodeIgniter',
//			'link' => 'framework/codeigniter',
//		    ),
//		    array(
//			'label' => 'Cake PHP',
//			'link' => 'framework/cake_php',
//		    ),
//		)
//	    ),
//	    array(
//		'label' => 'PHP CMS ',
//		'link' => 'cms',
//	    ),
	    array(
		'label' => 'Blogs',
		'link' => 'blog',
	    ),
	    array(
		'label' => 'Jobs & Interviews',
		'link' => 'jobs',
		'subMenu' => array(
//                    array(
//                        'label' => 'Search Jobs',
//                        'link' => 'jobs',
//                    ),
//                    array(
//                        'label' => 'Interview Tips',
//                        'link' => 'jobs/interview_tips',
//                    ),
		    array(
			'label' => 'Interview Questions',
			'link' => 'jobs/interview_question_answer',
		    ),
                    array(
                        'label' => 'Online Skill Test',
                        'link' => 'jobs/online_php_test',
                    ),
		)
	    ),
	);
    }

    public static function basicPHPLeftMenu() {
	return array(
	    array(
		'label' => 'INTRODUCTION OF PHP',
		'link' => 'php/basic_php'
	    ),
	    array(
		'label' => 'INSTALLING OF PHP',
		'link' => 'javascript:void(0)',
		'subMenu' => array(
		    array(
			'label' => 'Installation on windows',
			'link' => 'php/basic_php/installing_of_php_window',
		    ),
		    array(
			'label' => 'Installation on linux',
			'link' => 'php/basic_php/installing_of_php_linux',
		    ),
		    array(
			'label' => 'Installation on Mac OS X',
			'link' => 'php/basic_php/installing_of_php_mac',
		    ),
		    array(
			'label' => 'Installation on Cloud',
			'link' => 'php/basic_php/installation_on_cloud',
		    ),
		)
	    ),
	    array(
		'label' => 'PHP SYNTAX',
		'link' => 'php/basic_php/php_syntax'
	    ),
	    array(
		'label' => 'PHP OPERATORS',
		'link' => 'javascript:void(0)',
		'subMenu' => array(
		    array(
			'label' => 'PHP Arithmetic Operators',
			'link' => 'php/basic_php/php_arithmetic_operator',
		    ),
		    array(
			'label' => 'PHP Comparison Operator ',
			'link' => 'php/basic_php/php_comparison_operator',
		    ),
		)
	    ),
	    array(
		'label' => 'PHP FUNCTION',
		'link' => 'javascript:void(0)',
		'subMenu' => array(
		    array(
				'label' => 'PHP Function',
				'link' => 'php/basic_php/php_function',
		    ),
		    array(
				'label' => 'Create Your Own Functions',
				'link' => 'php/basic_php/your_own_function',
		    ),
			array(
				'label' => 'Function Scope',
				'link' => 'php/basic_php/function_scope',
		    ),
			array(
				'label' => 'Working with References',
				'link' => 'php/basic_php/working_with_reference',
		    ),
			array(
				'label' => 'Recursive Functions',
				'link' => 'php/basic_php/recursive_functions',
		    ),
		)
	    ),
	    array(
		'label' => 'Object Oriented Programming',
		'link' => 'javascript:void(0)',
		'subMenu' => array(
		    array(
				'label' => 'PHP OOP Introduction',
				'link' => 'php/basic_php/oop_basic_introduction',
		    ),
			array(
				'label' => 'PHP Basic OOP Concepts',
				'link' => 'php/basic_php/basic_oop_concept',
		    ),
			array(
				'label' => 'PHP Object\'s Properties',
				'link' => 'php/basic_php/properties_oop',
		    ),
			array(
				'label' => 'PHP Object\'s Method',
				'link' => 'php/basic_php/method_oop',
		    )
		)
	    )
	);
    }

    public static function advancePHPLeftMenu() {
	return array(
	    array(
		'label' => 'Characteristics of Good PHP Code',
		'link' => 'php/advance_php/good_code'
	    ),
	    array(
		'label' => 'PHP Configuration',
		'link' => 'javascript:void(0)',
		'subMenu' => array(
		    array(
			'label' => 'File Manage of Server time',
			'link' => 'php/advance_php/file_manage',
		    ),
		    array(
			'label' => 'Enable short tag <??>',
			'link' => 'php/advance_php/short_tags',
		    )
		)
	    )
	);
    }

    public static function AdminLeftMenu() {
	return array(
	    array(
		'label' => 'Dashboard',
		'link' => 'admin'
	    ),
	    array(
		'label' => 'Alexa Ranking',
		'link' => 'javascript:void(0)',
		'subMenu' => array(
		    array(
			'label' => 'Alexa Graph',
			'link' => 'admin/alexagraph',
		    ),
		    array(
			'label' => 'Save Alexa rank',
			'link' => 'admin/alexaadd',
		    ),
		)
	    ),
	    array(
		'label' => 'Manage Site Content',
		'link' => 'javascript:void(0)',
		'subMenu' => array(
		    array(
			'label' => 'Manage Page Content',
			'link' => 'admin/content',
		    ),
		    array(
			'label' => 'Manage Gallery',
			'link' => 'admin/gallery',
		    )
		)
	    ),
	    array(
		'label' => 'Manage Site\'s Blog',
		'link' => 'javascript:void(0)',
		'subMenu' => array(
		    array(
			'label' => 'Manage Blag Category',
			'link' => 'admin/blog_cat',
		    ),
		    array(
			'label' => 'Manage Blag Content',
			'link' => 'admin/blog_manage',
		    ),
		)
	    ),
	    array(
		'label' => 'Manage Ques Ans',
		'link' => 'javascript:void(0)',
		'subMenu' => array(
		    array(
			'label' => 'Interview Question Categories',
			'link' => 'admin/interview_ques_cat',
		    ),
		    array(
			'label' => 'Manage Interview Questions',
			'link' => 'admin/interview_ques',
		    )
		)
	    ),
	    [
		'label' => 'Online Test',
		'link' => 'javascript:void(0)', 
		'subMenu' => [
		    ['label' => 'Manage Test category', 'link' => 'admin/test_category'],
		    ['label' => 'Manage Question Answer', 'link' => 'admin/test_quesAns']
		]
	    ]
	);
    }

}

