<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Подключаемся к базе данных
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
}
?>


