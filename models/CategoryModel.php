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
     * Assigns a database to local object
     * @param  mixed $db
     * @return void
     */
    public function initDatabase($db){
        $this->db = $db;
    }
    
    /**
     * initPostModel
     * Assigns a postmodel and db to local objects
     * @param  mixed $postModel
     * @param  mixed $db
     * @return void
     */
    public function initPostModel($postModel, $db){  
        $this->db = $db;
        $this->postModel = $postModel;
        $this->postModel->initDatabase($this->db);
    }

    /**
     * getCategoryById
     * Finds category by category id and returns category to controller
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
     * Finds all parent categories of category and returns them to the controller
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
    
    /**
     * getBreadcrumbsByPostId
     * Finds all parent categories of category by post id and returns them to the controller
     * @param  mixed $postId
     * @return void
     */
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
    
        
    /**
     * getGrandChildrensForCategory
     * Finds child categories by category id and returns them
     * @param  mixed $categoryId
     * @return void
     */
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
     * Finds child categories by category id and returns them
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
     * Finds all categories and returns them
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
     * Finds main categories and returns them
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
     * Finds child categories by category id and returns them
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
     * Finds category name by category id and returns them
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
     * Checks if category has child or not
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
     * categoryHasParent
     * Checks if category has parent category or not
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
     * Get all posts by category id including child posts
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
    
    /**
     * createCategory
     * Insert new category into db
     * @param  mixed $data
     * @return void
     */
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


