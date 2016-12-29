<?php

//include 'db.php';
include('lock.php');
$conn=mysqli_connect("localhost","root","focus","result") or die("Could not connect");
if(isset($_POST["Import"])){
	$filename=$_FILES["file"]["tmp_name"];
	if($_FILES["file"]["size"] > 0)
	{
		$file = fopen($filename, "r");
		while (($emapData = fgetcsv($file,1000000, ",")) !== FALSE)
		{
			$sql = "INSERT INTO sub_details(s_code,s_name,type,credits,sem,reg) VALUES('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
			
			// mysqli_query($conn,$sql);
			$sql1="DELETE FROM sub_details WHERE s_code=''";
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
