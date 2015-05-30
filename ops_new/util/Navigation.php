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
                'label' => 'Blogs / Articles',
                'link' => 'blogs',
            ),
            array(
                'label' => 'Jobs & Interviews',
                'link' => 'jobs',
            ),
        );
    }

    public static function AdminLeftMenu() {
        return array(
            array(
                'label' => 'Dashboard',
                'link' => 'admin'
            ),
            array(
                'label' => 'Page Contents',
                'link' => 'javascript:void(0)',
                'subMenu' => array(
                    array(
                        'label' => 'Content',
                        'link' => 'admin/content',
                    ),
//                    array(
//                        'label' => 'Left Menu',
//                        'link' => 'admin/leftmenu',
//                    ),
                )
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
            )
        );
    }

}
