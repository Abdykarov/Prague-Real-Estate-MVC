<?php

/**
 * Category model - methods connected with categories 
 */
class Category{

    public $posts;
    private $db;
    public $postModel;

    /**
     * initDatabase
     *
     * @param  mixed $db
     * @return void
     */
    public function initDatabase($db){
        $this->db = $db;
    }

    public function initPostModel($postModel, $db){  
        $this->db = $db;
        $this->postModel = $postModel;
        $this->postModel->initDatabase($this->db);
    }

    /**
     * getCategoryById
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function getCategoryById($categoryId){
        $category = null;
        $sql = "SELECT * FROM categories WHERE CategoryId = :categoryId";
      
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $this->db->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $category = $row;
        }

        return $category;
    }
    
    /**
     * getBreadcrumbs
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function getBreadcrumbs($categoryId){
        $breadcrumbs = array();
        $category = $this->getCategoryById($categoryId);
        $currentCategory = $category;

        while(True){
            if($currentCategory['ParentCategoryId'] == 0){
                array_push($breadcrumbs, $currentCategory);
                break;
            }
            else{
                array_push($breadcrumbs, $currentCategory);
                $currentCategory = $this->getCategoryById($currentCategory['ParentCategoryId']);
            }
        }
        $breadcrumbs = array_reverse($breadcrumbs);

        return $breadcrumbs;
    }

    public function getBreadcrumbsByPostId($postId){
        $breadcrumbs = array();
        $post = $this->postModel->getPostById($postId);
        $category = $this->getCategoryById($post[0]['CategoryId']);
        $currentCategory = $category;

        while(True){
            if($currentCategory['ParentCategoryId'] == 0){
                array_push($breadcrumbs, $currentCategory);
                break;
            }
            else{
                array_push($breadcrumbs, $currentCategory);
                $currentCategory = $this->getCategoryById($currentCategory['ParentCategoryId']);
            }
        }
        $breadcrumbs = array_reverse($breadcrumbs);

        return $breadcrumbs;
    }
    
    
    public function getGrandChildrensForCategory($categoryId){
        $categories = array();
        $sql = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE ParentCategoryId = :categoryId";
      
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $this->db->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $posts = $this->postModel->getPostsCountByCategoryId($row['CategoryId']);

                if($posts){
                    $row["PostsCount"] = $posts;    
                }
                array_push($categories, $row);
            }

        return $categories;
    }

    /**
     * getChildForCategory
     *
     * @param  mixed $category
     * @return void
     */
    public function getChildForCategory($categoryId){
        $categories = array();
        $sql = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE ParentCategoryId = :categoryId";
      
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $this->db->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categoryPosts = $this->getGrandChildrensForCategory($row['CategoryId']);

                if($categoryPosts){
                    $row["ChildrenCategories"] = $categoryPosts;    
                }
                array_push($categories, $row);
            }

        return $categories;
    }

    
    /**
     * getAllCategories
     *
     * @param  mixed $id
     * @return void
     */
    public function getAllCategories($id = 0){
        $categories = array();
        $sql = "SELECT CategoryId, ParentCategoryId, CategoryName, CategoryImage  FROM categories WHERE ParentCategoryId = :categoryId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$id);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $childCategory = $this->getChildForCategory($row['CategoryId']);

            if($childCategory){
                $row['ChildrenCategories'] = $childCategory;
            }
            array_push($categories, $row);
        }
       
        return $categories;
    }
    
    /**
     * getMainCategories
     *
     * @param  mixed $id
     * @return void
     */
    public function getMainCategories($categoryId = 0){

        $categories = array();
        $sql = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE ParentCategoryId= :categoryId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($categories, $row);
        }
       
        return $categories;
    }

    
    /**
     * getChildCategory
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function getChildCategory($categoryId){

        $categories = array();
        $sql = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE ParentCategoryId= :categoryId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($categories, $row);
        }
       
        return $categories;
    }
    
    /**
     * getCategoryName
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function getCategoryName($categoryId){

        $sql = "SELECT CategoryName FROM categories WHERE CategoryId= :categoryId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row['CategoryName'];
        }
       

    }

        
    /**
     * categoryHasChild
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function categoryHasChild($categoryId){
        $sql = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE ParentCategoryId = :categoryId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $response = $this->db->single();

        if($response){
            return 1;
        }
        else{
            return 0;
        }
        
    }

    /**
     * categoryHasChild
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function categoryHasParent($categoryId){
        $sql = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE CategoryId = :categoryId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':categoryId',$categoryId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($row['ParentCategoryId'] != 0){
                return True;
            }
            else{
                return False;
            }
        }
        
    }
    
    /**
     * getPosts
     *
     * @param  mixed $categoryId
     * @param  mixed $post
     * @return void
     */
    public function getPosts($categoryId,$post){
        $this->posts = $post;
        $childCategories = $this->getChildCategory($categoryId);

        if($childCategories){
            $posts = array();

            foreach($childCategories as $category){
                $grandCategories = $this->getChildCategory($category['CategoryId']);

                if($grandCategories){
                    foreach($grandCategories as $childCategory){
                        $childCategoryPosts = $this->posts->getPostsByCategoryId($childCategory['CategoryId']);
                        foreach($childCategoryPosts as $childCategoryPost){
                            array_push( $posts, $childCategoryPost );
                        }         
                    }
                }
                else{
                    $childCategoryPosts = $this->posts->getPostsByCategoryId($category['CategoryId']);
                    foreach($childCategoryPosts as $childCategoryPost){
                        array_push( $posts, $childCategoryPost );
                    }
                }
            }
        }
        else{
            $posts = $this->posts->getPostsByCategoryId($categoryId);
        }
        return $posts;
    }

    public function createCategory($data){

        $sql = "INSERT INTO categories (CategoryName, ParentCategoryId, CategoryImage) VALUES ( :categoryName, :parentId, :categoryImage )";
        $this->db->query($sql);
        $this->db->bind(':categoryName', $data['CategoryName']);
        $this->db->bind(':parentId', $data['ParentCategoryId']);
        $this->db->bind(':categoryImage', $data['CategoryImage']);

         // Execute
         if ( $this->db->execute() ) {
            return 1;
        } else {
            return 0;
        }
    }


}


