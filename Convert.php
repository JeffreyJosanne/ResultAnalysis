<?php

//include 'db.php';
//include('lock.php');
$conn=mysqli_connect("localhost","root","focus","result") or die("Could not connect");

			$s=$_POST["sem"];
			
			$call="CALL `result`.`convert_upload`($s)";
			mysqli_query($conn,$call);
			
			$del="DELETE FROM upload";
			$result = mysqli_query($conn,$del);
			
			if(!$call or !$result)
			{
				mysqli_query($conn,$call);
				echo "<script type=\"text/javascript\">
							alert(\"Invalid File.\");
							window.location = \"UploadFile.php\"
						</script>";
			}
		
	
		echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Converted.\");
						window.location = \"UploadSem.php\"
					</script>";
		mysqli_close($conn);

	?>
