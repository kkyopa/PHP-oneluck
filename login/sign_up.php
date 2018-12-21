<?php
require_once('../config.php');
require_once('lib/smarty/Smarty.class.php');
session_start();
if (isset($_SESSION['id'])) {
header('Location: http://192.168.33.10:3000/luckfile/index.php');
  exit();
}
$smarty->display('sign_up.tpl');
?>
