document.getElementById('burger-menu').addEventListener('click', function () {
    const burgerMenu = document.getElementById('burger-menu');
    const burgerNav = document.getElementById('burger-nav');
    burgerMenu.classList.toggle('active');
    burgerNav.classList.toggle('active');
});

// PUT YOUR CODE HERE PLZ, REMEMBER that!------------------>

const photoLink = document.getElementById('photo-link'); // Привязка к id "photo-link"
const photoLink2 = document.getElementById('photo-link2'); // Привязка к id "photo-link2"
const modal = document.getElementById('add-photo-modal');
const closeModal = document.getElementById('close-modal');
const cancelButton = document.getElementById('cancel-button');
const addPhotoForm = document.getElementById('add-photo-form');

function openModal(event) {
    event.preventDefault(); // Предотвращаем переход по ссылке
    modal.style.display = 'block';
}

function closeModalFunc() {
    modal.style.display = 'none';
}

photoLink.addEventListener('click', openModal);
photoLink2.addEventListener('click', openModal);

closeModal.addEventListener('click', closeModalFunc);
cancelButton.addEventListener('click', closeModalFunc);

window.addEventListener('click', function(event) {
    if (event.target == modal) {
        closeModalFunc();
    }
});

addPhotoForm.addEventListener('submit', function(event) {
    // event.preventDefault();
    // const photoUrl = document.getElementById('photo-url').value;
    // const photoTitle = document.getElementById('photo-title').value;
    //
    // addPhotoToGallery(photoUrl, photoTitle);
    //
    // closeModalFunc();
});

function addPhotoToGallery(url, title) {
    const gallery = document.querySelector('.gallery');

    // Создаем новый элемент для фото
    const photoItem = document.createElement('div');
    photoItem.classList.add('photo-item');

    // Создаем ссылку для фото
    const photoLink = document.createElement('a');
    photoLink.href = url;
    photoLink.setAttribute('data-lightbox', 'gallery');

    // Создаем изображение
    const photoImg = document.createElement('img');
    photoImg.src = url;
    photoImg.alt = title;

    // Создаем элемент для названия фото
    const photoTitleElem = document.createElement('p');
    photoTitleElem.textContent = title;

    // Добавляем изображение и название к ссылке
    photoLink.appendChild(photoImg);
    photoItem.appendChild(photoLink);
    photoItem.appendChild(photoTitleElem);

    // Добавляем новый элемент с фото в галерею
    gallery.appendChild(photoItem);
}


// /----------------------------------------------------------------------<



const burgerLinks = document.querySelectorAll('.burger-nav .burger-link');

burgerLinks.forEach(link => {
    link.addEventListener('click', () => {
        const burgerMenu = document.getElementById('burger-menu');
        const burgerNav = document.getElementById('burger-nav');
        burgerMenu.classList.remove('active');
        burgerNav.classList.remove('active');
    });
});

/*<------PHOTO CLICK--------> */

// Добавляет обработчик события клика для ссылки с id "photo-link"
document.querySelector("#photo-link").addEventListener("click", function () {
    // При клике добавляет класс "open" к элементу с id "add_new_photo"
    document.querySelector("#add_new_photo").classList.add("open");
});

// Добавляет обработчик события клика для кнопки с id "cancel"
document.querySelector("#cancel").addEventListener("click", function () {
    // При клике удаляет класс "open" у элемента с id "add_new_photo"
    document.querySelector("#add_new_photo").classList.remove("open");
});

// Функция для открытия фотографии в модальном окне
function open_photo() {
    let popup_photo = document.querySelector("#popup_photo");
    // Устанавливает src изображения в модальном окне таким же, как у изображения, на которое кликнули
    popup_photo.querySelector("img").src = this.querySelector("img").src;
    // Добавляет класс "open" к модальному окну
    popup_photo.classList.add("open");
}

// Добавляет обработчик события клика для всех элементов с классом "photo"
document.querySelectorAll(".photo").forEach(photo => {
    photo.addEventListener("click", open_photo);
});

// Добавляет обработчик события клика для модального окна с id "popup_photo"
document.querySelector("#popup_photo").addEventListener("click", function () { // При клике удаляет класс "open" у модального окна
    this.classList.remove("open");
});





/*0212192019201829182912919281928190192018291829129192819281901920182918291291928192819019201829182912919281928190192018291829129192819281901920182918291291928192819*/
// Получаем модальное окно
// var modal = document.getElementById("lightboxModal");
//
// // Получаем изображение и вставляем его в модальное окно
// var modalImg = document.getElementById("lightboxImage");
// var captionText = document.getElementById("caption");
//
// document.querySelectorAll('.photo-link').forEach(item => {
//     item.addEventListener('click', event => {
//         event.preventDefault();
//         modal.style.display = "block";
//         modalImg.src = event.target.parentElement.href;
//         captionText.innerHTML = event.target.parentElement.getAttribute("data-title");
//     });
// });
/*0212192019201829182912919281928190192018291829129192819281901920182918291291928192819019201829182912919281928190192018291829129192819281901920182918291291928192819*/


// Получаем элемент <span>, который закрывает модальное окно
var span = document.getElementsByClassName("close")[0];

// Когда пользователь нажимает на <span> (x), закрываем модальное окно
span.onclick = function() {
    modal.style.display = "none";
}

// function addComment() {
//     var commentText = document.getElementById("commentText").value;
//     var commentsList = document.getElementById("commentsList");
//
//     if (commentText.trim() !== "") {
//         var newComment = document.createElement("div");
//         newComment.classList.add("comment");
//         newComment.innerText = commentText;
//
//         commentsList.appendChild(newComment);
//         document.getElementById("commentText").value="";
//     }
// }


//*-------------------------------------------------------*/

document.addEventListener("DOMContentLoaded", function() {
    const images = document.querySelectorAll('.zoomable');
    const overlay = document.createElement('div');
    overlay.classList.add('overlay');
    document.body.appendChild(overlay);

    images.forEach(img => {
        img.addEventListener('click', function(e) {
            e.preventDefault(); // Отменяем стандартное поведение ссылки
            const largeImgSrc = this.src;
            showOverlay(largeImgSrc);
        });
    });

    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
            hideOverlay();
        }
    });

    function showOverlay(src) {
        overlay.innerHTML = `
            <div class="close">&times;</div>
            <img class="overlay-content" src="${src}">
        `;
        overlay.style.display = 'flex';

        const closeBtn = overlay.querySelector('.close');
        closeBtn.addEventListener('click', hideOverlay);
    }

    function hideOverlay() {
        overlay.style.display = 'none';
        overlay.innerHTML = '';
    }
});


/*-----------------------------------------------------------------------------------------------------------------------------*/