<?php
session_start();




try {
    include_once('assets/php/db_connect.php');

    // Fetch all users from the database
    $query = $conn->query("SELECT * FROM users");
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    // Iterate over the users and generate HTML code for each user card
   
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Montserrat, sans-serif;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            height: 300vh;
            overflow: hidden;
        }

        .scrollable-container {
            max-height: 300vh; /* Adjust the height as needed */
            overflow-y: auto;
        }

        .user-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            color: #333;
        }

        h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="scrollable-container">
        <?php
        // Connect to your database and retrieve users

        // Iterate over the users and generate HTML code for each user card
        foreach ($users as $user) {
            echo "<div class='user-card'>";
            echo "<h2>" . $user['name'] . "</h2>";
            echo "<p>Email: " . $user['email'] . "</p>";
            echo  "<h3> Number " . $user['number'] . "</h3>";
            echo  "<h4>Age " . $user['age'] . "</h4>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>