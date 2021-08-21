<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
   //session_destroy();
}
if(empty($_SESSION['id'])|| empty($_SESSION['user_name']) || empty($_SESSION['level'])){
    header('location:login.php');
}
require_once("database.php");
require_once("utilities.php");
$uid=  $_SESSION['id'];
$sql="select * from quiz_users where id = $uid ";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($result);
?>
<html>
<head>
<title>Your Results</title>
<?php include_once("css.php");?>
</head>
<body>
	<div class="container margin-top90px" >
	     <nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="javascript:void(0)"><?=strtoupper($_SESSION['user_name'])?></a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
	    <h3>Level 1</h3> 
		<p>correct : <?=$result['correctAnswers']?></p>
		<p>wrong : <?=$result['worngAnswers']?></p>
		<p>attempted : <?=$result['totalAttempted']?></p>
		
		 <h3>Level 2</h3> 
		<p>correct : <?=$result['correctAnswersLevel2']?></p>
		<p>wrong : <?=$result['worngAnswersLevel2']?></p>
		<p>attempted : <?=$result['totalAttemptedLevel2']?></p>
	</div>
</body>
</html>