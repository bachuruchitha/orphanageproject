<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

	<div class="container center-div shadow p-4 mt-5">
	<div class="row justify-content-center mb-5" style="color:blue;"><h2>ADMIN LOGIN PAGE</h2></div>
		<div class="row justify-content-center mb-5">
			<div class="admin-form shadow p-2 ">
					<form action="logincheck.php" method="POST">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="user" value="" class="form-control" autocomplete="off">
							
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" value="" class="form-control" autocomplete="off">
						</div>
						<input type="submit" class="btn btn-success" name="submit" >
				</form>
			</div>
		</div>
	</div>

</body>
</html>