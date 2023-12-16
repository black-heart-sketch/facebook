<?php
session_start();

if (isset($_POST['register'])) {
    // Verify data entry
    $uname = filter_var($_POST['Username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $number = $_POST['number'];
    $age = $_POST['age'];
    $currentDateTime = date("Y-m-d H:i:s");

    if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
        die('Email error');
    } else {
        $email = $_POST['Email'];
    }

    $passwor = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    include_once('db_connect.php');

    // Insert the received data
    $sql = "INSERT INTO users (name, email, password, number, age, creation_date) VALUES ('$uname', '$email', '$passwor', $number, $age, '$currentDateTime')";

    if ($conn->query($sql)) {
        echo '<script> alert("Registration Successful") </script>';
        header("Location: ../index.php");
        echo '<script> alert("Registration Successful") </script>';
    } else {
        if ($conn->errorInfo()) {
            echo '<script> alert("Email already taken") </script>';
        } else {
            die(var_dump($conn->errorInfo()));
        }
    }
}
?>