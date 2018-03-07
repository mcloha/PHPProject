<?php 

    require_once "classes/shift.php";

    $shift = new Shift();

    if(!empty($_POST)){
        
        $shift->addshift($_POST);
        
    }

    var_dump($_POST);

?>