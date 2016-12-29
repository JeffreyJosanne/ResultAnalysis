<?php

//include 'db.php';
//include('lock.php');
$conn=mysqli_connect("localhost","root","focus","result") or die("Could not connect");
if(isset($_POST["Import"])){
	$filename=$_FILES["file"]["tmp_name"];
	if($_FILES["file"]["size"] > 0)
	{
		$del1="DELETE FROM upload";
		mysqli_query($conn,$del1);
		$file = fopen($filename, "r");
		while (($emapData = fgetcsv($file,10000000, ",")) !== FALSE)
		{

			
			
			
			$ins = "INSERT INTO upload(code,grade) VALUES('$emapData[0]','$emapData[1]')";
				
			// mysqli_query($conn,$sql);
			$del="DELETE FROM upload WHERE code='' or code='name'";
			
			
			
			$result = mysqli_query($conn,$ins);
			mysqli_query($conn,$del);
			
			
			
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
						window.location = \"UploadSem.php\"
					</script>";
		mysqli_close($conn);

	}
}
?>
