<?php

/**
 * Category model - methods connected with categories 
 */
class Category{

    public $posts;
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
     * getCategoryById
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function getCategoryById($categoryId){
        $category = null;
        $selfCategorySql = "SELECT * FROM categories WHERE CategoryId=$categoryId";
        $response = $this->db->executeStatement($selfCategorySql);

        if(mysqli_num_rows($response) > 0){
            while($row = $response->fetch_assoc()){
                $category = $row;
            }
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
    
    /**
     * getChildForCategory
     *
     * @param  mixed $category
     * @return void
     */
    public function getChildForCategory($category){

        $childCategory = array();
        $sqlChildCats = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE ParentCategoryId=$category";
    
        $response = $this->db->executeStatement($sqlChildCats);
        
        if (mysqli_num_rows($response) > 0) {
            while($row = $response->fetch_assoc()) {

                $categoryPosts = $this->getChildForCategory($row['CategoryId']);

                if($categoryPosts){
                    $row["ChildrenCategories"] = $categoryPosts;    
                }
                
                array_push($childCategory, $row);
            }

        }

        return $childCategory;
    }

    
    /**
     * getAllCategories
     *
     * @param  mixed $id
     * @return void
     */
    public function getAllCategories($id = 0){
        
        $categories = array();

        $sqlMainCats = "SELECT CategoryId, ParentCategoryId, CategoryName, CategoryImage  FROM categories WHERE ParentCategoryId=$id";
    
        $response = $this->db->executeStatement($sqlMainCats);
        
        if (mysqli_num_rows($response) > 0) {
            // output data of each row
            while($row = $response->fetch_assoc()) {

                $childCategory = $this->getChildForCategory($row['CategoryId']);
                
                if($childCategory){
                    $row['ChildrenCategories'] = $childCategory;
                }
                
                array_push($categories, $row);
            }
        } 
        
        // Core::deb($categories);
        return $categories;
    }
    
    /**
     * getMainCategories
     *
     * @param  mixed $id
     * @return void
     */
    public function getMainCategories($id = 0){
        
        $categories = array();
        $sqlMainCats = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE ParentCategoryId=$id";
    
        $response = $this->db->executeStatement($sqlMainCats);

        if (mysqli_num_rows($response) > 0) {
            // output data of each row
            while($row = $response->fetch_assoc()) {

                array_push($categories, $row);
            
            }
        } 
        
        // Core::deb($categories);
        return $categories;
    }

    
    /**
     * getChildCategory
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function getChildCategory($categoryId){

        $childCategories = array();

        $sql = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE ParentCategoryId=$categoryId";
        
        $response = $this->db->executeStatement($sql);

        if (mysqli_num_rows($response) > 0) {
            // output data of each row
            while($row = $response->fetch_assoc()) {

                
                
                array_push($childCategories, $row);
            
            }
        }
        return $childCategories;
    }
    
    /**
     * getCategoryName
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function getCategoryName($categoryId){

        $sql = "SELECT CategoryName FROM categories WHERE CategoryId=$categoryId";
    
        $response = $this->db->executeStatement($sql);

        if (mysqli_num_rows($response) > 0){
            while($row = $response->fetch_assoc()){
                return $row['CategoryName'];
            }
        }
        
    }

        
    /**
     * categoryHasChild
     *
     * @param  mixed $categoryId
     * @return void
     */
    public function categoryHasChild($categoryId){
        $sql = "SELECT CategoryId, ParentCategoryId, CategoryName FROM categories WHERE ParentCategoryId=$categoryId";
    
        $response = $this->db->executeStatement($sql);
        
        if (mysqli_num_rows($response) > 0) {
            return 1;
        }
        else{
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

                            array_push($posts,$childCategoryPost);
                        
                        }         
                     }
                }
                else{
                    $childCategoryPosts = $this->posts->getPostsByCategoryId($category['CategoryId']);

                    foreach($childCategoryPosts as $childCategoryPost){

                        array_push($posts,$childCategoryPost);
                    
                    }
                }
            }
        }
        else{
            $posts = $this->posts->getPostsByCategoryId($categoryId);
        }
        return $posts;
    }
}


