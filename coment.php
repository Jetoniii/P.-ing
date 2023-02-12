<?php

// Define the user credentials
$user1 = [
    "username" => "Jeton",
    "email" => "jk57548@ubt-uni.net",
    "password" => "jk121",
    "role" => "admin"
];

// Start the session
session_start();

// Check if the user is logged in and is the correct user
if (!isset($_SESSION["user"]) || $_SESSION["user"]["email"] !== $user1["email"]) {
    // Redirect to a login page or display an error message
    header("Location: qwertyu.php");
    exit();
}

// Display the comments table if the user is authenticated
// ...
// Connect to the database
$dsn = "mysql:host=localhost;dbname=mydatabase";
$username = "myusername";
$password = "mypassword";
$pdo = new PDO($dsn, $username, $password);

// Fetch the comments from the database
$stmt = $pdo->query("SELECT * FROM comments");
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the comments table
echo "<table>";
echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Comment</th></tr></thead>";
echo "<tbody>";
foreach ($comments as $comment) {
    echo "<tr>";
    echo "<td>{$comment['id']}</td>";
    echo "<td>{$comment['name']}</td>";
    echo "<td>{$comment['email']}</td>";
    echo "<td>{$comment['comment']}</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

?>
