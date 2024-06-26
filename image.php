<?php
    session_start();
    $photo_id = $_SESSION['user_id'] ?? false;
    $photo_id = intval($_GET['id']);
    require "vendor/autoload.php";
    $db = new \Photos\DB();
    $photo = $db->get_photo_by_id($photo_id);
    $comments = $db->get_photo_comments($photo_id);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фото</title>
    <link rel="stylesheet" href="styles.css"
<!--    <script src="script.js" defer></script>-->
<!--    <script src="image.js"></script>-->
</head>
<body>
    <?php include "header.php"; ?>
    <div id="image">
        <img src="<?= $photo["Image"] ?>" alt="">
        <h1><?= $photo["Text"]?></h1>
        <p> Автор: <?= $photo["Name"]?></p>
    </div>
    <div class="comments">
        <div class="form">
            <textarea autofocus placeholder="Введите комментарий" id="text" rows="5"></textarea>
            <button id="add_comment">Добавить</button>
        </div>
        <h2>Комментарии:</h2>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p class="author"><?= $comment["Name"]?> </p>
                <p class="text"> <?= $comment["Text"]?></p>
                <p class="date"> <?= $comment["Post_date"]?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <script src= "image.js" defer></script>
</body>
</html>
