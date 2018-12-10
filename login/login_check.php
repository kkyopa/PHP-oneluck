<?php
try
{
$mypage_name=$_POST['name'];
$mypage_email=$_POST['email'];
$mypage_pass=$_POST['pass'];

$mypage_name=htmlspecialchars($mypage_name,ENT_QUOTES,'UTF-8');
$mypage_email=htmlspecialchars($mypage_email,ENT_QUOTES,'UTF-8');
$mypage_pass=htmlspecialchars($mypage_pass,ENT_QUOTES,'UTF-8');


$mypage_pass=md5($mypage_pass);
$dsn='mysql:dbname=  one_luck;host=localhost;charset=utf8';
$user='root';
$password='hoge';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql='SELECT name FROM mypage WHERE email=? AND password=?';
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
	header('Location:sign_up.php');
	exit();
}
}

?>
