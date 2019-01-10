<?php
require_once('../config.php');
session_start();
try

{
    $mypage_name=$_POST['name'];
    $mypage_email=$_POST['email'];
    $mypage_pass=$_POST['pass'];
    $mypage_name=htmlspecialchars($mypage_name,ENT_QUOTES,'UTF-8');
    $mypage_email=htmlspecialchars($mypage_email,ENT_QUOTES,'UTF-8');
    $mypage_pass=htmlspecialchars($mypage_pass,ENT_QUOTES,'UTF-8');
    require_once('../config.php');
    require_once("model/mypage.php");
    $dbh=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $mypage = new Mypage();
    $rec = $mypage->loginMypageByUser($mypage_email,$mypage_pass);
    if ($rec==false) {
        print 'メールアドレスかパスワードが間違っています。<br />';
        print '<a href="/login/index.html"> 戻る</a>';
    }
    else
    {
        session_start();
        $_SESSION['id']=$rec['id'];
        header('Location: /mypage/mypage.php');
        exit();
    }
} catch (Exception $e) {

}
