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


    public function getMypageByName($name){
      $sql='SELECT name FROM mypage WHERE id=?';
      $stmt=$dbh->prepare($sql);
      $params = [$_SESSION['id']];
      $stmt->execute($params);
      $record = $stmt->fetch(PDO::FETCH_ASSOC);
      return $record;
    }

    public function getMypageByUser($name){
      $sql = "INSERT INTO mypage (name, email, password) VALUES ('" . $name . "', '" . $email . "', '" . $pass . "')";
      error_log("sql=" . $sql);
      $stm = $pdo->prepare($sql);
      $stm->execute();
      // $id = $pdo->lastInsertId();
      return $this->db->lastInsertId();
    }

    public function getMypageByUser($name){
      $sql='SELECT * FROM mypage WHERE email=? AND password=?';
      $stmt=$dbh->prepare($sql);
      $data[]=$mypage_email;
      $data[]=$mypage_pass;
      $stmt->execute($data);
      $dbh=null;
      $rec=$stmt->fetch(PDO::FETCH_ASSOC);
      return $rec;
    }
}
 ?>
