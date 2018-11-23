<?php
$name = $_POST['note'];
$password = 'root';
$pdo = new PDO('mysql:host=127.0.0.1;dbname=SAMPLE;charset=utf8', 'root', $password);
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
<a href="/">もどる</a>
</body>

</html>
