<?php
 include('db_connection.php'); // include your database connection
 // include_once(__DIR__ . '/../db_connection.php');
 $conn = OpenCon();
 
$page = $_GET['page'] ?? 'home';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $device_id = $_POST['device_id'];
    $empid = $_POST['emp_id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $model = $_POST['model'];
    $specification = $_POST['specification'];
    $os = $_POST['os'];
    $hdd = $_POST['hdd'];

    $sql = "INSERT INTO assetinfo (deviceid, empid, name, dept, model, spec, os, hdd)
            VALUES ('$device_id','$empid', '$name', '$department', '$model', '$specification', '$os', '$hdd')";

    if ($conn->query($sql) === TRUE) {
       // echo "New desktop added successfully.";
    } else {
        echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Asset Management</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 150px;
            background-color: #1593a5;
            height: 100vh;
            float: left;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            color: black;
            text-decoration: none;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background-color: #117985;
            color: white;
        }
        .header {
            background-color: #1593a5;
            padding: 20px;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            color: black;
        }
        .content {
            margin-left: 150px;
            padding: 40px;
            background-color: #d6a3b7;
            height: calc(100vh - 70px);
        }
        .logout-button {
  position: absolute;
  top: 15px;
  right: 20px;
  background-color: #ff4d4d;
  color: white;
  border: none;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  font-size: 14px;
  font-weight: bold;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.logout-button:hover {
  background-color: #cc0000;
}
    </style>
</head>
<body>

<div class="header">ASSET MANAGEMENT</div>
<div class="logout-button"><a href="login.php">Logout</a></div>

<div class="sidebar">
    <a href="?page=home">Home</a> 
    <a href="?page=desktop">Desktop</a>
    <a href="?page=printer">Printer</a>
    <a href="?page=modem">Modem</a>
    <a href="?page=ups">UPS</a>
    <a href="?page=storage">Storage</a>
    <a href="?page=cctv">CCTV</a>
    <a href="?page=switch">Switch</a>
</div>
<div class="content">

    <?php
    switch($page) {
        case 'desktop':
            include('views/desktop.php'); // this shows your desktop list and form
            break;
         //  echo "<h2>Desktop Assets</h2><p>Details about desktop assets...</p>";
            break;
        case 'printer':
            echo "<h2>Printer Assets</h2><p>Details about printers...</p>";
            break;
        case 'modem':
            echo "<h2>Modem Assets</h2><p>Details about modems...</p>";
            break;
        case 'ups':
            echo "<h2>UPS Assets</h2><p>Details about UPS systems...</p>";
            break;
        case 'storage':
            echo "<h2>Storage Assets</h2><p>Details about storage devices...</p>";
            break;
        case 'cctv':
            echo "<h2>CCTV Assets</h2><p>Details about CCTV systems...</p>";
            break;
        case 'switch':
            echo "<h2>Switch Assets</h2><p>Details about switches...</p>";
            break;
        default:
            echo "<h2>Welcome to Asset Management Console</h2>
                  <p>Click the list for more information.</p>";
    }
    ?>
</div>

</body>
</html>