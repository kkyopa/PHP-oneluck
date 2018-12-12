<?php


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

    $dbh=new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql='SELECT * FROM mypage WHERE email=? AND password=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$mypage_email;
    $data[]=$mypage_pass;
    $stmt->execute($data);
    $dbh=null;
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false)
    {
        print 'メールアドレスかパスワードが間違っています。<br />';
        print '<a href="login_new.html"> 戻る</a>';
    }
    else
    {
        session_start();
        $_SESSION['login']=1;
        $_SESSION['id']=$rec['id'];
        $_SESSION['mypage_email']=$rec['email'];
        $_SESSION['mypage_pass']=$rec['pass'];
        header('Location: /mypage/mypage.php');
        exit();
    }
} catch (Exception $e) {

}

?>
