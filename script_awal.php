<?php
session_start();
// error_reporting(1);
// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$doc_root = $_SERVER['DOCUMENT_ROOT'].'/sales/';
$doc_root_class = $_SERVER['DOCUMENT_ROOT'].'/sales/class/';
$doc_root_js = $_SERVER['DOCUMENT_ROOT'].'/sales/asset/js/';
$doc_root_css = $_SERVER['DOCUMENT_ROOT'].'/sales/asset/css/';
$doc_root_pics = $_SERVER['DOCUMENT_ROOT'].'/sales/asset/pics/';
$doc_root_spry = $_SERVER['DOCUMENT_ROOT'].'/sales/asset/SpryAssets/';
$doc_root_validation_engine = $_SERVER['DOCUMENT_ROOT'].'/sales/asset/validation_engine/';

$addr_root = 'http://'.$_SERVER['HTTP_HOST'].'/sales/';
$addr_root_class = 'http://'.$_SERVER['HTTP_HOST'].'/sales/class/';
$addr_root_js = 'http://'.$_SERVER['HTTP_HOST'].'/sales/asset/js/';
$addr_root_css = 'http://'.$_SERVER['HTTP_HOST'].'/sales/asset/css/';
$addr_root_pics = 'http://'.$_SERVER['HTTP_HOST'].'/sales/asset/pics/';
$addr_root_spry = 'http://'.$_SERVER['HTTP_HOST'].'/sales/asset/SpryAssets/';
$addr_root_validation_engine = 'http://'.$_SERVER['HTTP_HOST'].'/sales/asset/validation_engine/';

$addr_server = 'http://'.$_SERVER['HTTP_HOST'].'/sales/';
$server_name = $_SERVER['HTTP_HOST'].'/sales/';

if($_SERVER['HTTP_REFERER']==''){
    $_SESSION['warning'] = 'Silahkan login untuk mengakses halaman ini!';
    header("Location: ".$addr_root."index.php");
    exit();
}

if(!isset($_SESSION['username'])){
    $_SESSION['warning'] = 'Silahkan login!';
    header("Location: ".$addr_root."index.php");
    exit();
}

// $inactive = 6;
// echo $sessionTTL = time() - $_SESSION['timeout'];
// if ($sessionTTL > $inactive) {
//     header("Location: logout.php");
// }

?>