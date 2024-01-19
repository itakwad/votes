<?php
session_start();
// التحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
  // إعادة توجيه المستخدمين غير المسجلين إلى صفحة تسجيل الدخول

  header('Location: index.php');
  exit;
}

include_once "inc/conn.php";
if(isset($_GET['action'])){
    $user_id=$_SESSION['user_id'];
    $vote_id=$_GET['vote_id'];
    $vote_choice=$_GET['action'];
    
    $sql="INSERT INTO `user_votes`(`user_id`, `vote_id`, `vote_choice`) 
    VALUES ('$user_id','$vote_id','$vote_choice')";
    try{
        $conn->query($sql);
        header("Location: home.php?page=index&&vote_page=".$_GET['vote_page']);
    }catch(Exception $e){
        echo $e->getMessage();
    }

}

