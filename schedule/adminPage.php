<?php 

    session_start();
    // Redirect to index if username not set
    if($_SESSION["username"] != "admin"){
        header("location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ממשק ניהול</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <!-- Main container -->
    <div class="main">
        <!-- Main title -->
        <h1 class="title text-center text-white p-3 bg-primary">סידור עבודה</h1>
        <!-- Admin GUI div -->
        <div class="text-center mb-4 p-4">
            <!-- First row div -->
            <h2 class="title mb-4">ממשק ניהול</h2>
            <div class="row mb-4 bg-light p-2">
                <!-- Add shift div -->
                <div class="col col-12 col-sm-6 col-md-3">
                    <h3 class="mb-2">הוספת משמרת</h3>
                    <form id="addShift" class="form-group text-center">
                        <input name="shiftHours" class="form-control mb-2 text-center" type="text" placeholder="שעות משמרת">
                        <input name="shiftNum" class="form-control mb-2 text-center" type="text" placeholder="מספר משמרות">
                        <p id="addShiftMessageGood" class="text-success"><p>
                        <p id="addShiftMessageBad" class="text-danger"><p>
                        <input class="btn btn-primary" type="submit" value="אישור">       
                    </form>
                </div>
                <!-- Remove shift div -->
                <div class="col col-12 col-sm-6 col-md-3 text-center">
                    <h3 class="mb-2">מחיקת משמרת</h3>
                    <select id="removeShiftSelect" class="form-control mb-2">
                        <option value="">בחר משמרת</option>
                    </select>
                    <p id="removeShiftMessageGood" class="text-success"><p>
                    <p id="removeShiftMessageBad" class="text-danger"><p>
                    <input id="removeShiftBtn" class="btn btn-warning" type="submit" value="אישור">
                </div>
                <!-- Add user -->
                <div class="col col-12 col-sm-6 col-md-3">
                    <h3 class="mb-2">הוספת משתמש</h3>
                    <form id="addUser" class="form-group text-center">
                        <input name="userName" class="form-control mb-2 text-center" type="text" placeholder="שם משתמש">
                        <input name="password" class="form-control mb-2 text-center" type="password" placeholder="סיסמא">
                        <p id="addUserMessageGood" class="text-success"><p>
                        <p id="addUserMessageBad" class="text-danger"><p>
                        <input class="btn btn-success" type="submit" value="אישור">       
                    </form>
                </div>
                <!-- Remove user -->
                <div class="col col-12 col-sm-6 col-md-3">
                    <h3 class="mb-2">מחיקת משתמש</h3>
                    <select id="removeUserSelect" class="form-control mb-2">
                        <option value="">בחר נציג</option>
                    </select>
                    <p id="removeUserMessageGood" class="text-success"><p>
                    <p id="removeUserMessageBad" class="text-danger"><p>
                    <input id="removeUserBtn" class="btn btn-danger" type="submit" value="אישור">
                </div>
                <!-- Weekly comment -->
                <div class="col col-12 col-sm-12 col-md-12 text-center">
                    <h3 class="mb-2">הערת השבוע</h3>
                    <textarea name="weekMessage" id="weekMessage" class="form-control mb-2" cols="" rows="5"></textarea>
                    <p id="weekMessageGood" class="text-success"></p>
                    <p id="weekMessageBad" class="text-danger"></p>
                    <input id="addWeekMessage" class="btn btn-primary mb-2" type="submit" value="עדכן" title="עדכון הארת השבוע">
                </div>   
            </div>     
        </div> 
        <hr>
        <!-- Schedule table div -->
        <div class="text-center">
            <input id="view" class="btn btn-dark mb-4" type="submit" value="שינוי תצוגה">
        </div>
        
        <div id="scheduleDivAdmin" class="mb-4">
            <!-- AJAX returns here -->
        </div>
        <div id="sidurationDivAdmin" class="mb-4">
            <!-- AJAX returns here -->
        </div>
        <footer class="footer text-center  mb-4">
            <input id="logOut" class="btn btn-warning" type="submit" value="ניתוק">
        </footer> 
    </div>
    <script
        src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="admin.js"></script>
</body>
</html>
  