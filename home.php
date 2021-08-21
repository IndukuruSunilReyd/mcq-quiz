<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
   //session_destroy();
}
if(isset($_GET['L']) && !empty($_GET['L']) && $_GET['L'] == 2){
    $_SESSION['level'] = 2;
}
if(empty($_SESSION['id'])|| empty($_SESSION['user_name']) || empty($_SESSION['level'])){
    header('location:login.php');
}
$alertType = (!empty($_SESSION['alert']))?$_SESSION['alert']:'hide';
$alertMessage = (!empty($_SESSION['message']))?$_SESSION['message']:'';
unset($_SESSION['alert'],$_SESSION['message']);

require_once("database.php");
require_once("utilities.php");
$level = $_SESSION['level'];
if($level == 1){
    $start = 1;
    $end = 10;
}else if($level == 2){
    $start = 11;
    $end = 20;
}
$uid=  $_SESSION['id'];
$sql="select * from quiz_users where id = $uid ";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($result);
if(!empty($result['correctAnswers']) || !empty($result['worngAnswers']) || !empty($result['totalAttempted'])){
    if(!empty($result['correctAnswersLevel2']) || !empty($result['worngAnswersLevel2']) || !empty($result['totalAttemptedLevel2'])){
        header('location:view.php');
    }
}

$sql_qry="select * from quiz_questions where id >= $start and  id <= $end";
$resultset = mysqli_query($conn,$sql_qry);
?>
<html>
<head>
<title>Register</title>
<?php include_once("css.php");?>
</head>
<body>
<input type="hidden" id="hideV" value="<?="U-".$_SESSION['id']."-T-".$_SESSION['level'];?>">
	<div class="container margin-top90px" >
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="javascript:void(0)"><?=strtoupper($_SESSION['user_name'])?></a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="javascript:void(0)">Level : <?=$_SESSION['level']?></a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li class="active"><a href="javascript:void(0)"><span  id="minutes"></span></a></li>
					<li class="active"><a href="javascript:void(0)"> <span  id="seconds"></span></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		<div>
		<div class="alert alert-<?=$alertType?> <?=$alertType?>">
			<strong><?=ucfirst($alertType)?>!</strong> <?=$alertMessage?> 
		</div>
		    <form class="form-horizontal"  name="quiz" id='quiz' method="post" action="result.php">
		    <?php  $i=1;  while ($questions = mysqli_fetch_assoc($resultset)){?>
		        <div id="Q-<?=$i?>" class="<?=($i==1)?'show':'hide'?>">
		        <div class="row">
				    <h3><?=$questions['question_name']?></h3>
					<input type="radio" id="Q_id_<?=$questions['answer1']?>" name="Q-<?=$i.'-L-'.$level?>" value="A" /> 
					<label for="Q_id_<?=$questions['answer1']?>">A) <?=$questions['answer1']?></label>
					<input type="radio" id="Q_id_<?=$questions['answer2']?>" name="Q-<?=$i.'-L-'.$level?>" value="B" /> 
					<label for="Q_id_<?=$questions['answer2']?>">B) <?=$questions['answer2']?> </label>
					<input type="radio" id="Q_id_<?=$questions['answer3']?>" name="Q-<?=$i.'-L-'.$level?>" value="C" /> 
					<label for="Q_id_<?=$questions['answer3']?>">C) <?=$questions['answer3']?> </label>
					<input type="radio" id=Q_id_<?=$questions['answer4']?> name="Q-<?=$i.'-L-'.$level?>" value="D" /> 
					<label for="Q_id_<?=$questions['answer4']?>">D) <?=$questions['answer4']?> </label>
                 </div>

				<div class="row btn-group">
					<button id="<?=$i?>" class="previous btn btn-success <?=($i!=1)?'show':'hide'?>" type="button">Previous</button>
					<button id="<?=$i?>" class="next btn btn-success <?=($i==10)?'hide':''?>" type="button" <?=($i==10)?'disabled':''?>>Next</button>
					<button id="<?=$i?>"  class="next btn btn-success <?=($i==10)?'show':'hide'?>" type="submit" <?=($i==10)?'':'disabled'?> name="submit">Submit</button>
				</div>


				</div>
				<?php $i++;}?>  
		    </form>
		</div>
	</div>
  <?php include_once("js.php");?>
  
  <script>
  var lastId = "<?=$end?>";
  $(document).on('click','.next',function(){
	    last=parseInt($(this).attr('id'));     
	    $('#Q-'+last).addClass('hide');
	    $('#Q-'+last).removeClass('show');
	    nex = last+1;
	    $('#Q-'+nex).removeClass('hide');
	    if(nex == lastId){
			//return alert("submit");
		}
	});
  $(document).on('click','.previous',function(){
	    last=parseInt($(this).attr('id'));     
	    $('#Q-'+last).addClass('hide');
	    pre = last-1;
	    $('#Q-'+pre).removeClass('hide');
  });
</script>
</body>
</html>