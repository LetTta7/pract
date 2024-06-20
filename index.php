<?php
    session_start();
    //    the most short
    $user_id = $_SESSION["user_id"] ?? false;

    $link = new mysqli(hostname: "localhost", username: "root", password: "", database: "photos");


    $link->set_charset( charset: "utf8");
    $data = $link->query( query: "SELECT * FROM photos")->fetch_all(mode: MYSQLI_ASSOC);
?>

<?php
    require "vendor/autoload.php";
    $db = new Photos\DB();
    $data = $db->get_all_photos();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content= "ie=edge">
    <title>Галерея</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="responsive.css">
<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>

<?php include "header.php"?>

<div class="container">
    <h1>Галерея</h1>
    <div class="gallery">
        <?php foreach ($data as $photos): ?>
            <div class="photo-item">

                <a href="image.php?id=<?= $photos["Id"] ?>" data-lightbox="gallery" data-title="<?= $photos["Text"] ?> "  class="no-underline">
                    <?= (new Photos\Photo($photos["Id"], $photos["Image"],  $photos["Text"]))->get_html() ?>
                </a>
<!--                <p>--><?php //= $photos["Text"] ?><!--</p>-->
            </div>
        <?php endforeach; ?>

    </div>
</div>

<?php include "add_form.php"; ?>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>-->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="script.js"></script>

</body>

</html>
