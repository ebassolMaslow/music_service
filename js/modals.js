
var btn2 = document.querySelector('.profile_edit_button');
var blockHiddentwo = document.querySelector('.edit_profile_modal');
var btnClosetwo = document.querySelector('.close-img');



function showBlocktwo() {
    blockHiddentwo.classList.add('b-show-profile');
}

function hideBlocktwo() {
    blockHiddentwo.classList.remove('b-show-profile');
}

btn2.addEventListener('click', showBlocktwo);
btnClosetwo.addEventListener('click', hideBlocktwo);

// Данный код относится к реализации взаимодействия 
// пользователя с формами авторизации 
// и регистрации на веб - странице.

// Сначала определяются переменные btn2, blockHiddentwo,
//     btnClosetwo, btn3, blockHiddenthree, btnClosethree и btn4,
//         которые ссылается на соответствующие элементы страницы.

// Затем определены функции showBlockTwo(), hideBlockTwo(),
//     showBlockThree(), hideBlockThree() и hideBlockFour(),
//         которые добавляют или удаляют CSS - классы, что приводит к отображению или скрытию форм.

// В конце, события клика на элементы страницы
//     (btn2, btnClosetwo, btn3, btnClosethree, btn4) 
// вызывают соответствующие функции showBlockTwo(),
//     hideBlockTwo(), showBlockThree(), hideBlockThree() и hideBlockFour().

//         Итак, данный код реализует
//  функционал отображения и скрытия форм авторизации 
//  и регистрации на странице при помощи обработчиков событий,
//     как правило, чтобы создать лучшую пользовательскую взаимодействие с веб - сайтом.