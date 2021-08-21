<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    //session_destroy();
}
if(empty($_SESSION['id'])|| empty($_SESSION['user_name']) || empty($_SESSION['level'])){
    header('location:login.php');
}
if(isset($_POST['submit'])){
    if(!empty($_SESSION['level'])){
        $correct = $incorrect = $left = 0;
        if($_SESSION['level'] == 1){
            $answers_L1  = array(
                'Q-1-L-1' => 'A',
                'Q-2-L-1' => 'B',
                'Q-3-L-1' => 'A',
                'Q-4-L-1' => 'B',
                'Q-5-L-1' => 'A',
                'Q-6-L-1' => 'A',
                'Q-7-L-1' => 'A',
                'Q-8-L-1' => 'A',
                'Q-9-L-1' => 'A',
                'Q-10-L-1' => 'A'
            );
            foreach ($answers_L1 as $key => $value) {
                if(isset($_POST[$key]) && $_POST[$key] == $value){
                    $correct ++;
                }else  if(isset($_POST[$key]) && $_POST[$key] != $value){
                    $incorrect ++;
                }else  if(!isset($_POST[$key])){
                    $left ++;
                }
            }
        }else if($_SESSION['level'] == 2){
            $answers_L2  = array(
                'Q-1-L2' => 'D',
                'Q-2-L-2' => 'D',
                'Q-3-L-2' => 'C',
                'Q-4-L-2' => 'C',
                'Q-5-L-2' => 'A',
                'Q-6-L-2' => 'A',
                'Q-7-L-2' => 'B',
                'Q-8-L-2' => 'B',
                'Q-9-L-2' => 'D',
                'Q-10-L-2' => 'C'
            );
            foreach ($answers_L2 as $key => $value) {
                if(isset($_POST[$key]) && $_POST[$key] == $value){
                    $correct ++;
                }else  if(isset($_POST[$key]) && $_POST[$key] != $value){
                    $incorrect ++;
                }else  if(!isset($_POST[$key])){
                    $left ++;
                }
            }
        }
        if(isset($correct) && isset($incorrect) && isset($left)){
            require_once("database.php");
            require_once("utilities.php");
            $t = 10-$left;
            $id = $_SESSION['id'];
            $sql_qry="update quiz_users set ";
            if( $_SESSION['level'] == 1){
                $sql_qry.= " correctAnswers = $correct,worngAnswers = $incorrect ,totalAttempted = $t,level = 2";
            }else if ($_SESSION['level'] == 2){
                $sql_qry.= " correctAnswersLevel2 = $correct,worngAnswersLevel2 = $incorrect ,totalAttemptedLevel2 = $t,level = 2";
            }
            $sql_qry.= " where id = $id";
            if(mysqli_query($conn,$sql_qry)){
                if($_SESSION['level'] == 1){
                    $_SESSION['alert'] = 'success';
                    $_SESSION['message'] = 'Ugraded to level2';
                    $_SESSION['level'] = 2;
                    header('location:home.php');
                }else{
                    header('location:view.php');
                }
            };
        }
    }else{
        header('location:login.php');
    }
}else{
   // header('location:home.php');
}

?>