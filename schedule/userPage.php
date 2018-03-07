<?php 

    session_start();
    // Redirect to index if username not set and not admin
    if(!isset($_SESSION["username"]) || $_SESSION["username"] == "admin"){
        header("location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>שליחת סידור</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <!-- Schedule HTML -->
    <div class="main">
        <h1 class="title text-center text-white mb-5 p-3 bg-primary">סידור עבודה</h1>
        <div class="d-flex flex-column px-4">
            <h2 class="title text-center">שליחת סידור</h2> 
            <div id="sendSchedule" class="text-center p-2 mb-2">
                <div id="shiftForm" class="bg-light row p-4 mb-2">
                    <div name="userName" class="col col-12 col-sm-6 col-md-3 col-lg-2">
                        <h2 id="userName"></h2>
                    </div>
                    <div class="bg-light col col-12 col-sm-6 col-md-3 col-lg-2">
                        <p id="sundayDate"></p>
                        <select name="sunday" id="sunday" class="userForm form-control mb-2" name="sunday" id="">
                            <option id="defaultSunday" value="" selected>יום ראשון</option>
                        </select>
                    </div>
                    <div class="bg-light col col-12 col-sm-6 col-md-3 col-lg-2">
                        <p id="mondayDate"></p>
                        <select name="monday" id="monday" class="userForm form-control mb-2" name="monday" id="">
                            <option id="defaultMonday" value="" selected>יום שני</option>
                        </select>
                    </div>
                    <div class="bg-light col col-12 col-sm-6 col-md-3 col-lg-2">
                        <p id="tuesdayDate"></p>
                        <select name="tuesday" id="tuesday" class="userForm form-control mb-2" name="tuesday" id="">
                            <option id="defaultTuesday" value="" selected>יום שלישי</option>
                        </select>
                    </div>
                    <div class="bg-light col col-12 col-sm-6 col-md-3 col-lg-2">
                        <p id="wednesdayDate"></p>
                        <select name="wednesday" id="wednesday" class="userForm form-control mb-2" name="wednesday" id="">
                            <option id="defaultWednesday" value="" selected>יום רביעי</option>
                        </select>
                    </div>
                    <div class="bg-light col col-12 col-sm-6 col-md-3 col-lg-2">
                        <p id="thursdayDate"></p>
                        <select name="thursday" id="thursday" class="userForm form-control mb-2" name="thursday" id="">
                            <option id="defaultThursday" value="" selected>יום חמישי</option>
                        </select>
                    </div>
                    <div class="bg-light col col-12 col-sm-6 col-md-3 col-lg-2">
                        <p id="fridayDate"></p>
                        <select name="friday" id="friday" class="userForm form-control mb-2" name="friday" id="">
                            <option id="defaultFriday" value="" selected>יום שישי</option>
                        </select>
                    </div>
                    <div class="bg-light col col-12 col-sm-6 col-md-3 col-lg-2">
                        <p id="saturdayDate"></p>
                        <select name="saturday" id="saturday" class="userForm form-control mb-2" name="saturday" id="">
                            <option id="defaultSaturday" value="" selected>יום שבת</option>
                        </select>
                    </div>
                    <div class="bg-light col col-12 col-md-12 col-lg-8">
                        <p>הערות</p>
                        <textarea name="comment" id="comment" class="form-control mb-4" cols="40" rows="4" placeholder="Comment"></textarea>
                    </div>
                </div>
                <p id="goodMessage" class="text-success"></p>
                <p id="badMessage" class="text-danger"></p>
                <input id="submitShift" class="btn btn-primary" type="submit" value="אישור"> 
                <hr>
            </div>
        </div>
        <!-- Schedule table div -->
        <div id="tableDiv">
            <!-- AJAX return here -->
        </div>
        <footer class="footer text-center mb-4">
            <input id="logOut" class="btn btn-warning" type="submit" value="ניתוק">
        </footer> 
    </div>
    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="user.js">
  </script>
  <script src="https://unpkg.com/sweetalert2"></script>
</body>
</html>

