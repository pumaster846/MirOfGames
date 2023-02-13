const arrayMenuList = Array.from(document.querySelectorAll('.menu-list'));
const rotateArrowMenu = Array.from(document.querySelectorAll('.fa-caret-right'));
const showSubMenu = Array.from(document.querySelectorAll('.modal-column__content-title'));

showSubMenu.forEach((item, i) => { // проходимся по каждому тригеру
    item.addEventListener('click', () => { // ставим на него слушатель события клика
        arrayMenuList[i].classList.toggle('active'); // что-то делаем
        rotateArrowMenu[i].classList.toggle('active');
    });
});
