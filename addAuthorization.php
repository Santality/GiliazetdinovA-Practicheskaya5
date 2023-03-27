<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "giliaz");
if(!empty($_POST['phone']) && !empty($_POST['password'])){
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $user_info = mysqli_fetch_array(mysqli_query($conn, "select * from users where phone = $phone"));
    $checkphone = $user_info['phone'];
    $checkpassword = $user_info['password'];
    if($phone = $checkphone && $password = $checkpassword){
        $role = $user_info['role'];
        $_SESSION['role'] = $role;
        echo "<script>alert('Авторизация прошла успешно!'); location.href='/';</script>";
    }else{
        echo "<script>alert('Неправильный логин или пароль!'); location.href='/authorization.php';</script>";
    }
}else{
    echo "<script>alert('Ошибка авторизации! Попробуйте снова.'); location.href='/authorization.php';</script>";
}
?> 