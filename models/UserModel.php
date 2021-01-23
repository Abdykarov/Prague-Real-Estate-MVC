<?php

/**
 * User model - responsed for manipulating with user data
 */
class User{
    private $db;
    
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
     * getFirstMessageGroup
     * Returns messageGroup array by users id
     * @param  mixed $toUser
     * @param  mixed $fromUser
     * @return void
     */
    public function getFirstMessageGroup($toUser,$fromUser){
        $group = array();
        $sql = "SELECT * FROM messageGroups WHERE FromUser = :fromUser AND ToUser = :toUser";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':toUser',$toUser);
        $this->db->bind(':fromUser',$fromUser);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($group, $row);
        }
        return $group;        
    }
    
    /**
     * hasMessageGroup
     * Check if users already have message group
     * @param  mixed $data
     * @return void
     */
    public function hasMessageGroup($data){
        $test1 = $this->getFirstMessageGroup($data['postAuthorId'],$data['userId']);
        $test2 = $this->getFirstMessageGroup($data['userId'],$data['postAuthorId']);
        if($test1){
            return $test1[0];
        }else if($test2){
            return $test2[0];
        }else{
            return False;
        }
    }

    
    /**
     * registerMessage
     * Insert new message to database
     * @param  mixed $data
     * @return void
     */
    public function registerMessage($data){
        $this->db->query('INSERT INTO messages (MessageGroup, FromUser, MessageText, MessageDate) values (:messageGroup, :fromUser, :messageText, :messageDate)');
        // Bind values
        $this->db->bind(':messageGroup', $data['messageGroup']);
        $this->db->bind(':fromUser', $data['userId']);
        $this->db->bind(':messageText', $data['messageText']);
        $this->db->bind(':messageDate', $data['messageDate']);

        if ( $this->db->execute() ) {
            return True;
        }else{
            return False;
        }
    }
    
    /**
     * registerMessageGroup
     * Insert new message group to database
     * @param  mixed $data
     * @return void
     */
    public function registerMessageGroup($data){

        $this->db->query('INSERT INTO messageGroups (FromUser, ToUser, LastMessage) values (:FromUser, :ToUser, :messageDate)');
        // Bind values
        $this->db->bind(':FromUser', $data['userId']);
        $this->db->bind(':ToUser', $data['postAuthorId']);
        $this->db->bind(':messageDate', $data['messageDate']);

        // Execute
        if ( $this->db->execute() ) {
            $messageGroup = $this->getFirstMessageGroup($data['postAuthorId'],$data['userId']);
            if($messageGroup){
                $data['messageGroup'] = $messageGroup[0]['GroupId'];
                $message = $this->registerMessage($data);
                if($message){
                    return True;
                }
                else{
                    return False;
                }
            }else{
                return False;
            }
        } else {
            return False;
        }
    }    
    
    /**
     * registerUser
     * Insert new user to db
     * @param  mixed $data
     * @return void
     */
    public function registerUser($data)
    {
        $this->db->query('INSERT INTO users (Name, Surname, Phone, Email, Password) values (:name, :surname, :phone, :email, :password)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // Execute
        if ( $this->db->execute() ) {
            return 1;
        } else {
            return 0;
        }
    }
    
    /**
     * updateUser
     * Updata user data
     * @param  mixed $data
     * @return void
     */
    public function updateUser($data){

        $sql = 'UPDATE users SET Name = :userName, Phone = :userPhone, Password = :userPass WHERE Id = :userId';
        $this->db->query($sql);
        // Bind values
        $this->db->bind(':userName', $data['newName']);
        $this->db->bind(':userPhone', $data['newPhone']);
        $this->db->bind(':userPass', $data['newPass']);
        $this->db->bind(':userId', $data['userId']);


        // Execute
        if ( $this->db->execute() ) {
            return 1;
        } else {
            return 0;
        }

    }

    
    /**
     * registerAdmin
     * Insert admin data to db
     * @param  mixed $data
     * @return void
     */
    public function registerAdmin($data)
    {
        $this->db->query('INSERT INTO admin (Email, Password) values (:email, :password)');
        // Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // Execute
        if ( $this->db->execute() ) {
            return 1;
        } else {
            return 0;
        }
    }
    
        
    /**
     * getUser
     * Finds user by id and returns him to controller
     * @param  mixed $postId
     * @return void
     */
    public function getUser($postId){
        $sql = "SELECT * FROM users WHERE Id = :postId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':postId',$postId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row;
        }
    }

    /**
     * getUserByEmail
     * Finds user by email and returns him to controller
     * @param  mixed $email
     * @return void
     */
    public function getUserByEmail($email){

        $sql = "SELECT * FROM users WHERE Email = :email";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':email',$email);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row['Id'];
        }
    }
    
    /**
     * getPasswordByEmail
     * Finds password by email and returns him to controller
     * @param  mixed $email
     * @return void
     */
    public function getPasswordByEmail($email){

        $sql = "SELECT * FROM users WHERE Email = :email";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':email',$email);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row['Password'];
        }
    }
    
    /**
     * getPasswordById
     * Finds password by id and returns him to controller
     * @param  mixed $id
     * @return void
     */
    public function getPasswordById($id){

        $sql = "SELECT * FROM users WHERE Id = :id";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row['Password'];
        }
    }
    
    /**
     * getAdminPasswordByEmail
     * Finds admin password by email and returns him to controller
     * @param  mixed $email
     * @return void
     */
    public function getAdminPasswordByEmail($email){

        $sql = "SELECT * FROM admin WHERE Email = :email";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':email',$email);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row['Password'];
        }
    }
    
    /**
     * getNameByEmail
     * Finds name by email and returns him to controller
     * @param  mixed $email
     * @return void
     */
    public function getNameByEmail($email){
        $sql = "SELECT * FROM users WHERE Email = :email";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':email',$email);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row['Name'];
        }
    }
        
    /**
     * getPhoneByEmail
     * Finds phone by email and returns him to controller
     * @param  mixed $email
     * @return void
     */
    public function getPhoneByEmail($email){
        $sql = "SELECT * FROM users WHERE Email = :email";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':email',$email);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row['Phone'];
        }
    }
    
    /**
     * getMessagesGroup
     * Finds message group by user id and returns him to controller
     * @param  mixed $userId
     * @return void
     */
    public function getMessagesGroup($userId){
        $groups = array();
        $sql = "SELECT * FROM messageGroups WHERE FromUser = :userId OR ToUser = :userId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':userId',$userId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        $partner = '';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($row['FromUser'] == $userId){
                $partner = $row['ToUser'];
            }else{
                $partner = $row['FromUser'];
            }
            $row['PartnerId'] = $partner;
            $partnerArray = $this->getUser($partner);
            $row['PartnerName'] = $partnerArray['Name'];    
            $row['PartnerSurname'] = $partnerArray['Surname'];
            array_push($groups, $row);
        }
        return $groups;
    }
    
    /**
     * getMessageGroup
     * Finds message group by id and returns him to controller
     * @param  mixed $groupMessageId
     * @return void
     */
    public function getMessageGroup($groupMessageId){
        $groups = array();
        $sql = "SELECT * FROM messageGroups WHERE GroupId = :groupMessageId ";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':groupMessageId',$groupMessageId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        $partner = '';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            return $row;
        }
    }
    
    /**
     * getMessages
     * Finds all messages by message group id and returns him to controller
     * @param  mixed $messageGroupId
     * @return void
     */
    public function getMessages($messageGroupId){
        $messages = array();
        $sql = "SELECT * FROM messages WHERE MessageGroup = :messageGroupId";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $this->db->bind(':messageGroupId',$messageGroupId);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($messages, $row);
        }
        return $messages;
    }
    
    /**
     * getAllUsers
     * Returns all users from table
     * @return void
     */
    public function getAllUsers(){

        $users = array();
        $sql = "SELECT * FROM users";
        
        $this->db->makeCamelCase();
        $this->db->query($sql);
        $stmt = $this->db->getStmt();
        $this->db->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($users, $row);
        }
        return $users;
    }
    
    /**
     * deleteUser
     * Delete user from db
     * @param  mixed $userId
     * @return void
     */
    public function deleteUser($userId){
        $sql = "DELETE FROM users WHERE Id = :userId";
        $this->db->query($sql);
        $this->db->bind(':userId', $userId);

         // Execute
         if ( $this->db->execute() ) {
            return 1;
        } else {
            return 0;
        }
    }
}

