<?php
$conn = mysqli_connect("localhost", "root", "", "giliaz");
$trener_id = $_GET["trener"];
$query = "delete from users where id_user='$trener_id'";
$result = mysqli_query($conn, $query);
if($result){
    echo "<script>alert('Запись удалена успешно!'); location.href='/';</script>";
}else{
    echo "<script>alert('Ошибка удаления! Попробуйте снова.')</script>";
    echo mysqli_error($conn);
}
?>