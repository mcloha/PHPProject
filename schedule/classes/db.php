<?php 

    require_once "./globals.php";

    class DB{

        private $pdo;
        private static $_instance = null;
        private $query;
        public $result;
        public $count;

        public function __construct(){
            try{
                $this->pdo = new PDO("mysql:host=" . $GLOBALS['mysql']['host'] . ";dbname=" . $GLOBALS['mysql']['database'] . ";", $GLOBALS['mysql']['username'], $GLOBALS['mysql']['password']);
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        public static function getInstance(){
            if(!isset(self::$_instance)){
                self::$_instance = new DB();
            }
            return self::$_instance;
        }
        public function query($sql, $params){
            if($this->query = $this->pdo->prepare($sql)){
                if($this->query->execute($params)){
                    $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
                    $this->count = $this->query->rowCount();
                }else{
                    die('Unable to execute');
                }
            }
            return $this;
        }

    }

?>