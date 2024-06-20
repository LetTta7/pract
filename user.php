<?php
    session_start();
//    the most long
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    }
    else {
        $user_id = false;
    }
//    get user id
    if ($user_id) {
        require "vendor/autoload.php";
        $db = new \Photos\DB();
        $data = $db->get_user_photos($user_id);
    }

//    Error log n pass
    if (isset($_GET["error"])) {
        $error = "Неверный логин или пароль!";
    }
    if (isset($_GET["sign_error"])) {
        $sign_error = "Такой логин уже занят!";
    }
    if (isset($_GET["sign_success"])) {
        $sign_success = "Вы успешно зарегестрировались!";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="responsive.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>
<body>
    <?php include "header.php"?>

    <?php if ($user_id): ?>
        <!--    Фоточки пользователя-->
        <div class="container">
            <h1>Галерея пользователя</h1>
            <div class="gallery">
                <?php foreach ($data as $photos): ?>
                    <div class="photo-item">

                        <a href="image.php?id=<?= $photos["Id"] ?>" data-lightbox="gallery" data-title="<?= $photos["Text"] ?>" class="no-underline">
<!--                            <img src="--><?php //= $photos["Image"] ?><!--" alt="--><?php //= $photos["Text"] ?><!--">-->
                            <?= (new Photos\Photo($photos["Id"], $photos["Image"], $photos["Text"]))->get_html() ?>
                        </a>
<!--                        <p>--><?php //= $photos["Text"] ?><!--</p>-->
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    <?php else: ?>
        <div class="form">
            <form action="login.php" method="post">
                <h2 id="Autorise">Авторизация</h2>
                <input type="text" placeholder="Логин" name="login" required>
                <input type="password" placeholder="Пароль" name="password" required>
                <button class="btn">Вход</button>
                <?php if (isset($_GET["error"])): ?>
                    <p class="error"><?= $error ?></p>
                <?php endif ?>
            </form>

            <form action="signup.php" method="post">
                <h2 id="Autorise">Регистрация</h2>
                <input type="text" placeholder="Логин" name="login" required>
                <input type="password" placeholder="Пароль" name="password" required>
                <button class="btn">Зарегистрироваться</button>
                <?php if (isset($_GET["sign_error"])): ?>
                    <p class="error"><?= $sign_error ?></p>
                <?php endif ?>
                <?php if (isset($_GET["sign_success"])): ?>
                    <p class="success"><?= $sign_success ?></p>
                <?php endif ?>
            </form>

        </div>
    <?php endif;?>


    <?php include "add_form.php"; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="image.js"></script>
</body>
</html>
