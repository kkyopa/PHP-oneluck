<?php
require_once('../config.php');
$db = new PDO('mysql:host=localhost;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
$stt = $db->prepare('DELETE FROM lucks WHERE id=:id');
$stt->bindParam(':id', $_POST['id']);
$stt->execute();
header('Location:http://192.168.33.10:3000/luckfile/index.php');
