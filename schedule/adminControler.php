<?php 

    require_once "classes/hours.php";
    require_once "classes/user.php";
    require_once "classes/shift.php";
    require_once "classes/weekMessage.php";
    require_once "classes/siduration.php";

    session_start();
    
    if(isset($_POST["logout"])){
        session_unset($_SESSION["username"]);
        exit();
    }
    
    $hours = new Hours();
    $user = new User();
    $shift = new Shift();
    $weekMessage = new WeekMessage();
    $res;

    header('Content-type: application/json');

    if(isset($_POST["userName"])){
        if(!empty($_POST["userName"]) && !empty($_POST['password'])){
            $user->setUserName($_POST['userName']);
            $user->setPasswordHash($_POST['password']);
            if($user->addUser()){
                $res["goodMessage"] = "User Added";
                $res["badMessage"] = "";
            }else{
                $res["goodMessage"] = "";
                $res["badMessage"] = "User Exists";
            }  
        }else{
            $res["goodMessage"] = "";
            $res["badMessage"] = "Please fill all fields";
        }
    }
    if(isset($_POST["shiftHours"])){
        if(!empty($_POST['shiftHours']) && !empty($_POST['shiftNum'])){
            $hours->setShiftHours($_POST['shiftHours']);
            $hours->setShiftNum($_POST['shiftNum']);
            if($hours->addShiftHours()){
                $res["goodMessage"] = "Shift Added";
                $res["badMessage"] = "";
            }else{
                $res["goodMessage"] = "";
                $res["badMessage"] = "Shift Exists";
            }  
        }else{
            $res["goodMessage"] = "";
            $res["badMessage"] = "Please fill all fields";
        }
    }
    if(isset($_POST["hour"])){
        $hours->setShiftHours($_POST["hour"]);
        if($hours->removeHours()){
            $res["goodMessage"] = "Shift Removed";
            $res["badMessage"] = "";
        }else{
            $res["goodMessage"] = "";
            $res["badMessage"] = "Failed to remove shift";
        }
    }
    if(isset($_POST["user"])){
        $user->setUserName($_POST["user"]);
        if($user->removeUser()){
            $res["goodMessage"] = "User Removed";
            $res["badMessage"] = "";
        }else{
            $res["goodMessage"] = "";
            $res["badMessage"] = "Failed to remove user";
        }
    }
    if(isset($_POST["shiftId"])){
        $shift->deleteShift($_POST["shiftId"]);
    }
    if(isset($_POST["addWeekMessage"])){
        $weekMessage->addContent($_POST["addWeekMessage"]);
        $res["goodMessage"] = "הארת השבוע עודכנה";
    }
    $res["hours"] = $hours->getShiftsHours();
    $res["users"] = $user->getAllUsers();
    $res["weekMessage"] = $weekMessage->getContent();

    echo json_encode($res);

?>