<?php 

    require_once "classes/user.php";
    require_once "classes/hours.php";
    require_once "classes/shift.php";
    require_once "classes/weekMessage.php";

    session_start();

    if(isset($_POST["logout"])){
        session_unset($_SESSION["username"]);
        exit();
    }

    $user = new User();
    $user->setUserName($_SESSION["username"]);
    $hours = new Hours();
    $shift = new Shift();
    $shift->setUserName($_SESSION["username"]);
    $shifts = null;
    $res["badMessage"] = "";
    $weekMessage = new WeekMessage();
    
    header('Content-type: application/json');

    

    if(isset($_POST["shifts"]) && !empty($_SESSION["username"])){
        $shifts["username"] = $shift->getUserName();
        if(!empty($_POST["shifts"]["sunday"])){
            $shifts["sunday"] = $_POST["shifts"]["sunday"];
        }else{
            $res["badMessage"] .= "לא נבחרה אופציה ביום א<br>";
        }
        if(!empty($_POST["shifts"]["monday"])){
            $shifts["monday"] = $_POST["shifts"]["monday"];
        }else{
            $res["badMessage"] .= "לא נבחרה אופציה ביום ב<br>";
        }
        if(!empty($_POST["shifts"]["tuesday"])){
            $shifts["tuesday"] = $_POST["shifts"]["tuesday"];
        }else{
            $res["badMessage"] .= "לא נבחרה אופציה ביום ג<br>";
        }
        if(!empty($_POST["shifts"]["wednesday"])){
            $shifts["wednesday"] = $_POST["shifts"]["wednesday"];
        }else{
            $res["badMessage"] .= "לא נבחרה אופציה ביום ד<br>";
        }
        if(!empty($_POST["shifts"]["thursday"])){
            $shifts["thursday"] = $_POST["shifts"]["thursday"];
        }else{
            $res["badMessage"] .= "לא נבחרה אופציה ביום ה<br>";
        }
        if(!empty($_POST["shifts"]["friday"])){
            $shifts["friday"] = $_POST["shifts"]["friday"];
        }else{
            $res["badMessage"] .= "לא נבחרה אופציה ביום ו<br>";
        }
        if(!empty($_POST["shifts"]["saturday"])){
            $shifts["saturday"] = $_POST["shifts"]["saturday"];
        }else{
            $res["badMessage"] .= "לא נבחרה אופציה ביום שבת<br>";
        }
        if(!empty($_POST["shifts"]["comment"])){
            $shifts["comment"] = $_POST["shifts"]["comment"];
        }else{
            $shifts["comment"] = null;
        }
        if(empty($res["badMessage"])){
            if($shift->addShift($shifts) =="added"){
                $res["goodMessage"] = "משמרת התווספה בהצלחה";
                $res["badMessage"] = "";
            }elseif($shift->addShift($shifts) =="updated"){
                $res["goodMessage"] = "משמרת עודכנה בהצלחה";
                $res["badMessage"] = "";
            }else{
                $res["badMessage"] = "שגיאה בהוספת משמרת";
                $res["goodMessage"] = "";
            }
        } 
    }
    // Date modifier
    if(date('l')=='Sunday'){
    
        $datetime = new DateTime('now');

        $datetime->modify('+7 day');
        $res["sunday"] = $datetime->format('d/m');

        $datetime->modify('+1 day');
        $res["monday"] = $datetime->format('d/m');

        $datetime->modify('+1 day');
        $res["tuesday"] = $datetime->format('d/m');

        $datetime->modify('+1 day');
        $res["wednesday"] = $datetime->format('d/m');

        $datetime->modify('+1 day');
        $res["thursday"] = $datetime->format('d/m');

        $datetime->modify('+1 day');
        $res["friday"] = $datetime->format('d/m');

        $datetime->modify('+1 day');
        $res["saturday"] = $datetime->format('d/m');
    }
    if(date('l')=='Monday'){

        $datetime = new DateTime('now');
        
        $datetime->modify('-1 day +7 day');
        $res["sunday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["monday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["tuesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["wednesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["thursday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["friday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["saturday"] = $datetime->format('d/m');

    }
    if(date('l')=='Tuesday'){

        $datetime = new DateTime('now');
        
        $datetime->modify('-2 day +7 day');
        $res["sunday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["monday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["tuesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["wednesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["thursday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["friday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["saturday"] = $datetime->format('d/m');

    }
    if(date('l')=='Wednesday'){

        $datetime = new DateTime('now');
        
        $datetime->modify('-3 day +7 day');
        $res["sunday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["monday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["tuesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["wednesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["thursday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["friday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["saturday"] = $datetime->format('d/m');

    }
    if(date('l')=='Thursday'){

        $datetime = new DateTime('now');
        
        $datetime->modify('-4 day +7 day');
        $res["sunday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["monday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["tuesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["wednesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["thursday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["friday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["saturday"] = $datetime->format('d/m');

    }
    if(date('l')=='Friday'){

        $datetime = new DateTime('now');
        
        $datetime->modify('-5 day +7 day');
        $res["sunday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["monday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["tuesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["wednesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["thursday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["friday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["saturday"] = $datetime->format('d/m');

    }
    if(date('l')=='Saturday'){

        $datetime = new DateTime('now');
        
        $datetime->modify('-6 day +7 day');
        $res["sunday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["monday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["tuesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["wednesday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["thursday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["friday"] = $datetime->format('d/m');
        
        $datetime->modify('+1 day');
        $res["saturday"] = $datetime->format('d/m');

    }

    $res["hours"] = $hours->getShiftsHours();
    $res["username"] = $user->getUserName();
    $res["shifts"] = $shift->load();
    $res["weekMessage"] = $weekMessage->getContent();

    echo json_encode($res);

?>