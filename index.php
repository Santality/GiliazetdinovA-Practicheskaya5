<?php
    include("header.php");
    $conn = mysqli_connect("localhost", "root", "", "giliaz");
    $sql_query = "select surname, name, patronymic, photo, phone, awards from users where role=3";
    $result = mysqli_query($conn, $sql_query);
?>

    <div class="cards">
        <?php
        while($trener = mysqli_fetch_array($result)){
        ?>
            <div class="card">
                <div class="img_container">
                    <img src="/img/<?=$trener['photo']?>" alt="<?=$trener['name']?>">
                </div>
                <h2><?=$trener['surname']." ".$trener['name']?></h2>
                <p><?=$trener['phone']?></p>
                <p><?=$trener['awards']?></p>
            </div>
        <?php
        }
    ?>
    </div>
</body>
</html>