<?php
function OpenCon() {
$dbhost = "localhost";
$dbuser = "root";
$dbpass = ""; // Default is empty for XAMPP
$dbname = "assetmgmt";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
echo("Connection failed: " . $conn->connect_error);
}

return $conn;
}
function CloseCon($conn) {
$conn->close();
}
?>