<?php

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
     echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>New desktop added successfully.</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>






<div style="
    width: 400px;
    background-color: #e5ad79;
    border-radius: 20px;
    padding: 20px;
    position: relative;
    margin: 0 auto;
    margin-top: 50px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
">
    <div style="
        text-align: center;
        font-weight: bold;
        color: #a0333f;
        font-size: 20px;
        margin-bottom: 20px;
    ">
        Add New
        <span style="float: right; cursor: pointer;" onclick="this.parentElement.parentElement.style.display='none';">
            <b>X</b>
        </span>
    </div>

    <form method="POST" action="index.php">
        <label>Device ID</label><br>
        <input type="text" name="device_id" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Emp ID</label><br>
        <input type="text" name="emp_id" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Name</label><br>
        <input type="text" name="name" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Department</label><br>
        <input type="text" name="department" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Model</label><br>
        <input type="text" name="model" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Specification</label><br>
        <input type="text" name="specification" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Operating System</label><br>
        <input type="text" name="os" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>HDD</label><br>
        <input type="text" name="hdd" required style="width: 100%; margin-bottom: 20px;"><br>

        <div style="text-align: center;">
            <button type="submit" style="
                background-color: #add8e6;
                padding: 5px 15px;
                border-radius: 10px;
                border: none;
                font-weight: bold;
                cursor: pointer;
            ">
                Submit
            </button>
        </div>
    </form>
</div>
