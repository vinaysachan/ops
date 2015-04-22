<?php

/**
 * 
 */
class Navigation {

    public static function MainHeaderMenu() {
        $Menu = array(
            array(
                'label' => 'PHP / Database (Mysql)',
                'link' => 'php',
                'subMenu' => array(
                    array(
                        'label' => 'Basic PHP',
                        'link' => 'php/basic_php',
                    ),
//                    array(
//                        'label' => 'Advance PHP',
//                        'link' => 'php/advance_php',
//                    ),
                )
            ),
//            array(
//                'label' => 'HTML / JS / CSS',
//                'link' => 'html',
//            ),
//            array(
//                'label' => 'PHP Framework',
//                'link' => 'framework',
//            ),
//            array(
//                'label' => 'PHP CMS ',
//                'link' => 'cms',
//            ),
//            array(
//                'label' => 'Blogs / Articles',
//                'link' => 'blogs',
//            ),
//            array(
//                'label' => 'Jobs & Interviews',
//                'link' => 'jobs',
//            ),
        );
        return $Menu;
    }

}
