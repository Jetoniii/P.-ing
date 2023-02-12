
<!DOCTYPE html>
<html>
<head>
    <title>Comments Table</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: #f5f5f5; font-family: sans-serif; margin: 0; padding: 0;">
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <?php if ($is_admin=true): ?>
        <h1 style="text-align: center;">Comments Table</h1>
        <table style="border-collapse: collapse; width: 100%; background-color: #fff; border: 1px solid #ddd;">
            <thead>
                <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                    <th style="padding: 10px; text-align: left; font-weight: bold; color: #333; border-right: 1px solid #ddd;">ID</th>
                    <th style="padding: 10px; text-align: left; font-weight: bold; color: #333; border-right: 1px solid #ddd;">Name</th>
                    <th style="padding: 10px; text-align: left; font-weight: bold; color: #333; border-right: 1px solid #ddd;">Email</th>
                    <th style="padding: 10px; text-align: left; font-weight: bold; color: #333;">Comment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to the database
                    $dsn = "mysql:host=localhost;dbname=signupforms";
                    $Username = "Jeton";
                    $Password = "jk121";
                    $pdo = new PDO($dsn, $Username, $Password);

                    // Fetch the comments from the database
                    $stmt = $pdo->query("SELECT * FROM comments");
                    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Display the comments table
                    foreach ($comments as $comment) {
                        echo "<tr>";
                        echo "<td style='padding: 10px; border-right: 1px solid #ddd;'>".$comment['id']."</td>";
                        echo "<td style='padding: 10px; border-right: 1px solid #ddd;'>".$comment['name']."</td>";
                        echo "<td style='padding: 10px; border-right: 1px solid #ddd;'>".$comment['email']."</td>";
                        echo "<td style='padding: 10px;'>".$comment['comment']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>You are not authorized to view this page.</p>
        <?php endif; ?>
    </div>
</body>
</html>
