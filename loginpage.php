<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'Users.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql="insert into 'registration' (username,email,password)values('$username','$email','$password')";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "Data inserted succesfully";
    }else{
        die(mysqli_error($con));
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
    <link rel="preconnect" href="https:/fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="loginstyle.css">
    <script defer src="loginscript.js"></script>
</head>
<body>
    <div class="container">
        <form id="form" action="loginpage.php" method="post" onsubmit="return validateForm()">
            <h1>Registration</h1>
            <div class="input-control">
                <label for="username">Username</label>
                <input id="username" name="username" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="email">Email</label>
                <input id="email" name="email" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password">Password</label>
                <input id="password"name="password" type="password">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password2">Password again</label>
                <input id="password2"name="password2" type="password">
                <div class="error"></div>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
    
</body>
</html>


