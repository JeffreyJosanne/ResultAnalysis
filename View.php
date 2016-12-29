<html>
<head>
<script type="text/javascript">
function setVisibility(id, visibility) {
	document.getElementById(id).style.display = visibility;
	ajaxFunction();
	}
</script>
<?php

$conn=mysqli_connect("localhost","root","focus","result") or die("Could not connect");

	$bat=$_GET['sel_bat'];
    $dep=$_GET['sel_dep'];
    $sec=$_GET['sel_sec'];
    $sem=$_GET['sel_sem'];
    
	// Escape User Input to help prevent SQL Injection
//$bat = mysqli_real_escape_string($bat,"");
//$dep = mysqli_real_escape_string($dep,"");
//$sec = mysqli_real_escape_string($sec,"");

	//build query
$query = "select stud_details.reg_no AS REGISTER_NO,stud_details.st_name AS STUDENT_NAME ,
    							sum(db_result.gradeN*sub_details.credits)AS MARKS ,
								sum(sub_details.credits) AS TOTAL_MARKS,
								sum(db_result.gradeN*sub_details.credits)/sum(sub_details.credits)  as GPA 
    							from db_result,sub_details,stud_details 
								where db_result.reg_no=stud_details.reg_no 
								and db_result.sub_code=sub_details.s_code and stud_details.batch='$bat' and stud_details.sec='$sec' 
								and stud_details.dept='$dep' and (0=$sem  or sub_details.sem=$sem)
								group by db_result.reg_no,stud_details.st_name order by GPA desc";
	//Execute query
$qry_result = mysqli_query($conn,$query);

	//Build Result String
	
echo "<input type='button' id='hide' name='Hide' onclick='setVisibility('ajaxDiv', 'none')';  value='Hide'/>";
$display_string .= "<tr>";
$display_string .= "<th>REGISTER_NO</th>";




$display_string = "<table border=1>";
$display_string .= "<tr>";
$display_string .= "<th>REGISTER_NO</th>";
$display_string .= "<th>STUDENT_NAME</th>";
$display_string .= "<th>MARKS</th>";
$display_string .= "<th>TOTAL_MARKS</th>";
$display_string .= "<th>GPA</th>";
$display_string .= "</tr>";

// Insert a new row in the table for each person returned
while($row = mysqli_fetch_row($qry_result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row[0]</td>";
	$display_string .= "<td>$row[1]</td>";
	$display_string .= "<td>$row[2]</td>";
	$display_string .= "<td>$row[3]</td>";
	$display_string .= "<td>$row[4]</td>";
	$display_string .= "</tr>";
	
}
//echo "Query: " . $query . "<br />";
$display_string .= "</table>";
echo $display_string;

?>
