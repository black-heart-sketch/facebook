<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['inner'])) {
        // Inner join button is clicked
        echo "Inner join button is clicked.";
    } elseif (isset($_POST['full'])) {
        // Full join button is clicked
        echo "Full join button is clicked.";
    } elseif (isset($_POST['right'])) {
        // Right join button is clicked
        echo "Right join button is clicked.";
    } elseif (isset($_POST['left'])) {
        // Left join button is clicked
        echo "Left join button is clicked.";
    } elseif (isset($_POST['cross'])) {
        // Cross join button is clicked
        echo "Cross join button is clicked.";
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
?>