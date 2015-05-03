<?php

/**
 * 
 */
class Util {

    public static function handleAdminLogin() {
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == FALSE) {
            Session::destroy();
            header('location:' . URL . 'login/admin');
            exit();
        }
    }

    public static function baseUrl($url, $label, $title = '', $class = '', $extra = '') {
        if ($url == '#' || $url == 'javascript:void(0)') {
            $url = $url;
        } else if ($url == '') {
            $url = URL;
        } else {
            $url = URL . $url;
        }
//        $url = ($url == '') ? URL : URL . $url;
        $title = ($title == '') ? $label : $title;
        $label = ($label == '') ? SITENAME : $label;
        $class = ($class == '') ? '' : 'class="' . $class . '"';
        return '<a ' . $extra . ' href="' . $url . '" title="' . $title . '" ' . $class . ' >' . $label . '</a>';
    }

    public static function defaultMenu($data = NULL) {
        echo 'head Menu';
    }

    public static function frontPageMenu($data = NULL) {
        self::createMenu($data, $uclass = 'nav navbar-nav navbar-right');
    }

    private static function createMenu($arr, $uclass = NULL, $role = NULL) {
        $role = ($role == NULL) ? '' : 'role = "' . $role . '"';
        $uclass = ($uclass == NULL) ? '' : ' class = "' . $uclass . '"';
        echo '<ul ' . $role . $uclass . '>';
        foreach ($arr as $key => $value) {
            if (isset($value['subMenu'])) {
                echo '<li class="dropdown">';
                $extra = 'aria-expanded="false" role="button" data-toggle="dropdown"';
                echo self::baseUrl($value['link'], $value['label'], '', 'dropdown-toggle', $extra);
                self::createMenu($value['subMenu'], 'dropdown-menu', 'menu');
            } else {
                echo '<li>';
                echo self::baseUrl($value['link'], $value['label']);
            }
            echo '</li>';
        }
        echo '</ul>';
    }

    public static function adminLeftMenu($data = NULL, $active) {
        self::createAdminMenu($data, $uclass = 'left_menu', $role = 'menu', $extra = ' aria-labelledby="dropdownMenu"', $active);
    }

    private static function createAdminMenu($arr, $uclass = NULL, $role = NULL, $extra = NULL, $active = NULL) {
        $role = ($role == NULL) ? '' : 'role = "' . $role . '"';
        $uclass = ($uclass == NULL) ? '' : ' class = "' . $uclass . '"';
        echo '<ul ' . $role . $uclass . $extra . '>';
        foreach ($arr as $key => $value) {
            if (isset($value['subMenu'])) {
                echo '<li>';
                echo self::baseUrl($value['link'], $value['label']);
                self::createAdminMenu($value['subMenu'], 'sub-menu', '', '', $active);
            } else {
                if ($value['link'] == $active) {
                    $activeclass = 'class = "active"';
                } else {
                    $activeclass = '';
                }
                echo '<li ' . $activeclass . '>';
                echo self::baseUrl($value['link'], $value['label']);
            }
            echo '</li>';
        }
        echo '</ul>';
    }

}
