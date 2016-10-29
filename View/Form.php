<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title><?php echo'Testing Only';?></title>
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1> <?php echo 'Testing';?></h1>
			</div>
			<form action="index.php" method="post" enctype="multipart/form-data" >
				<p>Please enter the following:</p>
				<div class="row form-group">
					<div class="col-sm-4"><input type="text" name="serial" class="form-control" style="display:inline; width: 95%;"placeholder="16999"/><label for="serial"> H</label></div>
					<div class="col-sm-4"><input type="text" name="provider" class="form-control" placeholder="Dominance"/></div>
					<div class="col-sm-4"><input type="text" name="type" class="form-control" placeholder="Service"/></div>
				</div>
				<div class="row form-group">
					<div class="col-sm-8"><input type="text" name="personnel" value="W. L. Pang" class="form-control"/></div>
				</div>
				<div class="row form-group">
					<div class="col-sm-8"><input type="text" name="addition" class="form-control" placeholder="Additional Information"/></div>
				</div>
				<div class="row form-group">
					<div class="col-sm-8"><input type="file" name="documentUpload" id="documentUpload"></div>
				</div>
				<div class="row">
					<div class="col-sm-4"><button type="submit" value="Submit" class="btn btn-primary">Submit</button></div>
				</div>
			</form>
		</div>
		
	</body>
</html>


<?php
