<?php

require 'constant.php';

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

    public static function metatags($AllmetaTags) {
	$m = '';
	foreach ($AllmetaTags as $metatags) {
	    $m .= '<meta ';
	    foreach ($metatags as $key => $meta) {
		$m .= $key . '="' . $meta . '" ';
	    }
	    $m .= '/>';
	}
	return $m;
    }

    public static function cssList($a) {
	$c = '';
	foreach ($a as $s) {
	    if (!Util::checkValidURL($s)) {
		$c .= '<link href="' . URL . $s . '" rel="stylesheet" media="screen" type="text/css" />';
	    } else {
		$c .= '<link href="' . $s . '" rel="stylesheet" media="screen"/>';
	    }
	}
	return $c;
    }

    public static function jsList($a) {
	$j = '';
	foreach ($a as $s) {
	    if (!Util::checkValidURL($s)) {
		$j .= '<script type="text/javascript" src="' . URL . $s . '"></script>';
	    } else {
		$j .= '<script type="text/javascript" src="' . $s . '"></script>';
	    }
	}
	return $j;
    }

    public static function checkValidURL($w) {
	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $w)) {
	    return FALSE;
	} else {
	    return TRUE;
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

    public static function frontPageMenu($data = NULL, $active) {
	self::createMenu($data, $uclass = 'nav navbar-nav navbar-right', '', $active);
    }

    private static function createMenu($arr, $uclass = NULL, $role = NULL, $active = NULL) {
	$role = ($role == NULL) ? '' : 'role = "' . $role . '"';
	$uclass = ($uclass == NULL) ? '' : ' class = "' . $uclass . '"';
	echo '<ul ' . $role . $uclass . '>';
	foreach ($arr as $key => $value) {
	    if ($value['link'] == $active) {
		$activeclass = 'active';
	    } else {
		$activeclass = '';
	    }
	    if (isset($value['subMenu'])) {
		echo '<li class=" ' . $activeclass . ' dropdown">';
		$extra = 'aria-expanded="false" role="button" data-toggle="dropdown"';
		echo self::baseUrl($value['link'], $value['label'], '', 'dropdown-toggle', $extra);
		self::createMenu($value['subMenu'], 'dropdown-menu', 'menu');
	    } else {
		echo '<li class="' . $activeclass . '">';
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

    public static function createBreadcrum($breadcrumb) {
	if (!empty($breadcrumb)) {
	    foreach ($breadcrumb as $bread) {
		if ($bread['link'] == '') {
		    echo '<li title="' . $bread['title'] . '" class="bc">' . $bread['name'] . '</li>';
		} else {
		    echo '<li class="bc"><a title="' . $bread['title'] . '" href="' . $bread['link'] . '">' . $bread['name'] . '</a></li>';
		}
	    }
	}
    }

}
