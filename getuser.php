<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
//$q = $_GET['q'];

$bat=$_GET['batch'];
$dep=$_GET['dept'];


$con = mysqli_connect('localhost','root','focus','result');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

//mysqli_select_db($con,"result");
//$sql="SELECT * FROM stud_details WHERE dept = '".$q."'";

$sel="select reg_no,st_name from stud_details where batch='$bat' and dept='$dep'";


$result = mysqli_query($con,$sel);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['reg_no'] . "</td>";
    echo "<td>" . $row['st_NAME'] . "</td>";
    
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>