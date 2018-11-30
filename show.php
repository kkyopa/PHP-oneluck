<input type="button" onClick="location.href='http://192.168.33.10:3000/index.php'" value="みんなの投稿">


<?php
require_once('config.php');
$db = new PDO('mysql:host=localhost;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
$stt = $db->prepare('SELECT * FROM lucks WHERE id=:id');
$stt->bindParam(':id', $_GET['id']);
$stt->execute();
$results = $stt->fetchAll();


if (empty($results)) {
    header('Location: http://192.168.33.10:3000/index.php');
    exit();
}
$record = $results[0];
?>

<!DOCTYPE html>
<html>
　<head>
    　  <title>詳細画面</title>
    <meta charset="utf-8">
</head>
<body>
<h1>詳細画面</h1>

<?php
echo "<table border='1'>";
    echo "<tr>";
        echo "<td>内容</td>";
        echo "<td><input type='text' name='content' value='" . $record['content'] . "'/></td>";
    echo "</tr>";
    echo "</table>";
?>
