<?php
include 'db_connection.php';
$conn = OpenCon();
if ($conn instanceof mysqli) {
echo "Connected Successfully using MySQLi";
} else {
echo "Unexpected connection type.";
}
//login functionality

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])){

$username = $_POST['username'];
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$password = $_POST['password'];






// Insert user
$stmt = $conn->prepare("SELECT password FROM users WHERE empid = ?");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $username);

$stmt->execute();
$stmt->store_result();

// Check if user exists
if ($stmt->num_rows === 1) {
    $stmt->bind_result($db_password);
    $stmt->fetch();

    if ($password === $db_password) {
        echo "Login successful!";
         $_SESSION['user'] = $username;
         $_SESSION['LAST_ACTIVITY'] = time();
        header("Location: index.php");
        exit();

        // You can start a session here
        // session_start(); $_SESSION['user'] = $username;
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
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
    <title>Asset Management - Login</title>
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
            letter-spacing: 2px;
        }
        .login-box {
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

<div class="login-box">
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label>User name</label><br>
        <input type="text" name="username" required><br>
        <label>Password</label><br>
        <input type="password" name="password" required><br>
        <input class="btn" type="submit" value="Go">
        <a class="btn" href="register.php">Register</a>
    </form>
</div>

</body>
</html>
