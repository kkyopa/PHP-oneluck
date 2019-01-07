<?php
$name = $_POST['note'];
require_once('../config.php');
require_once("model/lucks.php");
$pdo = new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
$luck = new Luck();
$luck_name = $luck->addContent($name);

// var_dump($luck_name);die;

// $sql = "INSERT INTO lucks (content) VALUES ('" . $name . "')";
//  error_log("sql=" . $sql);
//  $stm = $pdo->prepare($sql);
//  $stm->execute();
//  $id = $pdo->lastInsertId();

if (!empty($_POST['tmp_file_path'])) {
    $tmp_file_path = $_POST['tmp_file_path'];
    $arr = explode('.', $tmp_file_path);
    $ext = end($arr);
    $fname = $id . '.' . $ext;
    rename($tmp_file_path, '../luckfile/images/' . $fname);
    // $sql = "UPDATE lucks set attach_filename = '" . $fname . "' WHERE id = ".$id;
    //  error_log("sql=" . $sql);
    //  $stm = $pdo->prepare($sql);
    //  $stm->execute();
    $luck_image = $luck->updateImage($fname);
}

// 好みで location で リダイレクト
?>

<?php
require_once('../config.php');
require_once('lib/smarty/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../templates/';
$smarty->compile_dir  = '../templates_c/';
$smarty->config_dir   = '../configs/';
$smarty->cache_dir    = '../cache/';
$smarty->display('register.tpl');
?>
