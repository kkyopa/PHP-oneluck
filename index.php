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
    $pdo=new PDO('mysql:host=127.0.0.1;dbname=mysql;charset=utf8', 'root', 'hoge');
    $sql = "INSERT INTO lucks (id,content) VALUES (:1,:name)";
    $sql = "SELECT * FROM lucks";

    var_dump($pdo);

    ?>
    <?php
    //try {
    //  $sql =
    //}
    ?>



  </body>
</html>
