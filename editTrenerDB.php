<?php
$conn = mysqli_connect("localhost", "root", "", "giliaz");
if(!empty($_FILES['photo']['tmp_name'])){
    $path = "img/" . $_FILES['photo']['name'];
    $filename = $_FILES['photo']['name'];
}
if(!empty($_POST)){
    $trener_id = $_POST["id_user"];
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $patronymic = !empty($_POST["patronymic"])?$_POST["patronymic"]:'null';
    $birthday = $_POST["birthday"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $pass = $_POST["password"];
    $awards = !empty($_POST["awards"])?$_POST["awards"]:"-";
    $query = "UPDATE users SET surname = '$surname', name = '$name', patronymic = '$patronymic', birthday = '$birthday', phone = '$phone', gender = '$gender', photo = '$filename', password = '$pass', awards = '$awards' WHERE id_user = '$trener_id'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo "<script>alert('Запись обновлена успешно!'); location.href='/';</script>";
        move_uploaded_file($_FILES['photo']['tmp_name'], $path);
    }else{
        echo "<script>alert('Ошибка обновления! Попробуйте снова.')</script>";
        echo mysqli_error($conn);
    }
}
?> 