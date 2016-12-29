<?php 

if (isset($_POST['view'])) {
$conn=mysqli_connect("localhost","root","focus","result") or die("Could not connect");
	
$bat=$_POST["batch"];
$dep=$_POST["dept"];
$sem=$_POST["sem"];
	
$sel=" select stud_details.reg_no AS REGISTER_NO,stud_details.st_name AS STUDENT_NAME,count(distinct sub_CODE) as NO_OF_SUBJECTS from db_result,stud_details,sub_details
where stud_details.reg_no=db_result.reg_no and sub_details.s_code=db_result.sub_code and stud_details.BATCH=$bat AND stud_details.DEPT='$dep' and (0=$sem  or sub_details.sem=$sem) group by stud_details.reg_no";
$result = mysqli_query($conn,$sel);
while($data = mysqli_fetch_row($result)){
	echo("<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td></tr>");
}
}

if (isset($_POST['download'])) {

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    $output = fopen('php://output', 'w');

    fputcsv($output, array('Reg_No', 'Stud_Name', 'No_of_subjects'));
    $con = mysqli_connect('localhost', 'root', 'focus', 'result');
    $bat=$_POST["batch"];
    $dep=$_POST["dept"];
    $sem=$_POST["sem"];
    
    $rows = mysqli_query($con, "select stud_details.reg_no AS REGISTER_NO,stud_details.st_name AS STUDENT_NAME,
    		count(distinct sub_CODE) as NO_OF_SUBJECTS from db_result,stud_details,sub_details where stud_details.reg_no=db_result.reg_no 
    		and sub_details.s_code=db_result.sub_code and stud_details.BATCH='$bat' 
    		AND stud_details.DEPT='$dep' and (0='$sem'  or sub_details.sem='$sem') group by stud_details.reg_no");
    

    while ($row = mysqli_fetch_assoc($rows)) {
      fputcsv($output, $row);
    }
    fclose($output);
    mysqli_close($con);
  }
?>
