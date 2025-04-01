<?php
session_start();
if(isset( $_SESSION['current_user']))
{

}
else{
    header("location:"."/attendance_app/login.php");
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    <button id="btnLogout">LOGOUT</button>
    <script src="js/jquery.js"></script>
    <script src="js/logout.js"></script>
</body>
</html>