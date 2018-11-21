<input type="button" onClick="location.href='http://192.168.33.10:3000/index.php'" value="みんなの投稿">
<input type="button" onClick="location.href='http://192.168.33.10:3000/new.php'" value="一日一善の投稿">
<br> <br>
<h3>本文</h3>
<?php
  $name = $_POST['note'];
  echo $name;
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

  <form action="index.php" method="post">
    <input type="hidden" name="note" value="<?php echo $name; ?>">
    <input type="submit" value="登録する">
  </form>
  </body>
</html>
