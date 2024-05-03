<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" ccontent="width=device-width, initial-scale=1.0">
    <title>Бурлакова Е.П.</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Вход</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 gap">
                <form method="POST" action="login.php">
                    <div class="row form_reg"><input class="form" type="text" name="username" placeholder="Login"></div>
                    <div class="row form_reg"><input class="form" type="pass" name="pass" placeholder="Password"></div>
                    <button type="submit" class="btn_red btn_reg" name="submit">Продолжить</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>


<?php

require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    if (!$username || !$pass) die ('Пожалуйста введите все значения!');

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";

    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
    setcookie("User", $username, time()+7200);
    header('Location: profile.php');
    } else {
    echo "не правильное имя или пароль";
    }
}

if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
}
?>