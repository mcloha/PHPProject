<?php 

    require_once "classes/siduration.php";
        
    $siduration = new Siduration();
    $siduration->truncateSiduration();
    $siduration->insertRows();
    $siduration->fill();

?>
    