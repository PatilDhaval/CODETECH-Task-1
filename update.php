<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT completed FROM tasks WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$completed = $row['completed'] ? 0 : 1;

$sql = "UPDATE tasks SET completed=$completed WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
