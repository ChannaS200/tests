<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'php_demo');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (name, age) VALUES (?, ?)");
    $stmt->bind_param("si", $name, $age);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Redirect to results.php
    header("Location: results.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Read Data</title>
</head>
<body>
    <header>
        <h1>Enter User Data</h1>
    </header>
    <div class="container">
        <form method="POST" action="readdata.php">
            <input type="text" name="name" placeholder="please Enter Name" required>
            <input type="number" name="age" placeholder="please Enter Age" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
