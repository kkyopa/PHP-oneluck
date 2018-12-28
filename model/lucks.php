<?php
 require_once("config.php");

 class Luck {
     private $db;
     function __construct() {
         $user = root;
         $password = hoge;
         $dbname = 'one_luck';
         $host = 'localhost';
         $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
         $this->db = new PDO($dsn, $user, $password);
        }

     public function getLuckByContent($name){
         $sql = "INSERT INTO lucks (content) VALUES ('" . $name . "')";
         error_log("sql=" . $sql);
         $stm = $this->db->prepare($sql);
         $stm->execute();
      // $id = $pdo->lastInsertId();
         return $this->db->lastInsertId();
        }

     public function getLuckByImage($fname){
          $sql = "UPDATE lucks set attach_filename = '" . $fname . "' WHERE id = ".$id;
          error_log("sql=" . $sql);
          $stm = $this->db->prepare($sql);
          $stm->execute();
          return $this->db->lastInsertId();
        }

     public function getLuckByAll($id,$content,$attach_filename,$deleted_at){
          $sql = "SELECT * FROM lucks";
          error_log("sql=" . $sql);
          $stm = $this->db->prepare($sql);
          $stm->execute();
          $record_list = $stm->fetchAll();
          return $record_list;
        }
}
