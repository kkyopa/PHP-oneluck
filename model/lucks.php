<?php
 require_once("../config.php");
 class Luck
 {
    private $db;
    function __construct()
    {
        require_once('../config.php');
        $this->db = new PDO('mysql:host=127.0.0.1;dbname=one_luck;charset=utf8', 'root', DB_PASSWORD);
    }

    public function addContent($name)
    {
        $sql = "INSERT INTO lucks (content) VALUES ('" . $name . "')";
        error_log("sql=" . $sql);
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $this->db->lastInsertId();
    }

    public function updateImage($id, $fname)
    {
        $sql = "UPDATE lucks set attach_filename = '" . $fname . "' WHERE id = " .$id;
        error_log("sql=" . $sql);
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $this->db->lastInsertId();
    }

    public function getLuckByAll($id)
    {
        $sql = "SELECT * FROM lucks";
        error_log("sql=" . $sql);
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $record_list = $stm->fetchAll();
        return $record_list;
    }
}
