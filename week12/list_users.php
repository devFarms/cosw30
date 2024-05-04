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
    <header>
        <?php include 'nav.php'; ?>
    </header>
<?php 
require('mysqli_connect.php'); // use require because we want to force this to exist before running our queries

echo "<h1>List of Website Users</h1>";
//And now to perform a simple query to make sure it's working
$query = "SELECT * FROM BLOG_USERS_TBL";
$result = mysqli_query($connection, $query);

echo "<table><thead><td class='center'>ID</td><td>First Name</td><td>Last Name</td><td>Email Address</td><td>Role</td><td>Status</td><td>Action</td></thead>"; // open table and include table headings

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr><td class='center'>" . $row['user_id'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['email_address'] . "</td><td>" . $row['role'] . "</td><td>" . $row['status'] . "</td><td><a href='user.php?id=" . $row['user_id'] . "'>View</a> / <a href='edit_user.php?id=" . $row['user_id'] . "'>Edit</a></td></tr>";
}
echo "</table>"; // close table

?>
</body>
</html>