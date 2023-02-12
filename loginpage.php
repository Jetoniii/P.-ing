<?php
$succes=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'Users.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 


    $sql="Select * from `registration`where username='$username'";

    $result = mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $user=1;
        }else{
            $sql="insert into registration (username,email,password) values ('$username','$password','$email')";
            $result = mysqli_query($con,$sql);
            if($result){
            $succes=1;
            }else{
               die(mysqli_error($con));
    }
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/loginstyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
    <link rel="preconnect" href="https:/fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <script defer src="loginscript.js"></script>
</head>
<body>


<?php
if ($user) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error:</strong> User already exists. Please choose a different username.
       
    </div>';
    echo '<style>
        .alert {
            margin-top: 0;
            position: relative;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: .75rem 1.25rem;
            border-radius: .25rem;
        }
        
        .alert strong {
            font-weight: bold;
        }
        
        .alert button {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
        }
    </style>';
}


?>

<?php
if ($succes) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success:</strong> Registration complete. Thank you for signing up!
    </div>';
    echo '<style>
        .alert {
            margin-top: 0px;
            position: relative;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: .75rem 1.25rem;
            border-radius: .25rem;
        }
        
        .alert strong {
            font-weight: bold;
        }
        
        .alert button {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
        }
    </style>';
}




?>

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
            <p>Already have an Account <a href="qwertyu.html" >Click Here</p>
        </form>
    </div>
    
</body>
</html>


