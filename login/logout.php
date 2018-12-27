<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])==true)
{
  setcookie(session_name(),'',time()-42000, '/');
}
session_destroy();


require_once('../config.php');
require_once('lib/smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '../templates/';
$smarty->compile_dir  = '../templates_c/';
$smarty->config_dir   = '../configs/';
$smarty->cache_dir    = '../cache/';
$smarty->display('logout.tpl');

?>
