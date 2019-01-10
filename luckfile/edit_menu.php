<?php
require_once('../config.php');
require_once('lib/smarty/Smarty.class.php');
$db = new PDO('mysql:host=localhost;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
$stt = $db->prepare('SELECT * FROM lucks WHERE id=:id');
$stt->bindParam(':id', $_GET['id']);
$stt->execute();
$results = $stt->fetchAll();
if(empty($results)) {
    header('Location:http://192.168.33.10:3000/luckfile/index.php');
    exit();
}
$record = $results[0];
$smarty = new Smarty();
$smarty->template_dir = '../templates/';
$smarty->compile_dir  = '../templates_c/';
$smarty->config_dir   = '../configs/';
$smarty->cache_dir    = '../cache/';
$smarty->assign("id", $record['id']);
$smarty->assign("content", $record['content']);
$smarty->display('edit.tpl');
