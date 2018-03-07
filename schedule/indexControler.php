<?php 

session_start();

    require_once "classes/user.php";
    header('Content-type: application/json');

    $res;

    if(isset($_POST)){
        if(!empty($_POST['username'] && !empty($_POST['password']))){
                $user = new User();
                $user->setUserName($_POST['username']);
                $user->setPasswordHash($_POST['password']);
                if($user->userLogin()){
                    $_SESSION["username"] = $user->getUserName();
                    if($user->getUserName() == "admin"){
                        $res["redirect"] = "adminPage.php";
                    }else{
                        $res["redirect"] = "userPage.php";
                    }
                }else{
                    $res["badMessage"] =  "Bad Username or password";
                }

        }else{
            $res["badMessage"] = "Please fill in all fields";
        }
    }
    echo json_encode($res);
   
?>