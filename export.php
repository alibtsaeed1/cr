<?php
include 'connection.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="students.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['Username', 'Password']); // Column headers

$sql = "SELECT username, password FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['username'], $row['password']]);
    }
}
fclose($output);
$conn->close();
exit();
?>
