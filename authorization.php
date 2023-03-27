<?php
include('header.php');
?>
<div class="container flex-column-center">
    <h2>Авторизация</h2>
    <form id="form_auth" action="addAuthorization.php" method="post">
        <div class="input-group"><label for="phone">Введите номер телефона</label><input required id="phone" name="phone" type="text"></div>
        <div class="input-group"><label for="password">Введите пароль</label><input required id="password" name="password" type="password"></div>
        <div class="input-group"><label for="password_conf">Введите пароль</label><input required id="password_conf" name="password_conf" type="password"><span class="error_form" id="error_pass"></span></div>
        <div class="input-group"><input type="submit" value="Войти"></div>
        <a href="registration.php">Зарегистрироваться</a>
    </form>
</div>
<script>
    let confirm_pass = document.getElementById("password_conf");
    let pass = document.getElementById("password");
    let form = document.getElementById("form_auth");
    form.addEventListener("submit",function (event){
        if(confirm_pass.value!=pass.value){
            event.preventDefault();
            document.getElementById("error_pass").innerText = "Пароли несовпадают!"
        };
    })
</script>