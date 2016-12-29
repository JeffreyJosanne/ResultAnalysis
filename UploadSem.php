<?php
//include ('db.php');
?>
<html>
<head>
<script language="Javascript">
function OnButton1()
{
    document.form1.action = "UploadSem.php"
    document.form1.target = "_self";    // Open in a new window
    document.form1.submit();             // Submit the page
   
    return true;
}

function OnButton2()
{
    document.form1.action = "Download.php"
    document.form1.target = "_self";    // Open in a new window
    document.form1.submit();             // Submit the page
    return true;
}
</script>
</head>

<body>
	<div id="wrap">
		<div class="container">
			<div class="row">
				<div class="span3 hidden-phone"></div>
				<div class="span6" id="form-login">
					<form class="form-horizontal well" action="UploadSemphp.php"
						method="post" name="upload_excel" enctype="multipart/form-data">
						<fieldset>
							<legend>Upload the Excel sheet</legend>
							<div class="control-group">
								<div class="control-label">
									<label>CSV/Excel File:</label>
																				
								</div>
								<div class="controls">
									<input type="file" name="file" id="file" class="input-large">
								</div>
							</div>

							<div class="control-group">
								<div class="controls">

									<div class="btn-group">
										<button type="submit" id="submit" name="Import"
											class="btn btn-primary button-loading"
											data-loading-text="Loading..." class="btn btn-primary">Submit</button>


									</div>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	
	
		<div id="wrap">
		<div class="container">
			<div class="row">
				<div class="span3 hidden-phone"></div>
				<div class="span6" id="form-login">
					<form class="form-horizontal well" action="Convert.php"
						method="post" name="upload_excel" enctype="multipart/form-data">
						<fieldset>
							<legend> Select Semester</legend>
							<div class="control-group">
								<div class="control-label">
									<label>CSV/Excel File:</label>
									
									<select name=sem>
									  <option value="1">SEM-1</option>
									  <option value="2">SEM-2</option>
									  <option value="3">SEM-3</option>
									  <option value="4">SEM-4</option>
									</select>
									
									
								</div>
							</div>

							<div class="control-group">
								<div class="controls">

									<div class="btn-group">
										<button type="submit" id="submit" name="Import"
											class="btn btn-primary button-loading"
											data-loading-text="Loading..." class="btn btn-primary">Submit</button>


									</div>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	
	<div id="wrap">
		<div class="container">
			<div class="row">
				<div class="span3 hidden-phone"></div>
				<div class="span6" id="form-login">
					<form name="form1" class="form-horizontal well" method="post" onsubmit=""  
						 onreset="" 
						method="post" name="upload_excel" enctype="multipart/form-data">
						<fieldset>
							<legend> Select</legend>
							<div class="control-group">
							<table>
							<tr>
								<td>																					
								<div class="control-label">
									<label>Batch</label>
									
									<select id="sel" name="batch">
									  <option value="0">Select</option>
									  <option value="2009">2009</option>
									  <option value="2010">2010</option>
									  <option value="2011">2011</option>
									  <option value="2012">2012</option>
									  <option value="2013">2013</option>
									  <option value="2014">2014</option>
									  <option value="2015">2015</option>
									  <option value="2016">2016</option>
									</select>
									
									
								</div>
								</td>
								<td>
								<div class="control-label">
									<label>Dept</label>
									
									<select name=dept>
									  <option value="IT">IT</option>
									  <option value="CSE">CSE</option>
									  <option value="BIO">BIO</option>
									  <option value="CHEM">CHEM</option>
									</select>
									
									
								</div>
								</td>
								<td>
								
								<div class="control-label">
									<label>Sem</label>
									
									<select name=sem >
									  <option value="0">ALL</option>
									  <option value="1">SEM-1</option>
									  <option value="2">SEM-2</option>
									  <option value="3">SEM-3</option>
									  <option value="4">SEM-4</option>
									  <option value="5">SEM-5</option>
									  <option value="6">SEM-6</option>
									  <option value="7">SEM-7</option>
									  <option value="8">SEM-8</option>
									  
									</select>
									
									
								</div>
								</td>
								<td>
								
							<div class="control-group">
								<div class="controls">

									<div class="btn-group">
										<button type="submit" id="submit" name="view" onclick="return OnButton1();"
											class="btn btn-primary button-loading"
											data-loading-text="Loading..." class="btn btn-primary">View</button>


									</div>
								</div>
							</div>
							</td>
							<td>
								
							<div class="control-group">
								<div class="controls">

									<div class="btn-group">
										<button type="submit" id="submit" name="download" onclick="return OnButton2();"
											class="btn btn-primary button-loading"
											data-loading-text="Loading..." class="btn btn-primary">Download</button>


									</div>
								</div>
							</div>
							</td>
							<tr>
							</table>
															
							</div>

						</fieldset>
					</form>
				</div>
			</div>
		</div>
		
		
<div style="width: 1000px; height: 250px; overflow: scroll; border: 1px SOLID black; background-color: #acc;">

<table>
  <tr>
    <td align="center">STUDENT DATA</td>
  </tr>
  <tr>
    <td>
      <table border="1">
      <tr>
        <td>REGISTER NO</td>
        <td>STUDENT_NAME</td>
        <td>NO_OF_SUBJECTS</td>
        
      </tr>
<?php
//the example of searching data with the sequence based on the field name
//search.php
			$conn=mysqli_connect("localhost","root","focus","result") or die("Could not connect");
			
			$bat=$_POST["batch"];
			
			$dep=$_POST["dept"];
			$sem=$_POST["sem"];
			
			$sel=" select stud_details.reg_no AS REGISTER_NO,stud_details.st_name AS STUDENT_NAME,count(distinct sub_CODE) 
			as NO_OF_SUBJECTS from db_result,stud_details,sub_details 
			where stud_details.reg_no=db_result.reg_no and sub_details.s_code=db_result.sub_code and stud_details.BATCH='$bat' 
			AND stud_details.DEPT='$dep' and (0='$sem'  or sub_details.sem='$sem') group by stud_details.reg_no";
			$result = mysqli_query($conn,$sel);
	while($data = mysqli_fetch_row($result)){
  echo("<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td></tr>");
}
?>
    </table>

  </td>

</tr>

</table>

</div>
</body>
</html>
