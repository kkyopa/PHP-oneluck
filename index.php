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
    <?php //echo $name; ?>


    <?php
    $password = 'hoge';
    $pdo=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', $password);
    $sql = "SELECT * FROM lucks";
    error_log("sql=" . $sql);
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $record_list = $stm->fetchAll();

    echo "<table border='1'>";
    foreach($record_list as $record) {
        echo "<tr>";
        echo "<td>" . $record['id'] . "</td>";
        echo "<td>" . $record['content'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>

  </body>
</html>
