<?php

class Post {
    private $db;
    public $catModel;

    /**
     * initDatabase
     *
     * @param  mixed $db
     * @return void
     */
    public function initDatabase($db){
        $this->db = $db;
    }
    
    public function getPostsCount(){
        $sql = "SELECT * FROM posts";
        $this->db->query($sql);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        $count = $this->db->rowCount();
        return $count;
    }

    public function getPostsCountByCategoryId($categoryId){

        $sql = "SELECT * FROM posts WHERE CategoryId = :categoryId";
        
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        $count = $this->db->rowCount();
        return $count;
    }

    public function getPostById($postId){
        $posts = array();
        $sql = "SELECT * FROM posts WHERE PostId = :postId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':postId',$postId);
        $stmt = $this->db->getStmt();
        $this->db->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($posts, $row);
        }
       
        return $posts;
        
    }


    /**
     * getPostsByCategoryId
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function getPostsByCategoryId($categoryId){
        $posts = array();
        $sql = "SELECT * FROM posts WHERE CategoryId = :categoryId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($posts, $row);
        }
       
        return $posts;
    }
    
    
    /**
     * getPostByAuthorId
     *
     * @param  mixed $authorId
     * @return void
     */
    public function getPostByAuthorId($authorId){
        $posts = array();
        $sql = "SELECT * FROM posts WHERE AuthorId = :authorId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':authorId',$authorId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($posts, $row);
        }
       
        return $posts;
    }
        
    /**
     * addPost - accept array from postController, which contains post data from user. 
     * Joins a new post to database, then returns True or False  
     * 
     * @param  mixed $data
     * @return void
     */
    public function addPost($data){

        $this->db->query('INSERT INTO posts ( 
            PostName, CategoryId, AuthorId, PostImage, PostDescription, PostArea, PostPrice, PostAddress, PostOwnership, PostCondition, PostConstruction, PostDate)
             values ( :postName, :categoryId, :authorId, :postImages, :postDesc, :postArea, :postPrice, :postAddress, :postOwner, :postCond, :postConst, :postDate )');

        // Bind values
        $name = $data['name'].' '.$data['square'].' &#13217;';

        $this->db->bind(':postName', $name);
        $this->db->bind(':postDesc', nl2br($data['desc'])); // nl2br - <br> appends automatically whenever user press enter   
        $this->db->bind(':categoryId', $data['category']);
        $this->db->bind(':authorId', $data['author']);
        $this->db->bind(':postImages', $data['images']);
        $this->db->bind(':postArea', $data['square']);
        $this->db->bind(':postPrice', $data['price']);
        $this->db->bind(':postAddress', $data['address']);
        $this->db->bind(':postOwner', $data['owner']);
        $this->db->bind(':postCond', $data['cond']);
        $this->db->bind(':postConst', $data['const']);
        $this->db->bind(':postDate', date("d.m.Y"));

        // Execute
        if ( $this->db->execute() ) {
            return 1;
        } else {
            return 0;
        }
    }



    /**
     * getPosts
     *
     * @param  mixed $categoryId
     * @param  mixed $post
     * @return void
     */
    public function getFilterPosts($categoryId, $data){
        $posts = array();

        $sql = "SELECT * FROM posts WHERE CategoryId= :categoryId";
        
        if(!empty($data['fromPrice'])){
            $sql = $sql . ' AND PostPrice >= :fromPrice';
        }
        
        if(!empty($data['toPrice'])){
            $sql = $sql . ' AND PostPrice <= :toPrice';
        }
        
        if(!empty($data['owner'])){
            $sql = $sql . ' AND PostOwnership = :postOwner';
        }
        
        if(!empty($data['cond'])){
            $sql = $sql . ' AND PostCondition = :postCond';
        }
        
        if(!empty($data['const'])){
            $sql = $sql . ' AND PostConstruction = :postConst';
        }

        if(!empty($data['sortedType'])){
            if($data['sortedType'] == 'byDateASC'){
                $sql = $sql . ' ORDER BY PostDate ASC';
            }
            elseif($data['sortedType'] == 'byDateDESC'){
                $sql = $sql . ' ORDER BY PostPrice DESC';
            }elseif($data['sortedType'] == 'byPriceASC'){
                $sql = $sql . ' ORDER BY PostPrice ASC';
            }elseif($data['sortedType'] == 'byPriceDESC'){
                $sql = $sql . ' ORDER BY PostPrice DESC';
            }
        }

        
                
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        if(!empty($data['fromPrice'])){
            $this->db->bind(':fromPrice',$data['fromPrice']);
        }
        if(!empty($data['toPrice'])){
            $this->db->bind(':toPrice',$data['toPrice']);
        }
        if(!empty($data['owner'])){
            $this->db->bind(':postOwner',$data['owner']);
        }
        if(!empty($data['cond'])){
            $this->db->bind(':postCond',$data['cond']);
        }
        if(!empty($data['const'])){
            $this->db->bind(':postConst',$data['const']);
        }
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($posts, $row);
        }
        return $posts;
    }


    public function getAllPosts(){

        $posts = array();
        $sql = "SELECT * FROM posts";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($posts, $row);
        }
        return $posts;
    }

    public function deletePost($postId){

        $sql = "DELETE FROM posts WHERE PostId = :postId";

        $this->db->query($sql);
        $this->db->bind(':postId', $postId);
        
        // Execute
          if ( $this->db->execute() ) {
            return 1;
        } else {
            return 0;
        }
    }

    public function giveVip($postId){
        $sql = "UPDATE posts SET VipStatus = '1' WHERE PostId = :postId";

        $this->db->query($sql);
        $this->db->bind(':postId', $postId);
        
        // Execute
          if ( $this->db->execute() ) {
            return 1;
        } else {
            return 0;
        }
    }
}