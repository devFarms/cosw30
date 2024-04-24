<!DOCTYPE html>
<html>
<head>
<title>List Departments</title>
<style>
td {
padding: 0 10px;
}
thead {
font-weight: bold;
}
.center {
text-align:center;
}

</style>
</head>
<body>
<?php 
require('mysqli_connect.php'); // use require because we want to force this to exist before running our queries

echo "<h1>List of Departments</h1>";
if(isset($_GET['msg'])) {
    echo "<h4>Your record has been updated.</h4>";
}
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM DEPARTMENTS";
$result = mysqli_query($connection, $query);


echo "<table><thead><td class='center'>ID</td><td>Department Name</td><td># of Employees</td><td>Building #</td><td>Status</td><td>Action</td></thead>"; // open table and include table headings

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr><td class='center'>" . $row['department_id'] . "</td><td>" . $row['department_name'] . "</td><td>" . $row['num_of_employees'] . "</td><td>" . $row['building_number'] . "</td><td>" . $row['status'] . "</td><td><a href='edit_department.php?id=" . $row['department_id'] . "'>Edit</a></td></tr>";
}
echo "</table>"; // close table

?>
</body>
</html>