<input type="button" onClick="location.href='http://192.168.33.10:3000/luckfile/index.php'" value="みんなの投稿">
<?php
$name = $_POST['note'];
echo $name;
$is_file_upload = false;
//ファイルの保存先
$tmp_upload_path = './images/'.$_FILES['file_upload']['name'];
//アップロードが正しく完了したかチェック
if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $tmp_upload_path)){
    echo 'アップロード完了';
    $is_file_upload = true;
}else{
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
$smarty->assign('line',"===================");
$smarty->assign('upload', $is_file_upload);
$smarty->assign('image', $tmp_upload_path);
$smarty->display('confime.tpl');
