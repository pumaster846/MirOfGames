const arrayMenuList = Array.from(document.querySelectorAll('.menu-list'));
const rotateArrowMenu = Array.from(document.querySelectorAll('.fa-caret-right'));
const showSubMenu = Array.from(document.querySelectorAll('.modal-column__content-title'));

showSubMenu.forEach((item, i) => { // проходимся по каждому тригеру
    item.addEventListener('click', () => { // ставим на него слушатель события клика
        arrayMenuList[i].classList.toggle('active'); // что-то делаем
        rotateArrowMenu[i].classList.toggle('active');
    });
});


// $pageContent.on('keypress', function (e) {
//     if (e.which == 13) {
//         return addTag('\r\n<p>TEXT</p>');
//     }
// });

// const showContent = Array.from(document.querySelectorAll('.menu-list__item'));
// showContent.forEach((item, i) => {
//     item.addEventListener('click', (e) => {
//         document.querySelector('.tools-menu').classList.add('active');
//         let contentValue = showContent[i].getAttribute('data-value');
//         $.ajax({
//             url: "/adminka/php/pagescontent.php",
//             type: 'POST',
//             data: {
//                 'contentValue': contentValue
//             }
//         }).success(function (done) {
//             $('.content').html(done);
//         });
//     });
// });