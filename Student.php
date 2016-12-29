<?php

//include 'db.php';
//include('lock.php');
$conn=mysqli_connect("localhost","root","focus","result") or die("Could not connect");
if(isset($_POST["Import"])){
	$filename=$_FILES["file"]["tmp_name"];
	if($_FILES["file"]["size"] > 0)
	{
		$file = fopen($filename, "r");
		while (($emapData = fgetcsv($file,10000000, ",")) !== FALSE)
		{
			$sql = "INSERT INTO stud_details(reg_no,st_name,dept,batch,sec) VALUES('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]')";
			
			// mysqli_query($conn,$sql);
			$sql1="DELETE FROM stud_details WHERE s_code=''";
			$result = mysqli_query($conn,$sql);
			mysqli_query($conn,$sql1);
			//  $result='FALSE';
			 
			 
			 
			if(!$result )
			{
				mysqli_query($conn,$sql);
				echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"UploadFile.php\"
						</script>";
			}
		}
		fclose($file);
		echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"UploadFile.php\"
					</script>";
		mysqli_close($conn);

	}
}
?>