<?php

/**
 * 
 */
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
            array(
                'label' => 'HTML / JS / CSS',
                'link' => 'html',
            ),
            array(
                'label' => 'PHP Framework',
                'link' => 'framework',
                'subMenu' => array(
                    array(
                        'label' => 'CodeIgniter',
                        'link' => 'framework/codeigniter',
                    ),
                    array(
                        'label' => 'Cake PHP',
                        'link' => 'framework/cake_php',
                    ),
                )
            ),
            array(
                'label' => 'PHP CMS ',
                'link' => 'cms',
            ),
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
//                    array(
//                        'label' => 'PHP Test',
//                        'link' => 'jobs/test',
//                    ),
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
                'label' => 'Alexa',
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
                'label' => 'Manage Page Content',
                'link' => 'javascript:void(0)',
                'subMenu' => array(
                    array(
                        'label' => 'Page Content',
                        'link' => 'admin/content',
                    ),
//                    array(
//                        'label' => 'Save Alexa rank',
//                        'link' => 'admin/alexaaddaa',
//                    ),
                )
            )
        );
    }

}
