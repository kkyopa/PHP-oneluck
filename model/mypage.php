<?php
class Mypage
{
    private $db;
    function __construct()
    {
      require_once('../config.php');
      $pdo = new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
    }

    public function getIndexByName($record, $session_id);
    {
        $sql='SELECT name FROM mypage WHERE id=?';
        $stmt=$this->db->prepare($sql);
        $params = $session_id;
        $stmt->execute($params);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }

    public function addMypageByUser($name, $email, $pass);
    {
        $sql = "INSERT INTO mypage (name, email, password) VALUES ('" . $name . "', '" . $email . "', '" . $pass . "')";
        error_log("sql=" . $sql);
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $this->db->lastInsertId();
    }

    public function loginMypageByUser($mypage_email, $mypage_pass);
    {
        $sql='SELECT * FROM mypage WHERE email=? AND password=?';
        $stmt=$this->db->prepare($sql);
        $data[]=$mypage_email;
        $data[]=$mypage_pass;
        $stmt->execute($data);
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        return $rec;
    }

    public function getMypageByUsers($rec, $session_id);
    {
        $sql='SELECT * FROM mypage WHERE id=?';
        $stmt=$this->db->prepare($sql);
        $stmt->execute($session_id);
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        return $rec;
    }

    public function addMypageByImage($id, $fname);
    {
        $sql = "UPDATE mypage set attach_filename = '" . $fname . "' WHERE id = " .$id;
        error_log("sql=" . $sql);
        $stm = $this->db->prepare($sql);
        $stm->execute();
    }
}
