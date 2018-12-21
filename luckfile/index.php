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
    require_once('lib/smarty/Smarty.class.php');
    $pdo=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
    $sql = "SELECT * FROM lucks";
    error_log("sql=" . $sql);
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $record_list = $stm->fetchAll();


    $record_list = $results[0];


    $smarty = new Smarty();
    $smarty->template_dir = '../templates/';
    $smarty->compile_dir  = '../templates_c/';
    $smarty->config_dir   = '../configs/';
    $smarty->cache_dir    = '../cache/';




    $smarty->assign("id", $record_list['id']);
    $smarty->assign("content", $record_list['content']);
    if ($record_list['attach_filename']) {
        echo "<td><img src='./images/" . $record_list['attach_filename'] . "'/></td>";
    } else {
        echo "<td>no image</td>";
    }
    $smarty->display('index.tpl');


  </body>
</html>
