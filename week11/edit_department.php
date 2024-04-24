<?php

$pagetitle = "Edit Departments";

require('mysqli_connect.php'); // use require because we want to force this to exist before running our queries

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // print_r($_POST);
        $department_id = $_POST['department_id'];
        $department_name = $_POST['department_name'];
        $num_of_employees = $_POST['num_of_employees'];
        $building_number = $_POST['building_number'];
        $status = $_POST['status'];

        $update_query = 
            "UPDATE DEPARTMENTS
            SET department_name = '$department_name',
            num_of_employees = $num_of_employees,
            building_number = '$building_number',
            status = '$status' 
            WHERE department_id = $department_id";

            // echo $update_query;
            
            $update_result = mysqli_query($connection, $update_query);
            if ($update_result){
                echo "<h4>Success! The department has been successfully updated!</h4><p><a href='list_departments.php'>Return to List</p>";
                
                exit;
            } else {
                echo "Failed";
            }

        exit("Testing");
    } else
    {
        $department_id = $_GET['id'];
        $query = "SELECT * FROM DEPARTMENTS WHERE department_id = $department_id";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
        echo "Department ID: " . $department_id . " ";
        echo $query;
        }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
    <h1><?php echo $pagetitle; ?></h1> 
    <form action="edit_department.php" method="post">
        <p>Department ID: <?php echo $row['department_id']; ?><input type="hidden" value="<?php echo $row['department_id']; ?>" name="department_id"></p>
        <p>Department Name: <input type="text" name="department_name" value="<?php echo $row['department_name']; ?>" required></p>
        <p>Number of Employees: <input type="text" name="num_of_employees" value="<?php echo $row['num_of_employees']; ?>" required></p>
        <p>Building Number: <input type="text" name="building_number" value="<?php echo $row['building_number']; ?>" required></p>
        <p>Status: <select id="status" name="status" required>
            <option value="<?php echo $row['status']; ?>" default>Currently - <?php echo $row['status']; ?></option>
            <option value="A">Active (A)</option>
            <option value="I">Inactive (I)</option>
        </select></p>
        <p><input type="submit"></p>
    </form>
</body>
</html>