<html>
<head>
<style type="text/css">
#ajaxDiv {
position: absolute;
left: 10px;
top: 35px;
height:300px;
width: 800px;
padding: 10px;
color: black;
display: none;
overflow: scroll; border: 1px SOLID black; background-color: #acc;
}
</style>
<script language="javascript" type="text/javascript">

//Browser Support Code
function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.
 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
      var ajaxDisplay = document.getElementById('ajaxDiv');
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
 }
 // Now get the value from user and pass it to
 // server script.
	 var bat = document.getElementById('sel_bat').value;
	 var dep = document.getElementById('sel_dep').value;
	 var sem = document.getElementById('sel_sem').value;
	 var sec = document.getElementById('sel_sec').value;
	 var v1 = document.getElementById('view').value;
 var queryString = "?sel_bat=" + bat  ;
 queryString +=  "&sel_dep=" + dep + "&sel_sem=" + sem + "&sel_sec=" + sec + "&view=" + v1;
 ajaxRequest.open("GET", "View.php" + queryString, true);
 ajaxRequest.send(null); 
}

function OnButton2()
{
    document.form1.action = "Download.php"
    document.form1.target = "_self";    // Open in a new window
    document.form1.submit();             // Submit the page
    return true;
}

function setVisibility(id, visibility) {
	document.getElementById(id).style.display = visibility;
	ajaxFunction();
	}


</script>
</head>
<body>
<form name='myForm' method='post' >
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
									  <option value="2013" selected>2013</option>
									  <option value="2014">2014</option>
									  <option value="2015">2015</option>
									  <option value="2016">2016</option>
									</select>
									
									
								</div>
								</td>
								
								<td>
								<div class="control-label">
									<label>Dept</label>
									
									<select id="sel_dep" name="dept">
									  <option value="IT" selected>IT</option>
									  <option value="CSE">CSE</option>
									  <option value="BIO">BIO</option>
									  <option value="CHEM">CHEM</option>
									</select>
									
									
								</div>
								</td>
								<td>
								
								<div class="control-label">
									<label>Sem</label>
									
									<select id="sel_sem" name="sem" >
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
									
									<select id="sel_sec" name=sec>
									  <option value="0">ALL</option>
									  <option value="A">A</option>
									  <option value="B" selected>B</option>
									  <option value="C">C</option>
									  <option value="D">D</option>
									  
									 </select>
								
								</div>
								</td>
								<td>
								<div class="control-group">
								<div class="controls">

							<div class="btn-group">
								<input type='button' id='view' name='view' onclick="setVisibility('ajaxDiv', 'inline')"  value='View'/>
								

								</div>
								</div>
							</div>
							
								</td>
								
								
							<td>
								
							<div class="control-group">
								<div class="controls">

									<div class="btn-group">
										<input type="button" id="submit" name="topper" onclick="return OnButton2();"
											class="btn btn-primary button-loading" value="Download"
											data-loading-text="Loading..." class="btn btn-primary"/>


									</div>
								</div>
							</div>
							</td>
								
								</tr>
								</table>

</form>
<div id="ajaxDiv">
<input type='button' id='hide' name='Hide' onclick="setVisibility('ajaxDiv', 'none')"  value='Hide'/>
<div  >
</div>
</div>
</body>
</html>
