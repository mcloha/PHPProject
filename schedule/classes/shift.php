<?php 

    require_once "db.php";
    require_once "hours.php";

    class Shift{

        private $db;
        private $shiftId = null;
        private $userName;
        private $sunday;
        private $monday;
        private $tuesday;
        private $wednesday;
        private $thursday;
        private $friday;
        private $saturday;


        public function __construct(){

            $this->db = DB::getInstance();

        }
        public function setUserName($userName){

            $this->userName = $userName;

        }
        public function getUserName(){

            return $this->userName;

        }
        public function addShift($array){

            $params["username"] = $array["username"];
            $query = "SELECT * FROM shifts WHERE userName = :username";
            if($this->db->query($query, $params)->count == 1){
                $query = "UPDATE shifts SET sunday = :sunday, monday = :monday, tuesday = :tuesday, wednesday = :wednesday, thursday = :thursday, friday = :friday, saturday = :saturday, comment = :comment WHERE userName = :username";
                $this->db->query($query, $array);
                return "updated";
            }else{
                $query = "INSERT INTO shifts (userName, sunday, monday, tuesday, wednesday, thursday, friday, saturday, comment) VALUES(:username, :sunday, :monday, :tuesday, :wednesday, :thursday, :friday, :saturday, :comment)";
                $this->db->query($query, $array);
                return "added";
            }
        }
        public function load(){
            $params["username"] = $this->userName;
            $query = "SELECT * FROM shifts WHERE userName = :username";
            if($this->db->query($query, $params)->count == 1){
                return $this->db->query($query, $params)->result;
            }else{
                return false;
            }
        }
        public function selectAllShifts(){

            $params = [];
            $query = "SELECT * FROM shifts";
            return $this->db->query($query, $params)->result;

        }
        public function deleteShift($id){

            $params["shiftId"] = $id;
            $query = "DELETE FROM shifts WHERE shiftId = :shiftId";
            $this->db->query($query, $params);

        }
        public function count($day){

            $params["day"] = $day;
            $query = "SELECT count(:day) FROM `shifts`";
            return $this->db->query($query, $params)->count;

        }
    }

?>