<div class="modal" id="add-photo-modal">
    <div class="modal-content">
        <span class="close-button" id="close-modal">&times;</span>
        <h2>Добавить Фото</h2>
        <form action="new_photo.php" method="post" id="add-photo-form">
            <div class="form-group">
                <label for="photo-url">URL Картины</label>
                <input type="text" id="photo-url" name="image" placeholder="Введите URL картины" required>
            </div>
            <div class="form-group">
                <label for="photo-title">Название</label>
                <input type="text" id="photo-title" name="text" placeholder="Введите название картины" required>
            </div>
            <div class="form-buttons">
                <button type="submit" class="btn">Добавить</button>
                <button type="button" class="btn" id="cancel-button">Отменить</button>
            </div>
        </form>
    </div>
</div>
