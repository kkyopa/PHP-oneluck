<?php
require_once('../config.php');
require_once("model/mypage.php");
$name = $_POST['note'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pdo = new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
$mypage = new Mypage();
$mypages = $mypage->addMypageByUser($name,$email,$pass);

if (!empty($_POST['tmp_file_path'])) {
    $tmp_file_path = $_POST['tmp_file_path'];
    $arr = explode('.', $tmp_file_path);
    $ext = end($arr);
    $fname = $id . '.' . $ext;
    rename($tmp_file_path, './mypage_images/' . $fname);
    $sql = "UPDATE mypage set attach_filename = '" . $fname . "' WHERE id = ".$id;
    error_log("sql=" . $sql);
    $stm = $pdo->prepare($sql);
    $stm->execute();
      // $mypages = $mypage->getMypageByImage($fname);
}


require_once('../config.php');
require_once('lib/smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '../templates/';
$smarty->compile_dir  = '../templates_c/';
$smarty->config_dir   = '../configs/';
$smarty->cache_dir    = '../cache/';
$smarty->display('sign_register.tpl');
// 好みで location で リダイレクト
?>
