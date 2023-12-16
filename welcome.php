<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['inner'])) {
        // Inner join button is clicked
        $redirectUrl = "php/inner_join.php";
    } elseif (isset($_POST['full'])) {
        // Full join button is clicked
        $redirectUrl = "php/full_join.php";
    } elseif (isset($_POST['right'])) {
        // Right join button is clicked
        $redirectUrl = "php/right_join.php";
    } elseif (isset($_POST['left'])) {
        // Left join button is clicked
        $redirectUrl = "php/left_join.php";
    } elseif (isset($_POST['cross'])) {
        // Cross join button is clicked
        $redirectUrl = "php/cross_join.php";
    }

    // Redirect to the corresponding page
    if (isset($redirectUrl)) {
        header("Location: $redirectUrl");
        exit;
    }
}

try {
    include_once('php/db_connect.php');

    // Fetch all users from the database
    $query = $conn->query("SELECT * FROM users");
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welcome.css">
    <title>Welcome</title>
    <style>
      
    </style>
</head>
<body>
    <div class="nav">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="submit" name='inner' value="inner join">
            <input type="submit" name='full' value="full join">
            <input type="submit" name='right' value="right join">
            <input type="submit" name='left' value="left join">
            <input type="submit" name='cross' value="cross join">
        </form>
    </div>
    <div class="scrollable-container">
        <?php
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