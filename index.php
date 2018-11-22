<?php
$name = $_POST['note'];
?>



<!DOCTYPE html>
<html>
　<head>
　  <title>みんなの投稿</title>
    <meta charset="utf-8">
  </head>
  <body>
    <input type="button" onClick="location.href='http://192.168.33.10:3000/index.php'" value="みんなの投稿">
    <input type="button" onClick="location.href='http://192.168.33.10:3000/new.php'" value="一日一善の投稿">
    <h1>みんなの一日一善</h1>
    <?php echo $name; ?>


    <?php
    $dbName = 'root';
    $host = ''
    ?>



  </body>
</html>
