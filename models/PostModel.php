<?php

class Post {
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
    
    /**
     * getPostsByCategoryId
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function getPostsByCategoryId($categoryId){
        $posts = array();

        $sql = "SELECT * FROM posts WHERE CategoryId=$categoryId";
    
        $response = $this->db->executeStatement($sql);
        // Core::deb($sql);

        if (mysqli_num_rows($response) > 0) {
            // output data of each row
            while($row = $response->fetch_assoc()) {

                array_push($posts, $row);
            
            }
        } 
        // Core::deb($posts);

        return $posts;
    }
    
    /**
     * getPostById
     *
     * @param  mixed $postId
     * @return void
     */
    public function getPostById($postId){

    }    
    
    /**
     * getPostByAuthorId
     *
     * @param  mixed $authorId
     * @return void
     */
    public function getPostByAuthorId($authorId){

    }


}