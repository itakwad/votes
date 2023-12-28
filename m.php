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
                    <input type="text" name="name" class="form-control" id="floatingInput"
                           placeholder="ادخل اسمك">
                    <label for="floatingInput">الاسم</label>
                    <p class="fs-6 text-danger"></p>

                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control"
                           id="floatingInput" placeholder="name@example.com"
                    
                    >
                    <label for="floatingInput">البريد الاليكتروني</label>
                    <p class="fs-6 text-danger"></p>

                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">كلمة السر</label>
                    <p class="fs-6 text-danger"></p>

                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">تأكيد كلمة السر</label>
                    <p class="fs-6 text-danger"></p>

                </div>

                <button name="register"  class="w-100 btn btn-lg btn-primary" type="submit">تسجيل</button>
                <hr class="my-4">
                <small class="text-body-secondary">بالضغط على تسجيل فإنك توافق على شروط الاستخدام.</small>
                <a href="index.php" class="btn btn-secondary btn-sm">تسجيل دخول</a>

            </form>
        </div>
    </div>
</div>
<script src="inc/js/bootstrap.min.js" ></script>
</body>
</html>