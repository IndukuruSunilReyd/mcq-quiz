<html>
<head>
<title>Register</title>
<?php include_once("css.php");?>
</head>
<body>
	<div class="container">
		<h4 style="margin-top: 25px;">Register For Online Quiz</h4>
		<form method="post" action="register.php">
			<div class="form-group">
				<label>User Name:</label> <input type="text" name="user_name"
					class="form-control" required />
			</div>
			<div class="form-group">
				<label>Email:</label> <input type="email" name="user_email"
					class="form-control" required />
			</div>
			<div class="form-group">
				<label>Password:</label> <input type="password" name="user_password"
					class="form-control" required />
			</div>
			<div class="form-group text-right">
				<button class="btn btn-primary btn-block" name="submit">Register</button>
			</div>
			<div class="form-group text-center">
				<span class="text-muted">Already Registered ?. </span> <a href="login.php">Login</a> 
			</div>
		</form>
	</div>
	<?php include_once("js.php");?>
</body>
</html>