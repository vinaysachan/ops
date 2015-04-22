<?php

/**
 * 
 */
class Util {

    public static function handleLogin() {
        @session_start();
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            session_destroy();
            header('location: ../login');
            exit;
        }
    }

    public static function baseUrl($url, $label, $title = '', $class = '', $extra = '') {
        $url = ($url == '') ? URL : URL . $url;
        $title = ($title == '') ? $label : $title;
        $label = ($label == '') ? SITENAME : $label;
        $class = ($class == '') ? '' : 'class=' . $class;
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
                echo '<li class="active dropdown">';
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

}
