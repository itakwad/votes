<?php
session_start();


include_once "inc/constants.php";
include_once "inc/conn.php";
$errors=[];

$name="";
$email="";
$password="";
$confirm_password="";
if(isset($_POST)){
    //تسجيل جديد
    if(isset($_POST['register'])){
        //تنظيف البيانات
        $name=filterInput($_POST["name"]);
        $email=filterInput($_POST["email"]);
        $password=filterInput($_POST["password"]);
        $confirm_password=filterInput($_POST["password_confirmation"]);
        //التحقق
        if(empty($name)){
            $errors[NAME_ERROR_KEY]=ERROR_REQUIRE_MSG;
        }
        if(empty($email)){
            $errors[EMAIL_ERROR_KEY]=ERROR_REQUIRE_MSG;
        }
        if(empty($password)){
            $errors[PASSWORD_ERROR_KEY]=ERROR_REQUIRE_MSG;
        }
        if(empty($confirm_password)){
            $errors[PASSWORD_CONFIRMATION_ERROR_KEY]=ERROR_REQUIRE_MSG;
        }
        if(count($errors)>0){
            $_SESSION['errors']=$errors;
            $_SESSION['old_values']=$_POST;

            header("Location: register.php");
            exit;
        }

        if(!isName($name)){
            $errors[NAME_ERROR_KEY]=NAME_ERROR_INVALID_MSG;
        }
        if(!isEmail($email)){
            $errors[EMAIL_ERROR_KEY]=EMAIL_ERROR_INVALID_MSG;
        }
        if (strlen($password) < 6 || strlen($confirm_password) < 6) {
            $errors[PASSWORD_ERROR_KEY]=PASSWORD_ERROR_INVALID_MSG;
            $errors[PASSWORD_CONFIRMATION_ERROR_KEY]=PASSWORD_ERROR_INVALID_MSG;

        }
        if ($confirm_password !== $password) {
            $errors[PASSWORD_CONFIRMATION_ERROR_KEY] = PASSWORD_ERROR_CONFIRM_MSG;

        }
        if(count($errors)>0){
            $_SESSION['errors']=$errors;
            $_SESSION['old_values']=$_POST;
            header("Location: register.php");
            exit;
        }

        // اضلفة المستخدم
        $options = [
            'cost' => 11
        ];
       $hash_pwd= password_hash($password,PASSWORD_BCRYPT,$options);
       $sql = "INSERT INTO users (name, email, password)VALUES ('$name', '$email', '$hash_pwd')";
       try{
        $conn->query($sql);
        $_SESSION['user_id'] = $conn->insert_id;
        header("location: home.php");
        exit;

       }catch(Exception $e){
        if($e->getCode()===1062){
            $errors[EMAIL_ERROR_KEY]=EMAIL_ERROR_EXISTS_MSG;

            $_SESSION['errors']=$errors;
            $_SESSION['old_values']=$_POST;
            header("Location: register.php");
            exit;
        }
       }

       

    }



      //تسجيل دخول
      if(isset($_POST['login'])){

      }
}


function filterInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function isName($data)
{
    if (!preg_match("/^[a-zA-Z-' ]*$/", $data)) {
        return false;
    }
    return true;
}

function isEmail($data)
{
    if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    return true;
}
