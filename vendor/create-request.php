<?php 

session_start(); // Начинаем сессию для работы с сессионными переменными

if(empty($_COOKIE['id_user'])) {
    $_SESSION['errLogin'] = "Авторизуйтесь!";
    header("Location: ./login.php");
}

require_once("../db/db.php"); // Подключаем файл с настройками базы данных

$id_client = $_POST['id_client'];
$id_funeral = $_POST['id_funeral'];

foreach ($_POST as $key => $value) {
    if (strpos($key, 'id_service_') === 0) {
        $services[] = $value;
    }
}

$services_string = implode(',', $services);

mysqli_query($connect, "INSERT INTO `requests` 
                        (`id_client`, `id_funeral`, `services`)
                        VALUES
                        ('$id_client', '$id_funeral', '$services_string')
");

header("Location: ../index.php");
