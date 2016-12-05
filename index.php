<?php
include_once 'settings.php';
include_once 'mst_db.php';
//include_once 'Core.php';
include_once 'URL.php';

//session_start();

$mst_db = new SafeMySQL();
//$Core = new Core();
$url = new URL();
$Page = $url->getPage();

//global $url;
//$Core->set_Parameters();
// var_dump($Core->get_redirect_url('eu', 'math', null, 'formula'));
// if () {
//
// }
// $Core->Redirect($Core->get_redirect_url('eu', 'math', null, 'formula'), false);

/*           Module        */
/*
** Language - 1
** Categories - 2
** Section - 3
*/

// if ($_SERVER['REQUEST_URI'] == '/') {
// 	$Page = 'FrontPage';
// 	$Module = 'index';
// } else {
// 	$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// 	$URL_Parts = explode('/', trim($URL_Path, ' /'));
// 	$Page = array_shift($URL_Parts);
// 	$Module = array_shift($URL_Parts);
//
//
// 	if (!empty($Module)) {
// 	$Param = array();
// 		for ($i = 0; $i < count($URL_Parts); $i++) {
// 			$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
// 		}
// 	}
// }

include_once('function.php');
include_once('page.php');

// 	include_once('newsite/index.php');

//
// switch ($Page) {
// 	// case 'index': echo 'Главная';	break;
// 	// case 'mst-admin': include('admin/admin_logIn.php'); break;
// 	// case 'admin_main': include('admin/admin_main.php'); break;
// 	// case 'form': include('form/form.php'); break;
// 	// case 'formula': include('page/formula.php'); break;
// 	case 'page': include('page.php'); break;
//
//
//
// 	default: include('404.html');
// }


function FormChars ($p1) {
	return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
}

function GenPass ($p1, $p2) {
	return md5('MRSHIFT'.md5('321'.$p1.'123').md5('678'.$p2.'890'));
}
?>
