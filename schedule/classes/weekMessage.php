<?php 

    require_once "db.php";

    class WeekMessage{

        private $db;

        public function __construct(){

            $this->db = DB::getInstance();

        }
        public function addContent($content){

            $params["content"] = $content;
            $query = "UPDATE messages SET weekMessage = :content";
            $this->db->query($query, $params)->result == 1;

        }
        public function getContent(){

            $params = [];
            $query = "SELECT weekMessage FROM messages";
            return $this->db->query($query, $params)->result;

        }

    }


?>