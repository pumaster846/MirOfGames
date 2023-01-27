document.getElementById('showGenreBlock').addEventListener('click', function () {
    document.querySelector('.genre-menu__block').classList.toggle('active');
});

document.getElementById('showSearchBlock').addEventListener('click', function () {
    document.querySelector('.search').classList.toggle('active');
});

window.onload = () => {
    let input = document.getElementById('showGamesBlock');
    input.oninput = function () {
        let value = this.value.trim();

        let list = document.querySelectorAll('.search-menu li');

        if (value != '') {
            list.forEach(elem => {
                if (elem.innerText.search(value) == -1) {
                    elem.classList.add('hide');
                }
            });
        } else {
            list.forEach(elem => {
                elem.classList.remove('hide');
            });
        }
    }
}

