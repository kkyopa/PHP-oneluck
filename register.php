<?php
$name = $_POST['note'];
require_once('config.php');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
$sql = "INSERT INTO lucks (content) VALUES ('" . $name . "')";
error_log("sql=" . $sql);
$stm = $pdo->prepare($sql);
$stm->execute();

// 好みで location で リダイレクト
?>

<!DOCTYPE html>
<html>
<head>
    <title>みんなの投稿</title>
    <meta charset="utf-8">
</head>
<body>
  <h1>登録が完了しました。</h1>
<a href="/">もどる</a>
</body>

</html>
