<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "giliaz");
if(!empty($_FILES['photo']['tmp_name'])){
    $path = "img/" . $_FILES['photo']['name'];
    $filename = $_FILES['photo']['name'];
}else{
    $filename = "-";
}
if(!empty($_POST)){
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $patronymic = !empty($_POST["patronymic"])?$_POST["patronymic"]:'null';
    $birthday = $_POST["birthday"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $pass = $_POST["password"];
    $awards = !empty($_POST["awards"])?$_POST["awards"]:"-";
    $created_at = date("Y-m-d H:i:s");
    $query = "insert into users(id_user,name,surname,patronymic,birthday,phone,photo,gender,password,role,awards,created_at) values(null,'$name','$surname','$patronymic','$birthday','$phone','$filename','$gender','$pass','2','$awards','$created_at')";
    $result = mysqli_query($conn, $query);
    if($result){
        echo "<script>alert('Регистрация прошла успешно!'); location.href='/';</script>";
        move_uploaded_file($_FILES['photo']['tmp_name'], $path);
        $_SESSION['role'] = 2;
    }else{
        echo "<script>alert('Ошибка регистрации! Попробуйте снова.')</script>";
        echo mysqli_error($conn);
    }
}
?> 