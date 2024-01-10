<?php
session_start();

// التحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
    // إعادة توجيه المستخدمين غير المسجلين إلى صفحة تسجيل الدخول
    header('Location: index.php');
    exit;
}
include_once "inc/constants.php";
include_once "inc/conn.php";
$id=$_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$id'";

$row=$conn->query($sql);
$user=$row->fetch_assoc();
if (isset($_POST['change_image'])){
    $errors= array();
    $file_name = $user['id']."_img";
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $tmp=explode('.',$_FILES['image']['name']);
    $file_ext=strtolower(end($tmp));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="غير مسموح بهذا النوع من الملفات";
    }
    
    if($file_size > 2097152){
       $errors[]='حجم الصورة اكبر من 2 ميجا';
    }
    
    if(empty($errors)==true){
        $file_name=$file_name.".".$file_ext;
       move_uploaded_file($file_tmp,"inc/images/users/".$file_name);
       // تغيير المستخدم

       $sql="UPDATE users set img_url='$file_name' WHERE id ='$id'";
       $conn->query($sql);
       header("Location: home.php?page=setting");
       exit;
    }else{
       $_SESSION['errors']=$errors;
       header("Location: home.php?page=setting");
       exit;
    }
 
}


if (isset($_GET['delete'])){
    unlink("inc/images/users/" . $user['img_url']);
    
       $sql="UPDATE users set img_url=null WHERE id ='$id'";
       $conn->query($sql);
       header("Location: home.php?page=setting");
 
 
}
if(isset($_POST['user_data'])){
    $name = $_POST['name'];
    $preferences=[];
    if(isset($_POST['preferences'])){
        $preferences = $_POST['preferences'];
    }
    $serializedPreferences=serialize($preferences);


    $sql="UPDATE users set name='$name',preferences='$serializedPreferences' WHERE id ='$id'";
    $conn->query($sql);
    header("Location: home.php?page=setting");
    exit;


}