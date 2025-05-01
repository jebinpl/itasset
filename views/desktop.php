
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
    <h2 style="text-align: center; flex: 1; margin: 0;">DESKTOP LIST</h2>
    <a href="?page=desktop&action=add">
        <button style="margin-left: auto; padding: 6px 12px;">Add New</button>
    </a></div>';
  
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Device ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Model</th>
            <th>Specification</th>
            <th>OS</th>
            <th>HDD</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        

        $sql = "SELECT * FROM assetinfo";
        $result = $conn->query($sql);
        $i = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $row['deviceid'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['dept'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['spec'] . "</td>";
                echo "<td>" . $row['os'] . "</td>";
                echo "<td>" . $row['hdd'] . "</td>";
                echo "<td>";
                echo "<a href='add_desktop_form.php?id=" . $row['deviceid'] . "'>View</a> | ";
                echo "<a href='add_desktop_form.php?id=" . $row['deviceid'] . "'>Edit</a> | ";
                echo "<a href='add_desktop_form.php?id=" . $row['deviceid'] . "' onclick=\"return confirm('Are you sure to delete?')\">Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>
  <?php
        
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    include('add_desktop_form.php');
}
?>



