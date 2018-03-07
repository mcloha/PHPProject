<?php 

    require_once "db.php";

    class User{

        private $db;
        private $userId;
        private $userName;
        private $passwordHash;

        public function __construct(){

            $this->db = DB::getInstance();

        }
        public function getUserName(){

            return $this->userName;

        }
        public function setUserName($userName){

            $this->userName = $userName;

        }
        public function setPasswordHash($password){

            $this->passwordHash = md5($password);

        }
        public function userLogin(){

            $params = [
                'userName' => $this->userName,
                'passwordHash' => $this->passwordHash
            ];
            $query = "SELECT * FROM users WHERE userName = :userName AND passwordHash = :passwordHash";
            $this->db->query($query, $params);
            return $this->db->count;

        }
        public function addUser(){

            $params = [
                'userName' => $this->userName
            ];
            $query = "SELECT * FROM users WHERE userName = :userName";
            if($this->db->query($query, $params)->count == 0){
                $params = [
                    'userName' => $this->userName,
                    'passwordHash' => $this->passwordHash
                ];
                $query = "INSERT INTO users (userName, passwordHash) VALUES(:userName, :passwordHash)";
                $this->db->query($query, $params);
                return true;
            }else{
                return false;
            }
        }
        public function removeUser(){
            $params["userToDelete"] = $this->userName;
            $query = "DELETE FROM users WHERE userName = :userToDelete";
            if($this->db->query($query, $params)->count == 1){
                return true;
            }else{
                return false;
            }
        }
        public function getAllUsers(){

            $params["userName"] = "admin";
            $query = "SELECT userName FROM users WHERE userName != :userName";
            return $this->db->query($query, $params)->result;
            
        }
    }

?>