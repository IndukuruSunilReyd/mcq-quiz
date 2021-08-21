<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(empty($_SESSION['id'])|| empty($_SESSION['user_name']) || empty($_SESSION['level'])){
    header('location:login.php');
}
if(isset($_POST['submit']) && !empty($_POST['user_name']) && !empty($_POST['user_email']) && !empty($_POST['user_password'])){
    require_once("database.php");
    require_once("utilities.php");
    
    $name = $_POST['user_name'];
    $name = cleanString($name);
    
    $email = $_POST['user_email'];
    $email = cleanString($email);
    
    $password = $_POST['user_password'];
    $password = md5(cleanString($password));
    
    $query="select user_email from quiz_users WHERE user_email = '$email'";
    $result=mysqli_query($conn,$query);
    
    if((mysqli_num_rows($result))>0)
    {
        $_SESSION['alert'] = 'danger';
        $_SESSION['message'] = 'User Already Exists!';
        header("refresh:0;url=login.php");
    }
    else
    {
        $sql_qry = "insert into quiz_users(user_name,user_email,user_password) values('".$name."','".$email."','".$password."')";
        $result = mysqli_query($conn, $sql_qry) or die(mysqli_error($conn));
        if ($result){
            $_SESSION['alert'] = 'success';
            $_SESSION['message'] = 'User Registered Successfully!';
            header('location:login.php');
        }else{
            $_SESSION['alert'] = 'danger';
            $_SESSION['message'] = 'Something Went Wrong!';
            header('location:login.php');
        }
    }
}else{
    $_SESSION['alert'] = 'danger';
    $_SESSION['message'] = 'Params Not Found';
    header('location:login.php');
}

?>