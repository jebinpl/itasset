<?php
include 'db_connection.php';
$conn = OpenCon();
if ($conn instanceof mysqli) {
echo "Connected Successfully using MySQLi";
} else {
echo "Unexpected connection type.";
}
// Connect to database
// $conn = new mysqli($host, $user, $pass);

// // Create database if it doesn't exist
// $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
// $conn->select_db($dbname);

// // Create users table if it doesn't exist
// $conn->query("CREATE TABLE IF NOT EXISTS users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(50) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL
// )");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])){

$username = $_POST['username'];
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$password = $_POST['password'];
$empid = $_POST['empid'];
$dept =$_POST['department'];
$designation =$_POST['designation'];
echo($username);


// Insert user
$stmt = $conn->prepare("INSERT INTO users (empid, name, dept, designation, password) VALUES (?,?,?,?, ?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("issss", $empid,  $username, $dept, $designation, $password);

if ($stmt->execute()) {
    echo "Registration successful. <a href='login.php'>Login now</a>";
} else {
    echo "Registration failed: " . $stmt->error;
}

$stmt->close();
} else {
    // echo "Username or password missing.";
}
}
CloseCon($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Asset Management</title>
    <style>
        body {
            background-color: #c49db0;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .header {
            background-color: #2e9ca9;
            padding: 20px;
            font-size: 30px;
            color: black;
            font-weight: bold;
        }
        .register-box {
            background-color: #e6c996;
            padding: 30px;
            width: 300px;
            margin: 100px auto;
            border-radius: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }
        .btn {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 20px;
            background-color: #779be7;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="header">ASSET MANAGEMENT</div>

<div class="register-box">
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <input type="text" name="empid" placeholder="Emp ID" required><br>
        <input type="text" name="department" placeholder="Department" required><br>
        <input type="text" name="designation" placeholder="Designation" required><br> 
        <input type="text" name="username" placeholder="User name" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        

        <input class="btn" type="submit" value="Register">
    </form>
</div>

</body>
</html>
