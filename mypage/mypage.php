<?php
$name = $_POST['note'];
require_once('sign_up.html');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
$sql = "INSERT INTO mypage (name),(password) VALUES ('" . $name . "')";
error_log("sql=" . $sql);
$stm = $pdo->prepare($sql);
$stm->execute();
$id = $pdo->lastInsertId();


if (!empty($_POST['tmp_file_path'])) {
    $tmp_file_path = $_POST['tmp_file_path'];
    $arr = explode('.', $tmp_file_path);
    $ext = end($arr);
    $fname = $id . '.' . $ext;
    rename($tmp_file_path, './images/' . $fname);
    $sql = "UPDATE lucks set attach_filename = '" . $fname . "' WHERE id = ".$id;
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
  <input type="button" onClick="location.href='http://192.168.33.10:3000/index.php'" value="みんなの投稿">
  <input type="button" onClick="location.href='http://192.168.33.10:3000/new.php'" value="一日一善の投稿">
<a href="/">もどる</a>
</body>

</html>
