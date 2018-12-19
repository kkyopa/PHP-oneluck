<?php

class mypage {
  private $db;
  function __construct() {
    $user = root;
    $password = hoge;
    $dbname = 'one_luck';
    $host = 'localhost';
    $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
    $this->db = new PDO($dsn, $user, $password);
}





 ?>
