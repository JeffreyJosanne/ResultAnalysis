<?php 

if (isset($_POST['view'])) {
$conn=mysqli_connect("localhost","root","focus","result") or die("Could not connect");
	
 	$bat=$_POST["batch"];
    $dep=$_POST["dept"];
    $sem=$_POST["sem"];
    $sec=$_POST["sec"];
	
$sel=" select stud_details.reg_no AS REGISTER_NO,stud_details.st_name AS STUDENT_NAME ,
    							sum(db_result.gradeN*sub_details.credits)AS MARKS ,
								sum(sub_details.credits) AS TOTAL_MARKS,
								sum(db_result.gradeN*sub_details.credits)/sum(sub_details.credits)  as GPA 
    							from db_result,sub_details,stud_details 
								where db_result.reg_no=stud_details.reg_no 
								and db_result.sub_code=sub_details.s_code and stud_details.batch=$bat and stud_details.sec='$sec' 
								and stud_details.dept='$dep' and sub_details.sem=$sem
								group by db_result.reg_no,stud_details.st_name order by GPA desc";
$result = mysqli_query($conn,$sel);

$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>REGISTER NO</th>";
$display_string .= "<th>Student Name</th>";
$display_string .= "<th>Marks</th>";
$display_string .= "<th>Total Marks</th>";
$display_string .= "<th>GPA</th>";
$display_string .= "</tr>";

// Insert a new row in the table for each person returned
while($row = mysqli_fetch_array($result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row[REGISTER_NO]</td>";
	$display_string .= "<td>$row[STUDENT_NAME]</td>";
	$display_string .= "<td>$row[MARKS]</td>";
	$display_string .= "<td>$row[TOTAL_MARKS]</td>";
	$display_string .= "<td>$row[GPA]</td>";
	$display_string .= "</tr>";

}
echo "Query: " . $result . "<br />";
$display_string .= "</table>";
echo $display_string;

/*while($data = mysqli_fetch_row($result)){
	echo("<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td></tr>");
}*/
}

if (isset($_POST['topper'])) {

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    $output = fopen('php://output', 'w');

    fputcsv($output, array('REGISTER_NO', 'STUDENT_NAME', 'MARKS','TOTAL_MARKS','GPA'));
    $con = mysqli_connect('localhost', 'root', 'focus', 'result');
    $bat=$_POST["batch"];
    $dep=$_POST["dept"];
    $sem=$_POST["sem"];
    $sec=$_POST["sec"];
    $rows = mysqli_query($con, "select stud_details.reg_no AS REGISTER_NO,stud_details.st_name AS STUDENT_NAME ,
    							sum(db_result.gradeN*sub_details.credits)AS MARKS ,
								sum(sub_details.credits) AS TOTAL_MARKS,
								sum(db_result.gradeN*sub_details.credits)/sum(sub_details.credits)  as GPA 
    							from db_result,sub_details,stud_details 
								where db_result.reg_no=stud_details.reg_no 
								and db_result.sub_code=sub_details.s_code and stud_details.batch=$bat and stud_details.sec='$sec' 
								and stud_details.dept='$dep' and sub_details.sem=$sem
								group by db_result.reg_no,stud_details.st_name order by GPA desc;");
    
    while ($row = mysqli_fetch_assoc($rows)) {
      fputcsv($output, $row);
    }
    fclose($output);
    mysqli_close($con);
  }
?>

