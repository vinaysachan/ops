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

}
