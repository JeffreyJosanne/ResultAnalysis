<html>
<head>
<script language="Javascript">

/*function OnButton1()
{
    document.form1.action = "Formats.php"
    document.form1.target = "_self";    // Open in a new window
    document.form1.submit();
    loadXMLDoc();             // Submit the page
   
    return true;
}*/

function ajaxFunction()
{
	 var xmlhttp;  // The variable that makes Ajax possible!
		
	 if (window.XMLHttpRequest) 
		 {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		 } 
	 else 
	  { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
		 
		 xmlhttp.onreadystatechange = function(){
		   if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		      var ajaxDisplay = document.getElementById("myDiv");
		      ajaxDisplay.innerHTML = xmlhttp.responseText;
		   }
		 }
		 // Now get the value from user and pass it to
		 // server script.
		 
		 var bat = document.getElementById('sel_bat').value;
		 var dep = document.getElementById('sel_dep').value;
		 var sem = document.getElementById('sel_sem').value;
		 var sec = document.getElementById('sel_sec').value;
		 ajaxRequest.open("POST", "Download.php", true);
		 ajaxRequest.send(null); 
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
					<form name="form1" class="form-horizontal well" method="post" onsubmit=""  
						 onreset="" 
						method="post" name="upload_excel" enctype="multipart/form-data">
						<fieldset>
							<legend> Semester and Overall Toppers</legend>
							<div class="control-group">
							<table>
							<tr>
								<td>																					
								<div class="control-label">
									<label>Batch</label>
									
									<select id="sel_bat" name="batch">
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
									
									<select id="sel_dep" name=dept>
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
									
									<select id="sel_sem" name=sem >
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
								
								<div class="control-label">
									<label>Section</label>
									
									<select id="sel_sec" name=sec >
									  <option value="0">ALL</option>
									  <option value="A">A</option>
									  <option value="B">B</option>
									  <option value="C">C</option>
									  <option value="D">D</option>
									  
									  
									</select>
									
									
								</div>
								</td>
								<td>
								
							<div class="control-group">
								<div class="controls">

									<div class="btn-group">
										<button type="submit" id="submit" name="view" onclick="ajaxFunction()"
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
										<button type="submit" id="submit" name="topper" onclick="return OnButton2();"
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
		
		
<div id="myDiv" style="width: 1000px; height: 250px; overflow: scroll; border: 1px SOLID black; background-color: #acc;">


</div>
</body>
</html>
