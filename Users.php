<?php
session_start();

if(isset($_SESSION['user_role'])){
  if($_SESSION['user_role'] === 'admin'){
    header('Location: /admin/dashboard.php');
    exit;
  } else {
    header('Location: /user/dashboard.php');
    exit;
  }
} else {
  header('Location: /login.php');
  exit;
}
?>
