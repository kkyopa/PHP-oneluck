<?
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])==true
{
  setcookie(session_name(),'',time()-42000, '/');
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>one_luck</title>
</head>
<body>
  <p>ログアウトしました</p>
  <a href="/">もどる</a>
</body>
</html>
