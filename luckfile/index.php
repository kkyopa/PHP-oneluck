<!DOCTYPE html>
<html>
　<head>
　  <title>みんなの投稿</title>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
    session_start();
    if ($_SESSION['id']) {
        require_once('../config.php');

        $dbh=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='SELECT name FROM mypage WHERE id=?';
        $stmt=$dbh->prepare($sql);
        $params = [$_SESSION['id']];
        $stmt->execute($params);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $record["name"] . "さん、ログイン中";

        echo '<a href="/login/logout.php">ログアウト</a>';
     } else { ?>
    <a href="/login/">ログイン</a>
    <a href="/login/sign_up.php">サインアップ</a>

    <?php } ?>
    <input type="button" onClick="location.href='http://192.168.33.10:3000/luckfile/new.php'" value="一日一善の投稿">
    <h1>みんなの一日一善</h1>

    <?php

    require_once('../config.php');

    $pdo=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
    $sql = "SELECT * FROM lucks";
    error_log("sql=" . $sql);
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $record_list = $stm->fetchAll();




    echo "<table border='10'>";
    foreach($record_list as $record) {
        echo "<tr>";
        echo "<td>" . $record['id'] . "</td>";
        echo "<td>" . $record['content'] . "</td>";
        if ($record['attach_filename']) {
            echo "<td><img src='./images/" . $record['attach_filename'] . "'/></td>";
        } else {
            echo "<td>no image</td>";
        }

       print('<td><form method="POST" action="delete.php">');
       print('<input type="hidden" name="id" value="'.htmlspecialchars($record['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8').'">');
       print('<input type="submit" value="削除"></form></td>');

       print('<td>');
       echo '<a href="/luckfile/edit_menu.php?id='.$record['id'].'">編集</a>';
       print('</td>');
       print('<td>');
       echo '<a href="/luckfile/show.php?id='.$record['id'].'">詳細</a>';
       echo "</td></tr>";
    }
    echo "</table>";
    ?>
  </body>
</html>
