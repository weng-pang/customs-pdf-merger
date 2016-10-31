<!DOCTYPE html>
<?php 
/**
 * Form.php
 * This file contains the only form for this application
 * The form captures transaction serial, provider and its type, additonal information and personnel name.
 * all interface modification may be done here
 *
 *	@copyright Dominance of Kaugebra 2016
 *	@copyright KATS 2016
 *	@version 1.0
 *
 */

$dir = dirname(__FILE__);

?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title><?php echo'F&CS Electronic Document Merger';?></title>
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1> <?php echo 'F&CS Electronic Document Merger';?></h1>
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
			<hr />
			<div class="page-footer">
				<h6><?php echo '&copy; The Dominance of Kaugebra &copy; KATS 2016';?></h6>
				<?php 
				echo "<p>Full path to this dir: " . $dir . "</p>";
				echo "<p>Full path to a .htpasswd file in this dir: " . $dir . "/.htpasswd" . "</p>";
				echo "<p>".$_SERVER['DOCUMENT_ROOT']."</p>";
				?>
			</div>
		</div>
		
	</body>
</html>


<?php
