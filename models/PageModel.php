<?php

class Page {
    private $db;

    /**
     * initDatabase
     *
     * @param  mixed $db
     * @return void
     */
    public function initDatabase($db){
        $this->db = $db;
    }

    public function getAllPages(){

        $pages = array();
        $sql = "SELECT * FROM pages";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($pages, $row);
        }
        return $pages;
    }

}