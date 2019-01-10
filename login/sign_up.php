<?php
require_once('../config.php');
require_once('lib/smarty/Smarty.class.php');
session_start();
if (isset($_SESSION['id'])) {
    header('Location: http://192.168.33.10:3000/luckfile/index.php');
exit();
}
$smarty = new Smarty();
$smarty->template_dir = '../templates/';
$smarty->compile_dir  = '../templates_c/';
$smarty->config_dir   = '../configs/';
$smarty->cache_dir    = '../cache/';
$smarty->display('sign_up.tpl');
