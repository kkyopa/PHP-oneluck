<?php
class Mypage
{
    private $db;
    function __construct()
    {
        $user = root;
        $password = hoge;
        $dbname = 'one_luck';
        $host = 'localhost';
        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
        $this->db = new PDO($dsn, $user, $password);
    }

    public function getIndexByName($name)
    {
        $sql='SELECT name FROM mypage WHERE id=?';
        $stmt=$this->db->prepare($sql);
        $params = [$_SESSION['id']];
        $stmt->execute($params);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }

    public function addMypageByUser($name,$email,$pass)
    {
        $sql = "INSERT INTO mypage (name, email, password) VALUES ('" . $name . "', '" . $email . "', '" . $pass . "')";
        error_log("sql=" . $sql);
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $this->db->lastInsertId();
    }

    public function loginMypageByUser($mypage_email,$mypage_pass)
    {
        $sql='SELECT * FROM mypage WHERE email=? AND password=?';
        $stmt=$this->db->prepare($sql);
        $data[]=$mypage_email;
        $data[]=$mypage_pass;
        $stmt->execute($data);
        $this->db=null;
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        return $rec;
    }

    public function getMypageByUsers($name)
    {
        $sql='SELECT * FROM mypage WHERE id=?';
        $stmt=$this->db->prepare($sql);
        $stmt->execute([$_SESSION['id']]);
        $this->db=null;
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        return $rec;
    }

    public function addMypageByImage($id,$fname)
    {
        $sql = "UPDATE mypage set attach_filename = '" . $fname . "' WHERE id = " .$id;
        error_log("sql=" . $sql);
        $stm = $this->db->prepare($sql);
        $stm->execute();
    }
}
