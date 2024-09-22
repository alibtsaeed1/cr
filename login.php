<?php
session_start();
include 'connection.php';
if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM `students` WHERE `username`= '$username' ";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    
    if (password_verify($password, $row['password'])) {
    echo "Login successful!";
    header('Location: welcome.php'); 
    } else {
    echo "Invalid password";
    }
}

?>
