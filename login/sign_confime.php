<h3>本文</h3>
<?php
  $name = $_POST['note'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
?>


<?php
  $is_file_upload = false;
  //ファイルの保存先
  $tmp_upload_path = './mypage_images/'.$_FILES['file_upload']['name'];
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

  <?php echo $name?><br>
  <?php echo $email?><br>
  <?php echo "あなたが決めたパスワード" ?><br>

  <?php
    echo $line;
  ?><br>

  <?php echo "こちらの内容で間違いないですか？" ?><br><br>

  <form action="/sign_register.php" method="post">
    <input type="hidden" name="note" value="<?php echo $name; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="pass" value="<?php echo $pass; ?>">


    <?php
    if ($is_file_upload) {
    ?>
    <input type="hidden" name="tmp_file_path" value="<?php echo $tmp_upload_path; ?>">
    <img src="<?php echo $tmp_upload_path; ?>"/>
    <?php
    }
    ?>
    <input type="submit" value="登録する">
    <input type="button" onClick="location.href='http://192.168.33.10:3000/login/sign_up.php'" value="戻る">
  </form>
  </body>
</html>
