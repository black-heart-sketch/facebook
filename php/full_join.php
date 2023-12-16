<?php
try {
    include_once('db_connect.php');

    // Perform the cross join query
    $query = $conn->query("SELECT * FROM users left JOIN post ON users.id_users=post.id_user Union SELECT * FROM users right JOIN post ON users.id_users=post.id_user");

    // Fetch the result
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Result</title>
    <style>body {
    margin: 0;
    padding: 0;
    font-family: Montserrat, sans-serif;
    background: linear-gradient(120deg, #2980b9, #8e44ad);
    height: 300vh;
    overflow: hidden;
}
        .card {
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 10px;
        }

        .card-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-content {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Full Join Result</h1>
    <?php if (!empty($result)): ?>
        <?php foreach ($result as $row): ?>
            <div class="card">
                <div class="card-title">User ID: <?php echo $row['id_user']; ?></div>
                <div class="card-content">User Name: <?php echo $row['name']; ?></div>
                <div class="card-content">Post ID: <?php echo $row['id_post']; ?></div>
                <div class="card-content">Post Title: <?php echo $row['content']; ?></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>