<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="h1">To-Do List</h1>
    <form class="form" action="add.php" method="POST">
        <input type="text" name="title" placeholder="Add a new task" required>
        <button type="submit">Add</button>
    </form>

    <?php
    include 'db.php';
    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . ($row['completed'] ? "<s>" : "") . $row['title'] . ($row['completed'] ? "</s>" : "") . 
                 " <a href='update.php?id=" . $row['id'] . "'>" . ($row['completed'] ? "Undo" : "Complete") . "</a>" . 
                 " <a href='delete.php?id=" . $row['id'] . "'>Delete</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No tasks found</p>";
    }

    $conn->close();
    ?>
</body>
</html>
