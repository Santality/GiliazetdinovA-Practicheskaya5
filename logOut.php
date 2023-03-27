<?php
session_start();
if(!empty($_SESSION['role'])){
    unset($_SESSION["role"]);
    echo "<script>location.href='/';</script>";
}else{
    echo "<script>alert('Ошибка!'); location.href='/';</script>";
}
?>