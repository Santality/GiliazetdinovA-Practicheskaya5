<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>ФИТНЕС</h1>
        </div>
        <nav>
            <a class="nav_a" href="/">Главная</a>
            <a class="nav_a" href="/">Наша команда</a>
            <?php
                session_start();
                if(empty($_SESSION)){
                    echo "<a class='nav_a' href='/authorization.php'>Авторизация/Регистарция</a>";
                }elseif($_SESSION['role'] == 1){
                    echo "<a class='nav_a' href='/addTrener.php'>Добавить тренера</a>" . "<a class='nav_a' href='/editTrener.php'>Управление тренерами</a>";
                }
                if(!empty($_SESSION['role'])){
                    echo "<a class='nav_a' href='/logOut.php'>Выйти</a>";
                }
            ?>
        </nav>
    </header>