<?php
    $user_id = $_SESSION["user_id"] ?? false;
?>
<link rel="stylesheet" href="responsive.css">
<header>
        <nav class="nav-bar">
            <a href="index.php" class="nav-link">Главная</a>
            <?php if ($user_id): ?>
            <a href="#" class="nav-link" id="photo-link">Фото</a>
            <?php endif; ?>
            <a href="#" class="nav-link">Посты</a>
            <?php if ($user_id): ?>
                <a href="user.php" class="nav-link">Личный кабинет</a>
            <?php else: ?>
                <a href="user.php" class="nav-link">Вход</a>
            <?php endif; ?>
            <?php if ($user_id): ?>
                <a href="logout.php" class="nav-link">Выйти</a>
            <?php endif; ?>
        </nav>
        <div class="burger-menu" id="burger-menu">
            <span class="burger-icon"></span>
            <span class="burger-icon"></span>
            <span class="burger-icon"></span>
        </div>
        <nav class="burger-nav" id="burger-nav">
            <a href="index.php" class="burger-link">Главная</a>
            <?php if ($user_id): ?>
                <a href="#" class="burger-link" id="photo-link2">Фото</a>
            <?php endif; ?>
            <a href="#" class="burger-link">Посты</a>
            <?php if ($user_id): ?>
                <a href="user.php" class="burger-link">Личный кабинет</a>
            <?php else: ?>
                <a href="user.php" class="burger-link">Вход</a>
            <?php endif; ?>
            <?php if ($user_id): ?>
                <a href="logout.php" class="burger-link">Выйти</a>
            <?php endif; ?>
        </nav>

<!---->
<!--    <div class="modal" id="add-photo-modal">-->
<!--        <div class="modal-content">-->
<!--            <span class="close-button" id="close-modal">&times;</span>-->
<!--            <h2>Добавить Фото</h2>-->
<!--            <form id="add-photo-form">-->
<!--                <div class="form-group">-->
<!--                    <label for="photo-url">URL Картины</label>-->
<!--                    <input type="text" id="photo-url" name="photo-url" placeholder="Введите URL картины" required>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="photo-title">Название</label>-->
<!--                    <input type="text" id="photo-title" name="photo-title" placeholder="Введите название картины" required>-->
<!--                </div>-->
<!--                <div class="form-buttons">-->
<!--                    <button type="submit" class="btn">Добавить</button>-->
<!--                    <button type="button" class="btn" id="cancel-button">Отменить</button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->



</header>
<!--<script src="script.js"></script>-->