<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>LoginPage</title>
</head>
<body>
    <div class="loginform">
        <div class="inputgroup topmarginlarge">
            <input type="text" id="txtUsername" required>
            <label for="txtUsername"id="1blUsername">USER NAME</label>
        </div>   
        
        <div class="inputgroup topmarginlarge">
            <input type="password" id="txtPassword" required>
            <label for="txtPassword" id="1blPassword">PASSWORD</label>
        </div>
        <div class="divcallforaction topmarginlarge">
            <button class="btnlogin inactivecolor" id="btnLogin">LOGIN</button>
        </div>

        <div class="diverror topmarginlarge" id="diverror">
         <label class="errormessege"id="errormessege">ERROR GOES HERE</label>
        </div>
    </div>
    <script src = "js/jquery.js"></script>
        <script src = "js/login.js"></script>
</body>
</html>