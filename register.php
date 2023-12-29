<?php
session_start();


// التحقق من تسجيل الدخول
if (isset($_SESSION['user_id'])) {
    // إعادة توجيه المستخدمين غير المسجلين إلى صفحة تسجيل الدخول
    header('Location: home.php');
    exit;
}

include_once "inc/constants.php";
$errors=isset($_SESSION['errors'])?$_SESSION['errors']:[];
$oldValues=isset($_SESSION['old_values'])?$_SESSION['old_values']:[];

$nameErr="";
$emailErr="";
$passwordErr="";
$passwordConfirmationErr="";


$nameOld="";
$emailOld="";
if(count($errors) >0){
    $nameErr=isset($errors[NAME_ERROR_KEY])?$errors[NAME_ERROR_KEY]:"";
    $emailErr=isset($errors[EMAIL_ERROR_KEY])?$errors[EMAIL_ERROR_KEY]:"";
    $passwordErr=isset($errors[PASSWORD_ERROR_KEY])?$errors[PASSWORD_ERROR_KEY]:"";
    $passwordConfirmationErr=isset($errors[PASSWORD_CONFIRMATION_ERROR_KEY])?$errors[PASSWORD_CONFIRMATION_ERROR_KEY]:"";
    $nameOld=isset($oldValues["name"])?$oldValues["name"]:"";
    $emailOld=isset($oldValues["email"])?$oldValues["email"]:"";
}

$_SESSION['errors']=[];
?>



<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل جديد</title>
    <link href="inc/css/bootstrap.min.css" rel="stylesheet">
    <link href="inc/css/bootstrap.rtl.css" rel="stylesheet">
    <link href="inc/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <div class="col-lg-7 text-center text-lg-start">
                    <img src="inc/images/register.png" width="550px">
                </div>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form method="post" action="auth.php" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" 
                        value="<?php echo $nameOld ?>"
                        id="floatingInput" placeholder="ادخل اسمك">
                        <label for="floatingInput">الاسم</label>
                        <p class="err-txt"><?php echo $nameErr ?></p>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" 
                        value="<?php echo $emailOld ?>"
                        id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">البريد الاليكتروني</label>
                        <p class="err-txt"><?php echo $emailErr ?></p>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">كلمة السر</label>
                        <p class="err-txt"><?php echo $passwordErr ?></p>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">تأكيد كلمة السر</label>
                        <p class="err-txt"><?php echo $passwordConfirmationErr ?></p>

                    </div>

                    <button name="register" class="w-100 btn btn-lg btn-primary" type="submit">تسجيل</button>
                    <hr class="my-4">
                    <small class="text-body-secondary">بالضغط على تسجيل فإنك توافق على شروط الاستخدام.</small>
                    <a href="index.php" class="btn btn-secondary btn-sm">تسجيل دخول</a>

                </form>
            </div>
        </div>
    </div>
    <script src="inc/js/bootstrap.min.js"></script>
</body>

</html>