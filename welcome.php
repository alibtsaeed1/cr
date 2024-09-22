<?php
session_start();


$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>You are now logged in.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
