<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>כניסה</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <!-- Main container -->
        <div class="main">
            <!-- Main title -->
            <h1 class="title text-center text-white mb-5 p-3 bg-primary">סידור עבודה</h1>
            <!-- Login div -->
            <div id="top" class="d-flex justify-content-center bg-light p-3">
                <form id="loginForm" class="form-group text-center">
                    <h2 class="title mb-5">כניסה</h2>
                    <input name="username" class="form-control mb-2 text-center" type="text" placeholder="שם משתמש">
                    <input name="password" class="form-control mb-2 text-center" type="password" placeholder="סיסמא">
                    <p id="badMessage" class="text-danger">
                    </p>
                    <input id="login" class="btn btn-primary mb-2" type="submit" value="אישור">        
                </form>
            </div>
        </div>
        <script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="user.js"></script>
    </body>
</html>