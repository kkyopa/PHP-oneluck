<?php
session_start();
if(isset($_SESSION['login'])==false)
{
      print'ログインされていません。<br />';
      print'<a href="../login/login_new.html">signup</a>';
      exit();
}
 ?>
