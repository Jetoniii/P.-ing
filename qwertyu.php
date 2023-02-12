<?php 

$admin_user = array("Jeton", "jk57548@ubt-uni.net", "jk121", "admin");

$is_admin = false;
if (isset($_SESSION['user']) && empty(array_diff_assoc($_SESSION['user'], $admin_user))) {
    $is_admin = true;
}

if ($is_admin) {
    header("Location:admin.php");
}


 ?>


<?php
//establish database connection
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "signupforms";
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if(mysqli_connect_errno()){
    die("Failed to connect with MySQL: ". mysqli_connect_error());
}
?>

<?php
$login=0;
$invalid=0;


if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql="SELECT * FROM `registration` WHERE username='$username' AND email='$email' AND password='$password' ";
    $result = mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION['username']=$username;




            // Save comment to another table
            $message = $_POST['message'];
            $sql = "INSERT INTO comments (username, email, message) VALUES ('$username', '$email', '$message')";
            mysqli_query($con, $sql);
        }else{
            $invalid=1;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Leave a comment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon"  href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRk2XBywdtgLSwKzI3MEW15PzC4jB9djXQ_4g&usqp=CAU"/>
    <link rel="stylesheet" href="styles/style.css">
    
</head>
<body>
    <?php
if ($invalid) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error:</strong> User does not exist.
       
    </div>';
    echo '<style>
        .alert {
            margin-top: 50px;
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
if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success:</strong> Comment added successfully!
    </div>';
    echo '<style>
    .alert {
            margin-top: 50px;
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

<nav>
    <label for="show-menu" class="show-menu">Menu</label>
    <input type="checkbox" id="show-menu" role="button">
    <ul id=menu>
          <li><a href="index.php">Home</a></li>
          <li><a href="biography.html">Biography</a></li>
          <li><a href="career.html">Career</a></li>
          <li><a href="qwertyu.php">Leave A Comment</a></li>
        </ul>
    </nav>
    <div class="bossii">
        <form id="form" action="qwertyu.php" method="post">
        <h1>Send a message!</h1>
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
            <div class="sendmessage">
                <label for="text">Send a message</label>
                <input id="text" name="message" type="text" >
                <div class="error"></div>
            </div>
            <button type="submit" name="submit">Send</button>
            <a href="logout.php" class="logout" >Logout</a>
            <p>Don't have an Account <a href="loginpage.php" >Click Here</p>
        </form>
    </div>  

    <!-- <script defer src="qwerty.js"></script> -->
    <!-- onsubmit="return validateForm() -->
</body>
</html>

<?php
// close database connection
mysqli_close($con);
?>
