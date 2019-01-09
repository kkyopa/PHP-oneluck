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
        require_once("model/mypage.php");
        $dbh=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $mypage = new Mypage();
        $record = $mypage->getIndexByName($name);
        echo $record["name"] . "さん、ログイン中";
        echo '<a href="/login/logout.php">ログアウト</a>';
     } else { ?>
    <a href="/login/">ログイン</a>
    <a href="/login/sign_up.php">サインアップ</a>

    <?php } ?>
    <input type="button" onClick="location.href='http://192.168.33.10:3000/luckfile/new.php'" value="一日一善の投稿">
    <input type="button" onClick="location.href='http://192.168.33.10:3000/mypage/mypage.php'" value="マイページ">
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


//echo "<pre>";
//var_dump($record_list);die;
//echo "</pre>”;

    $smarty = new Smarty();
    $smarty->template_dir = '../templates/';
    $smarty->compile_dir  = '../templates_c/';
    $smarty->config_dir   = '../configs/';
    $smarty->cache_dir    = '../cache/';
$smarty->assign('indexdata', $record_list);

$smarty->display('index.tpl');

?>
  </body>
</html>
