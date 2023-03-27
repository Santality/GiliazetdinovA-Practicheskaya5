<?php
    include("header.php");
    $conn = mysqli_connect("localhost", "root", "", "giliaz");
    $sql_query = "select id_user, surname, name, patronymic, gender, photo, phone, awards from users where role=3";
    $result = mysqli_query($conn, $sql_query);
    $trener_id = !empty($_GET["trener"])?$_GET["trener"]:1;
    $trener_info = mysqli_fetch_array(mysqli_query($conn, "select * from users where id_user=$trener_id"));
    $trener_delete = "delete from users where id = '$trener_id'";
?>
<div class="container">
    <div class="list-trener">
        <?php
            while($trener = mysqli_fetch_array($result)){
            ?>
                <div class="trener-item">
                    <p><?=$trener['surname']." ".$trener['name']." ".$trener['patronymic']?></p>
                    <a href="?trener=<?=$trener['id_user'];?>"><button class="btn btn-edit">Редактировать</button></a>
                    <a href="/deleteTrener.php?trener=<?=$trener['id_user'];?>"><button class="btn btn-delete">Удалить</button></a>
                </div>
            <?php
            }
        ?>
    </div>
    <div class="form-edit">
        <div class="container flex-column-center">
            <h2>Добавление тренера</h2>
            <div class="img_container">
                <img src="/img/<?=$trener_info['photo'];?>" alt="<?=$trener_info['name'];?>">
            </div>
            <form action="editTrenerDB.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id_user" name="id_user" value="<?=$trener_id?>">
                <div class="input-group"><label for="surname">Введите фамилию</label><input value="<?=$trener_info['surname']?>" required id="surname" name="surname" type="text"></div>
                <div class="input-group"><label for="name">Введите имя</label><input value="<?=$trener_info['name']?>" required id="name" name="name" type="text"></div>
                <div class="input-group"><label for="patronymic">Введите отчество</label><input value="<?=$trener_info['patronymic']?>" id="patronymic" name="patronymic" type="text"></div>
                <div class="input-group"><label for="birthday">Введите дату рождения</label><input value="<?=$trener_info['birthday']?>" required id="birthday" name="birthday" type="date"></div>
                <div class="input-group"><label for="phone">Введите номер телефона</label><input value="<?=$trener_info['phone']?>" required id="phone" name="phone" type="text"></div>
                <div class="input-group"><label for="photo">Выберите фото</label><input value="<?=$trener_info['photo']?>" id="photo" name="photo" type="file"></div>
                <div class="input-group i-g-radio">
                    <label for="g-m">М</label><input id="g-m" name="gender" type="radio" value="M" <?=($trener_info["gender"]=="M")?"checked":"";?>>
                    <label for="g-w">Ж</label><input id="g-w" name="gender" type="radio" value="W" <?=($trener_info["gender"]=="W")?"checked":"";?>>
                </div>
                <div class="input-group"><label for="password">Введите пароль</label><input value="<?=$trener_info['password']?>" required id="password" name="password" type="password"></div>
                <div class="input-group"><label for="awards">Введите награды</label><input value="<?=$trener_info['awards']?>" id="awards" name="awards" type="text"></div>
                <div class="input-group"><input type="submit" value="Редактировать"></div>
            </form>
        </div>
    </div>
</div>