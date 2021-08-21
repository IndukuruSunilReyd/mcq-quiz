<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(empty($_SESSION['id'])|| empty($_SESSION['user_name']) || empty($_SESSION['level'])){
    header('location:login.php');
}
if(isset($_POST['submit']) && !empty($_POST['user_email']) && !empty($_POST['user_password'])){
    require_once("database.php");
    require_once("utilities.php");
    
    $email = $_POST['user_email'];
    $email = cleanString($email);
    
    $password = $_POST['user_password'];
    $password = md5($password);
    
	$sql_qry="select id,user_name,level from quiz_users where user_email='$email' and user_password='$password'";
	$resultset = mysqli_query($conn,$sql_qry);
	$count=mysqli_num_rows($resultset);
	if($count==1){
		$row=mysqli_fetch_assoc($resultset);
		$_SESSION['id']=$row['id'];
		$_SESSION['level']=$row['level'];
		$_SESSION['user_name']=$row['user_name'];
	    header('location:home.php');
	}else if($count==0){
	    $_SESSION['alert'] = 'danger';
	    $_SESSION['message'] = 'User Not Found';
	    header('location:login.php');
	}
}else{
    $_SESSION['alert'] = 'danger';
    $_SESSION['message'] = 'Params Not Found';
    header('location:login.php');
}
?>