<?php
session_start();
// التحقق من تسجيل الدخول
if (isset($_SESSION['user_id'])) {
  // إعادة توجيه المستخدمين غير المسجلين إلى صفحة تسجيل الدخول
  header('Location: home.php');
  exit;
}


?>



<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>مرحبا : موقع استبيان</title>
    <link href="inc/css/bootstrap.min.css" rel="stylesheet">
    <link href="inc/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="inc/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container px-4 py-5">
      <div class="row align-items-center py-5">
         <div class="col-lg-7 text-center text-lg-start">
            <h6 class="display-3 fw-bold lh-3 text-body-emphasis site-title">
                استبيان
            </h6>
            <h3 class="fw-bold lh-3 text-body-emphasis mb-3">
                 قم بتعبئة الاستبيان وشاركنا آرائك
            </h3>
            <p class="col-lg-10 fs-5 text-title">
                نحن نقدر آرائك ووجهات نظرك! يسعدنا أن ندعوك للمشاركة في استبياننا القصير وتقديم رأيك في موضوع مهم. يساعد تعبئة الاستبيان في تحسين خدماتنا وفهم احتياجاتك بشكل أفضل. نحن نضمن سرية جميع المعلومات التي تقدمها ونستخدمها فقط لأغراض البحث والتحليل
            </p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form action="auth.php" method="post" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control"
                           id="email" placeholder="name@example.com" />
                    <label for="email">البريد الاليكتروني</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control"
                     id="password" placeholder="password"/>
                    <label for="password">كلمة السر</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">دخول</button>
                <hr class="my-4">
                <small class="text-body-secondary">بالضغط على تسجيل فإنك توافق على شروط الاستخدام.</small>
                <a href="register.php" class="btn btn-secondary btn-sm">تسجيل جديد</a>
            </form>
        </div>
      </div>
    </div>


    <script src="inc/js/bootstrap.min.js"></script>
  </body>
</html>