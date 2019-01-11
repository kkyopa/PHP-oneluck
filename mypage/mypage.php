<p><input type="button" onClick="location.href='http://192.168.33.10:3000/luckfile/index.php'" value="みんなの投稿"></p>
<?php
require_once('../config.php');
session_start();
if (! isset($_SESSION['id'])) {
    print'ログインされていません。<br />';
    print'<a href="../login/">login</a>';
    exit();
} else {
    require_once('../config.php');
    require_once('model/mypage.php');
    $dbh=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $mypage = new Mypage();
    $rec = $mypage->getMypageByUsers($name);
    echo $rec["name"]. "さん、ようこそ<br>";
    echo "メールアドレス". $rec["email"];
    echo "<br>";
    echo "プロフィール画像";
    echo "<br>";

    if ($rec['attach_filename']) {
        echo "<td><img src='../login/mypage_images/" . $rec['attach_filename'] . "'/></td>";
    } else {
        echo "<td>no image</td>";
    }
}
