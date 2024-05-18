<?php

session_start();

if(empty($_COOKIE['id_user'])) {
    $_SESSION['errLogin'] = "Авторизуйтесь!";
    header("Location: ./login.php");
}

require_once("./db/db.php"); // Подключаем файл с настройками базы данных

$select_funerals = mysqli_query($connect, "SELECT `id`, `name_agency` FROM `funeral_agencies`");
$select_funerals = mysqli_fetch_all($select_funerals);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>
<body>
    <a href="./logout.php">Выйти</a>
    <br><br>

    <div class="search">
        <input type="search" name="search_funeral" placeholder="Поиск ритуальных агентсв">
        <input type="button" value="Искать">
    </div>

    <div class="list_funerals">
        <h2>Список Ритуальных агентсв</h2>
        <?php foreach($select_funerals as $funeral) { ?>
            <ul>
                <li><a href="./funeral_agency.php?id=<?= $funeral[0] ?>"><?= $funeral[1] ?></a></li>
            </ul>
        <?php } ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

    </script>
</body>
</html>