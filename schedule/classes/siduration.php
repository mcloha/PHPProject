<?php 

    require_once "db.php";
    require_once "hours.php";
    require_once "shift.php";

    class Siduration{

        private $db;
        private $hours;

        public function __construct(){

            $this->db = DB::getInstance();
            

        }
        public function fill(){
            
            $shiftClass = new Shift();
            $shifts = $shiftClass->selectAllShifts();
        
            foreach($shifts as $shift){

                $params = [
                    "userName" => $shift["userName"],
                    "day" => $shift["sunday"]
                ];
                $query = "UPDATE siduration SET sunday = :userName WHERE hours = :day AND sunday IS NULL LIMIT 1";
                $this->db->query($query, $params);

                $params = [
                    "userName" => $shift["userName"],
                    "day" => $shift["monday"]
                ];
                $query = "UPDATE siduration SET monday = :userName WHERE hours = :day AND monday IS NULL LIMIT 1";
                $this->db->query($query, $params);

                $params = [
                    "userName" => $shift["userName"],
                    "day" => $shift["tuesday"]
                ];
                $query = "UPDATE siduration SET tuesday = :userName WHERE hours = :day AND tuesday IS NULL LIMIT 1";
                $this->db->query($query, $params);

                $params = [
                    "userName" => $shift["userName"],
                    "day" => $shift["wednesday"]
                ];
                $query = "UPDATE siduration SET wednesday = :userName WHERE hours = :day AND wednesday IS NULL LIMIT 1";
                $this->db->query($query, $params);

                $params = [
                    "userName" => $shift["userName"],
                    "day" => $shift["thursday"]
                ];
                $query = "UPDATE siduration SET thursday = :userName WHERE hours = :day AND thursday IS NULL LIMIT 1";
                $this->db->query($query, $params);

                $params = [
                    "userName" => $shift["userName"],
                    "day" => $shift["friday"]
                ];
                $query = "UPDATE siduration SET friday = :userName WHERE hours = :day AND friday IS NULL LIMIT 1";
                $this->db->query($query, $params);

                $params = [
                    "userName" => $shift["userName"],
                    "day" => $shift["saturday"]
                ];
                $query = "UPDATE siduration SET saturday = :userName WHERE hours = :day AND saturday IS NULL LIMIT 1";
                $this->db->query($query, $params);
            }
            
        }
        public function truncateSiduration(){

            $params = [];
            $query = "TRUNCATE TABLE siduration";
            $this->db->query($query, $params);

        }
        public function insertRows(){

            $hours = new Hours();
            $shiftHours = $hours->getShiftsHours();

            foreach($shiftHours as $shiftHour){
                $shiftNum = $hours->getShiftNum($shiftHour["shiftHours"]);
                for($i = 0; $i < intval($shiftNum); $i++){
                    $params["shiftHours"] = $shiftHour["shiftHours"];
                    $query = "INSERT INTO siduration (hours) VALUES (:shiftHours)";
                    if(intval($shiftNum) > 0){
                        $this->db->query($query, $params);
                    }
                }
            }
            
        }
        public function selectSiduration(){
            
            $params = [];
            $query = "SELECT * FROM siduration";
            return $this->db->query($query, $params)->result;

        }

    }

?>