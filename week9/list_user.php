<!DOCTYPE html>
<html>
<head>
<title>List Users</title>
<style>
td {
width: 100px;
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
require('conn_mysqli.php'); // use require because we want to force this to exist before running our queries

$first_name = "Bruce";
$last_name = "Wayne";
$password = "98765";
$email_address = "bruce@gotham.com";


$q = "INSERT INTO temp_users (email_address, first_name, last_name, password, create_date, last_login) 
      VALUES ('$email_address', '$first_name', '$last_name', '$password', NOW(), NOW() )";

echo $q;

$r = @mysqli_query($connection, $q);

if ($r) { // If it ran OK.
  echo "<p>You are now registered with our system.</p>"; }
else { // if there was an error and it did not run correctly show the error message from the system
  echo "<p>An error occurred. " . mysqli_error($connection) . "</p>";
}      

echo "<h1>List of Website Users</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM temp_users";
$result = mysqli_query($connection, $query);


echo "<table><thead><td class='center'>ID</td><td>Email Address</td></thead>"; // open table and include table headings

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr><td class='center'>" . $row['user_id'] . "</td><td>" . $row['email_address'] . "</td></tr>";
}
echo "</table>"; // close table

?>
</body>
</html>