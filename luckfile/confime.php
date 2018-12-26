
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
?>


<!DOCTYPE html>
<html>
  <head>
    <title>確認画面</title>
    <meta charset="utf-8">
  </head>
<body>
  <h1>確認画面</h1>
  <?php
    $line = "===================";
    echo $line;
  ?><br>

  <?php echo $name."でよろしいですか？";?>
  <br>
  <?php
  echo $line;
  ?>

  <form action="/luckfile/register.php" method="post">
    <input type="hidden" name="note" value="{$name}">
    <?php
    if ($is_file_upload) {
    ?>
    <input type="hidden" name="tmp_file_path" value="{$tmp_upload_path}">
    <img src="<?php echo $tmp_upload_path; ?>"/>
    <?php
    }
    ?>
    <input type="submit" value="登録する">
    <input type="button" onClick="location.href='http://192.168.33.10:3000/luckfile/new.php'" value="戻る">
  </form>


<?php


  $smarty = new Smarty();
  require_once('lib/smarty/Smarty.class.php');
  $smarty->template_dir = '../templates/';
  $smarty->compile_dir  = '../templates_c/';
  $smarty->config_dir   = '../configs/';
  $smarty->cache_dir    = '../cache/';
  $smarty->assign('note', $name);
    $smarty->assign('image', $$is_file_upload);
    $smarty->assign('line', $line);
    $smarty->assign("gazou", $tmp_upload_path);
  $smarty->display('confime.tpl');

?>

  </body>
</html>
