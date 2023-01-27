<?php
$url = $_SERVER['REQUEST_URI'];

switch ($url) {
    case "/webpages/games/games.php": ?>
        <div class="navigation-block">
            <div class="search__block">
                <i class="fa-solid fa-magnifying-glass" id="showSearchBlock"></i>
                <div class="search">
                    <input type="text" id="showGamesBlock" placeholder="Название игры">
                    <ul class="search-menu">
                        <? foreach ($games as $n) : ?>
                            <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>">
                                <li><?= $n['Game_name'] ?></li>
                            </a>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
            <ul class="sort-menu">
                <li>
                    <a href="games.php?sort=date" class="sort-item">по дате выхода
                        <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                    </a>
                </li>
                <li>
                    <a href="games.php?sort=alphabet" class="sort-item">по алфавиту
                        <span><i class="fa-solid fa-arrow-down-a-z"></i></span>
                    </a>
                </li>
                <li>
                    <a href="games.php?sort=estimation" class="sort-item">по оценке пользователей
                        <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                    </a>
                </li>
            </ul>
            <div class="genre__block">
                <div class="genre-btn" id="showGenreBlock">Все жанры
                    <span><i class="fa-solid fa-bars"></i></span>
                </div>
                <div class="genre-menu__block">
                    <ul class="genre-menu">
                        <? foreach ($genres as $n) : ?>
                            <a href="/webpages/games/php/genre.php?genre=<?= $n['Genre_name'] ?>">
                                <li class="genre-item"><?= $n['Genre_name'] ?></li>
                            </a>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content-block">
            <? foreach ($games as $n) : ?>
                <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>" class="game-block__content">
                    <div class="game-rating"><?= round($n['Game_rating'], 1) ?></div>
                    <div class="game-text__block">
                        <div class="game-name"><?= $n['Game_name'] ?></div>
                        <div class="game-text__title">Дата выхода</div>
                        <div class="game-date">
                            <? $date = strtotime($n['Game_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="game-text__title">Жанр</div>
                        <div class="game-genre">
                            <?php
                                $array = $n['Game_genres'];
                                $js = json_decode($array);
                                echo implode(', ', $js);
                            ?>
                        </div>
                    </div>
                    <img src="<?= $n['Game_preview_img'] ?>" alt="<?= $n['Game_name'] ?>" class="game-img">
                </a>
            <? endforeach; ?>
        </div>
    <? break;
    case "/webpages/games/games.php?sort=date": ?>
        <div class="navigation-block">
            <div class="search__block">
                <i class="fa-solid fa-magnifying-glass" id="showSearchBlock"></i>
                <div class="search">
                    <input type="text" id="showGamesBlock" placeholder="Название игры">
                    <ul class="search-menu">
                        <? foreach ($games as $n) : ?>
                            <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>">
                                <li><?= $n['Game_name'] ?></li>
                            </a>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
            <ul class="sort-menu">
                <li>
                    <a href="games.php?sort=date" class="sort-item active">по дате выхода
                        <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                    </a>
                </li>
                <li>
                    <a href="games.php?sort=alphabet" class="sort-item">по алфавиту
                        <span><i class="fa-solid fa-arrow-down-a-z"></i></span>
                    </a>
                </li>
                <li>
                    <a href="games.php?sort=estimation" class="sort-item">по оценке пользователей
                        <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                    </a>
                </li>
            </ul>
            <div class="genre__block">
                <div class="genre-btn" id="showGenreBlock">Все жанры
                    <span><i class="fa-solid fa-bars"></i></span>
                </div>
                <div class="genre-menu__block">
                    <div class="genre-menu">
                        <? foreach ($genres as $n) : ?>
                            <a href="/webpages/games/php/genre.php?genre=<?= $n['Genre_ID'] ?>">
                                <li class="genre-item"><?= $n['Genre_name'] ?></li>
                            </a>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-block">
            <? foreach ($games_sort_date as $n) : ?>
                <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>" class="game-block__content">
                    <div class="game-rating"><?= $n['Game_rating'] ?></div>
                    <div class="game-text__block">
                        <div class="game-name"><?= $n['Game_name'] ?></div>
                        <div class="game-text__title">Дата выхода</div>
                        <div class="game-date">
                            <? $date = strtotime($n['Game_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="game-text__title">Жанр</div>
                        <div class="game-genre">
                            <?php
                                $array = $n['Game_genres'];
                                $js = json_decode($array);
                                echo implode(', ', $js);
                            ?>
                        </div>
                    </div>
                    <img src="<?= $n['Game_preview_img'] ?>" alt="<?= $n['Game_name'] ?>" class="game-img">
                </a>
            <? endforeach; ?>
        </div>
    <? break;
    case "/webpages/games/games.php?sort=alphabet": ?>
        <div class="navigation-block">
            <div class="search__block">
                <i class="fa-solid fa-magnifying-glass" id="showSearchBlock"></i>
                <div class="search">
                    <input type="text" id="showGamesBlock" placeholder="Название игры">
                    <ul class="search-menu">
                        <? foreach ($games as $n) : ?>
                            <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>">
                                <li><?= $n['Game_name'] ?></li>
                            </a>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
            <ul class="sort-menu">
                <li>
                    <a href="games.php?sort=date" class="sort-item">по дате выхода
                        <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                    </a>
                </li>
                <li>
                    <a href="games.php?sort=alphabet" class="sort-item active">по алфавиту
                        <span><i class="fa-solid fa-arrow-down-a-z"></i></span>
                    </a>
                </li>
                <li>
                    <a href="games.php?sort=estimation" class="sort-item">по оценке пользователей
                        <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                    </a>
                </li>
            </ul>
            <div class="genre__block">
                <div class="genre-btn" id="showGenreBlock">Все жанры
                    <span><i class="fa-solid fa-bars"></i></span>
                </div>
                <div class="genre-menu__block">
                    <div class="genre-menu">
                        <? foreach ($genres as $n) : ?>
                            <a href="/webpages/games/php/genre.php?genre=<?= $n['Genre_ID'] ?>">
                                <li class="genre-item"><?= $n['Genre_name'] ?></li>
                            </a>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-block">
            <? foreach ($games_sort_alphabet as $n) : ?>
                <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>" class="game-block__content">
                    <div class="game-rating"><?= $n['Game_rating'] ?></div>
                    <div class="game-text__block">
                        <div class="game-name"><?= $n['Game_name'] ?></div>
                        <div class="game-text__title">Дата выхода</div>
                        <div class="game-date">
                            <? $date = strtotime($n['Game_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="game-text__title">Жанр</div>
                        <div class="game-genre">
                            <?php
                                $array = $n['Game_genres'];
                                $js = json_decode($array);
                                echo implode(', ', $js);
                            ?>
                        </div>
                    </div>
                    <img src="<?= $n['Game_preview_img'] ?>" alt="<?= $n['Game_name'] ?>" class="game-img">
                </a>
            <? endforeach; ?>
        </div>
    <? break;
    case "/webpages/games/games.php?sort=estimation": ?>
        <div class="navigation-block">
            <div class="search__block">
                <i class="fa-solid fa-magnifying-glass" id="showSearchBlock"></i>
                <div class="search">
                    <input type="text" id="showGamesBlock" placeholder="Название игры">
                    <ul class="search-menu">
                        <? foreach ($games as $n) : ?>
                            <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>">
                                <li><?= $n['Game_name'] ?></li>
                            </a>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
            <ul class="sort-menu">
                <li>
                    <a href="games.php?sort=date" class="sort-item">по дате выхода
                        <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                    </a>
                </li>
                <li>
                    <a href="games.php?sort=alphabet" class="sort-item">по алфавиту
                        <span><i class="fa-solid fa-arrow-down-a-z"></i></span>
                    </a>
                </li>
                <li>
                    <a href="games.php?sort=estimation" class="sort-item active">по оценке пользователей
                        <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                    </a>
                </li>
            </ul>
            <div class="genre__block">
                <div class="genre-btn" id="showGenreBlock">Все жанры
                    <span><i class="fa-solid fa-bars"></i></span>
                </div>
                <div class="genre-menu__block">
                    <div class="genre-menu">
                        <? foreach ($genres as $n) : ?>
                            <a href="/webpages/games/php/genre.php?genre=<?= $n['Genre_ID'] ?>">
                                <li class="genre-item"><?= $n['Genre_name'] ?></li>
                            </a>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-block">
            <? foreach ($games_sort_estimation as $n) : ?>
                <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>" class="game-block__content">
                    <div class="game-rating"><?= $n['Game_rating'] ?></div>
                    <div class="game-text__block">
                        <div class="game-name"><?= $n['Game_name'] ?></div>
                        <div class="game-text__title">Дата выхода</div>
                        <div class="game-date">
                            <? $date = strtotime($n['Game_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="game-text__title">Жанр</div>
                        <div class="game-genre">
                            <?php
                                $array = $n['Game_genres'];
                                $js = json_decode($array);
                                echo implode(', ', $js);
                            ?>
                        </div>
                    </div>
                    <img src="<?= $n['Game_preview_img'] ?>" alt="<?= $n['Game_name'] ?>" class="game-img">
                </a>
            <? endforeach; ?>
        </div>
<? break;
}
?>
</div>