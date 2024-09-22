<?php
include 'connection.php';
if (isset($_POST['Signup'])) {
    $username = $_POST['username'];
    $password1 = $_POST['password']; 

    $checkSql = "SELECT * FROM students WHERE username = '$username'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult && $checkResult->num_rows > 0) {
        echo "Username already..So choose another";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO students (username, password) VALUES ('$username', '$hashedPassword')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
            header('Location: welcome.php'); 
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
$conn->close();
?>
