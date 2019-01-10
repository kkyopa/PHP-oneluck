<h3>本文</h3>
<?php
$name = $_POST['note'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$is_file_upload = false;
$tmp_upload_path = './mypage_images/'.$_FILES['file_upload']['name'];
if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $tmp_upload_path)) {
    echo 'アップロード完了';
        $is_file_upload = true;
} else {
    echo 'アップロード失敗';
}
require_once('../config.php');
require_once('lib/smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '../templates/';
$smarty->compile_dir  = '../templates_c/';
$smarty->config_dir   = '../configs/';
$smarty->cache_dir    = '../cache/';
$smarty->assign('note', $name);
$smarty->assign('email', $email);
$smarty->assign('pass', $pass);
$smarty->assign('line',"===================");
$smarty->assign('upload', $is_file_upload);
$smarty->assign('image', $tmp_upload_path);
$smarty->display('sign_confime.tpl');
