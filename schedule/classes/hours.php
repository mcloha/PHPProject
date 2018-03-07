<?php 

    require_once "db.php";

    class Hours{

        private $db;
        private $shiftId;
        private $shiftHours;
        private $shiftNum;

        public function __construct(){
            
            $this->db = DB::getInstance();
            
        }
        public function setShiftHours($shiftHours){

            $this->shiftHours = $shiftHours;

        }
        public function setShiftNum($shiftNum){
            
            $this->shiftNum = $shiftNum;
            
        }
        public function getShiftNum($shiftHours){

            $params = [
                "shiftHours" => $shiftHours
            ];
            $query = "SELECT shiftNum FROM hours WHERE shiftHours = :shiftHours";
            return (int)$this->db->query($query, $params)->result[0]["shiftNum"];
        }
        public function getShiftsHours(){
            
            $params = [];
            $query = "SELECT shiftHours FROM hours ORDER BY CAST(shiftHours as signed)";
            return $this->db->query($query, $params)->result;

        }
        public function addShiftHours(){

            $params = [
                "shiftHours" => $this->shiftHours
            ];
            $query = "SELECT * FROM hours WHERE shiftHours = :shiftHours";
            if($this->db->query($query, $params)->count == 0){
                $params = [
                    "shiftHours" => $this->shiftHours,
                    "shiftNum" => $this->shiftNum
                ];
                $query = "INSERT INTO hours (shiftHours, shiftNum) VALUES(:shiftHours, :shiftNum)";
                $this->db->query($query, $params);
                
                return true;
            }
            return false;
        }
        public function removeHours(){
            $params["hoursToDelete"] = $this->shiftHours;
            $query = "DELETE FROM hours WHERE shiftHours = :hoursToDelete";
            if($this->db->query($query, $params)->count == 1){
                return true;
            }else{
                return false;
            }
        }
    }

?>