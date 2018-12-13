<?php
$name = $_POST['note'];
$email = $_POST['email'];
$pass = $_POST['pass'];
require_once('config.php');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
$sql = "INSERT INTO mypage (name) VALUES ('" . $name . "')";
$sql = "INSERT INTO mypage (email) VALUES ('" . $email . "')";
$sql = "INSERT INTO mypage (password) VALUES ('" . $pass . "')";
error_log("sql=" . $sql);
$stm = $pdo->prepare($sql);
$stm->execute();
$id = $pdo->lastInsertId();


if (!empty($_POST['tmp_file_path'])) {
    $tmp_file_path = $_POST['tmp_file_path'];
    $arr = explode('.', $tmp_file_path);
    $ext = end($arr);
    $fname = $id . '.' . $ext;
    rename($tmp_file_path, './mypage_images/' . $fname);
    $sql = "UPDATE mypage set attach_filename = '" . $fname . "' WHERE id = ".$id;
    error_log("sql=" . $sql);
    $stm = $pdo->prepare($sql);
    $stm->execute();
}

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
<input type="button" onClick="location.href='http://192.168.33.10:3000/login/index.html'" value="ログイン画面へ">
</body>
</html>
