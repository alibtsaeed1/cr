<?php
include 'connection.php';

if (isset($_POST['import'])) {
    $file = $_FILES['file']['tmp_name'];
    
    if ($_FILES['file']['size'] > 0) {
        $fileHandle = fopen($file, 'r');
        while (($row = fgetcsv($fileHandle, 1000, ",")) !== FALSE) {
            $username = $row[0];
            $password = password_hash($row[1], PASSWORD_BCRYPT); // Hash the password

            $checkSql = "SELECT * FROM students WHERE username = '$username'";
            $checkResult = $conn->query($checkSql);

            if ($checkResult && $checkResult->num_rows == 0) {
                $sql = "INSERT INTO students (username, password) VALUES ('$username', '$password')";
                $conn->query($sql);
            }
        }
        fclose($fileHandle);
        echo "Import successful!";
    } else {
        echo "File is empty.";
    }
}
$conn->close();
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit" name="import">Import</button>
</form>
