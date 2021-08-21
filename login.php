<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['id']) && !empty($_SESSION['id']) && !empty($_SESSION['level'])){
    header('location:home.php');
}
$alertType = (!empty($_SESSION['alert']))?$_SESSION['alert']:'hide';
$alertMessage = (!empty($_SESSION['message']))?$_SESSION['message']:'';  
unset($_SESSION['alert'],$_SESSION['message']);
?>
<html>
<head>
<title>Register</title>
<?php include_once("css.php");?>
</head>
<body>
	<div class="container">
		<h4 style="margin-top: 25px;">Login For Online Quiz</h4>
		<div class="alert alert-<?=$alertType?> <?=$alertType?>">
			<strong><?=ucfirst($alertType)?>!</strong> <?=$alertMessage?> 
		</div>
		<form method="post" action="loginController.php">
			<div class="form-group">
				<label>Email:</label> <input type="email" name="user_email"
					class="form-control" required />
			</div>
			<div class="form-group">
				<label>Password:</label> <input type="password" name="user_password"
					class="form-control" required />
			</div>
			<div class="form-group text-right">
				<button class="btn btn-primary btn-block" name="submit">Login</button>
			</div>
			<div class="form-group text-center">
				<span class="text-muted">Not Registered ?. </span> <a href="index.php">Register</a> 
			</div>
		</form>
	</div>
	<?php include_once("JS.php");?>
</body>
</html>