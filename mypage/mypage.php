<input type="button" onClick="location.href='http://192.168.33.10:3000/index.php'" value="みんなの投稿"><br><br>

<?php
session_start();
//var_dump($_SESSION);die;
if(! isset($_SESSION['id']))
{
      print'ログインされていません。<br />';
      print'<a href="../login/">login</a>';
      exit();
} else {

    require_once('config.php');

    $dbh=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql='SELECT * FROM mypage WHERE id=?';
    $stmt=$dbh->prepare($sql);
    $stmt->execute([$_SESSION['id']]);
    $dbh=null;
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    echo $rec["name"]."さん、ようこそ";
}
?>
