<?php
session_start();

// التحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
    // إعادة توجيه المستخدمين غير المسجلين إلى صفحة تسجيل الدخول
    header('Location: index.php');
    exit;
}
include_once "inc/conn.php";
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$id'";

$row = $conn->query($sql);
$user = $row->fetch_assoc();
$imageUrl = $user['img_url'] != null ? "inc/images/users/" . $user['img_url'] : "inc/images/user.png";
$page=isset($_GET['page']) ?$_GET['page']:"index";

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];


$_SESSION['errors'] = [];
?>

<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>مرحبا : موقع استبيان</title>
    <link href="inc/css/bootstrap.min.css" rel="stylesheet">
    <link href="inc/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="inc/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row wrapper">
            <div class="col-md-2  text-light  mt-2 pt-3 bg-secondary" style="height: 100vh;">
                <div class="title text-center">
                    <p class="p-3 m-2 fs-5">لوحة تحكم العضو</p>
                    <hr>
                </div>
                <div class="d-flex align-items-center p-1 user-data">
                    <img src="<?php echo $imageUrl; ?>" width="60px">
                    <p><?php echo $user['name']; ?></p>
                </div>
                <hr>
                <ul class="nav  flex-column side-nav">
                    <li class="nav-item d-flex align-items-center">
                    <i class="fa fa-home" aria-hidden="true"></i>
  
                        <a class="nav-link" aria-current="page" href="home.php?page=index">الرئيسية</a>
                        
                    </li>
                    <li class="nav-item d-flex align-items-center">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
  
                        <a class="nav-link" aria-current="page" href="home.php?page=setting">حسابي</a>
                        
                    </li>
                    <li class="nav-item d-flex align-items-center">
                    <i class="fa fa-line-chart" aria-hidden="true"></i>
  
                        <a class="nav-link" aria-current="page" href="home.php?page=my_votes">استبياناتي</a>
                        
                    </li>
                  
                   
                </ul>

            </div>
            <div class="col m-2 pt-2 bg-light rounded page " style="height: 100vh;overflow-y: scroll;">
                <?php
                if(file_exists(__DIR__ ."/pages/$page.php")){
                    include_once "pages/$page.php" ;

                }else{
                
                    include_once "pages/404.php" ;
                
                }?>
                
            </div>
        </div>
    </div>


    <script src="inc/js/bootstrap.min.js"></script>
</body>

</html>