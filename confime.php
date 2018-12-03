<input type="button" onClick="location.href='http://192.168.33.10:3000/index.php'" value="みんなの投稿">

<br> <br>
<h3>本文</h3>
<?php
  $name = $_POST['note'];
  echo $name;
?>


<?php
  //ファイルの保存先
  $upload = './images/'.$_FILES['file_upload']['name'];
  //アップロードが正しく完了したかチェック
  if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $upload)){
    echo 'アップロード完了';
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

  <?php echo $name."でよろしいですか？"; ?><br>

  <?php
    echo $line;
  ?>

  <form action="/register.php" method="post">
    <input type="hidden" name="note" value="<?php echo $name; ?>">
    <input type="submit" value="登録する">
    <input type="button" onClick="location.href='http://192.168.33.10:3000/new.php'" value="戻る">
  </form>
  </body>
</html>
