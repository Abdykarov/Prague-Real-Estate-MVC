<?php
/*
* PDO Database Class
* Connect to Database
* Create prepared statement
* Bind Values
* Return rows and results
*/
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $charset = DB_CHARSET;
    private $dbname = DB_NAME;
    private $dbh;
    private $stmt;
    private $error;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        // Set DSN
        $dsn='mysql:host=' . $this->host . ';charset=' . $this->charset . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_LOWER
            );

        //Create PDO Instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            Core::deb($this->error);
        }   
    }
    
    /**
     * makeCamelCase
     * Allows query to have capital letters
     * @return void
     */
    public function makeCamelCase(){
        $this->dbh->setAttribute( PDO::ATTR_CASE, PDO::CASE_NATURAL );
    }

    /**
     * query
     * Prepare query for executement
     * @param  mixed $sql
     * @return void
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    
    /**
     * getStmt
     * Returns stmt
     * @return void
     */
    public function getStmt(){
        return $this->stmt;
    }

    /**
     * bind - binds values, prevents sql injection
     *
     * @param  mixed $param
     * @param  mixed $value
     * @param  mixed $type
     * @return void
     */
    public function bind($param, $value, $type = null)
    {
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * execute
     * Execute the prepared statement    
     * @return void
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * resultSet
     * Get result set as array of objects
     * @return void
     */
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll();
    }

    /**
     * single
     * Get single record as object    
     * @return void
     */
    public function single(){
        $this->execute();
        return $this->stmt->fetch();
    }
    
        
    /**
     * rowCount
     *
     * @return void
     */
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}
