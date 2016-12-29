<?php
//include ('db.php');
?>
<html>
<body>
	<div id="wrap">
		<div class="container">
			<div class="row">
				<div class="span3 hidden-phone"></div>
				<div class="span6" id="form-login">
					<form class="form-horizontal well" action="Subject.php"
						method="post" name="upload_excel" enctype="multipart/form-data">
						<fieldset>
							<legend>Upload the Subject Details</legend>
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
	<div id="wrap">
		<div class="container">
			<div class="row">
				<div class="span3 hidden-phone"></div>
				<div class="span6" id="form-login">
					<form class="form-horizontal well" action="student.php"
						method="post" name="upload_excel" enctype="multipart/form-data">
						<fieldset>
							<legend>Upload Student Details</legend>
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
	
</body>
</html>
