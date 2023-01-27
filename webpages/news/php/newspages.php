<?php
$url = $_SERVER['REQUEST_URI'];

switch ($url) {
    case "/webpages/news/news.php": ?>
        <div class="page__two-columns">
            <div class="column-menu">
                <a href="news.php" class="categories-item active">Все новости</a>
                <a href="news.php?page=announces" class="categories-item">Анонсы</a>
                <a href="news.php?page=industry" class="categories-item">Индустрия</a>
                <a href="news.php?page=updates" class="categories-item">Обновления</a>
                <a href="news.php?page=rumors" class="categories-item">Слухи</a>
                <a href="news.php?page=tech" class="categories-item">Технологии</a>
            </div>
            <div class="column-wrapper">
                <div class="column-title">Новости</div>
                <? foreach ($news as $n) : ?>
                    <a href="/webpages/news/news_view.php?news=<?= $n['News_ID'] ?>" class="column-item__block">
                        <div class="item-img__block">
                            <div class="item-teg"><?= $n['News_tag'] ?></div>
                            <img src="/media/news/preview_img/<?= $n['News_preview_img'] ?>" alt="<?= $n['News_name'] ?>" class="item-img">
                        </div>
                        <div class="item-text__block">
                            <div class="item-date">Дата:
                                <? $date = strtotime($n['News_date']);
                                echo date("d.m.Y", $date) ?>
                            </div>
                            <div class="item-name"><?= $n['News_name'] ?></div>
                            <div class="item-name-author">Автор: <?= $n['Login'] ?></div>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
    <? break;
    case "/webpages/news/news.php?page=announces": ?>
        <div class="page__two-columns">
            <div class="column-menu">
                <a href="news.php" class="categories-item">Все новости</a>
                <a href="news.php?page=announces" class="categories-item active">Анонсы</a>
                <a href="news.php?page=industry" class="categories-item">Индустрия</a>
                <a href="news.php?page=updates" class="categories-item">Обновления</a>
                <a href="news.php?page=rumors" class="categories-item">Слухи</a>
                <a href="news.php?page=tech" class="categories-item">Технологии</a>
            </div>
            <div class="column-wrapper">
                <div class="column-title">Новости / Анонсы</div>
                <? foreach ($announces_news as $n) : ?>
                    <a href="/webpages/news/news_view.php?news=<?= $n['News_ID'] ?>" class="column-item__block">
                        <div class="item-img__block">
                            <img src="/media/news/preview_img/<?= $n['News_preview_img'] ?>" alt="<?= $n['News_name'] ?>" class="item-img">
                        </div>
                        <div class="item-text__block">
                            <div class="item-date">Дата:
                                <? $date = strtotime($n['News_date']);
                                echo date("d.m.Y", $date) ?>
                            </div>
                            <div class="item-name"><?= $n['News_name'] ?></div>
                            <div class="item-name-author">Автор: <?= $n['Login'] ?></div>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
    <? break;
    case "/webpages/news/news.php?page=industry": ?>
        <div class="page__two-columns">
            <div class="column-menu">
                <a href="news.php" class="categories-item">Все новости</a>
                <a href="news.php?page=announces" class="categories-item">Анонсы</a>
                <a href="news.php?page=industry" class="categories-item active">Индустрия</a>
                <a href="news.php?page=updates" class="categories-item">Обновления</a>
                <a href="news.php?page=rumors" class="categories-item">Слухи</a>
                <a href="news.php?page=tech" class="categories-item">Технологии</a>
            </div>
            <div class="column-wrapper">
                <div class="column-title">Новости / Индустрия</div>
                <? foreach ($industry_news as $n) : ?>
                    <a href="/webpages/news/news_view.php?news=<?= $n['News_ID'] ?>" class="column-item__block">
                        <div class="item-img__block">
                            <img src="/media/news/preview_img/<?= $n['News_preview_img'] ?>" alt="<?= $n['News_name'] ?>" class="item-img">
                        </div>
                        <div class="item-text__block">
                            <div class="item-date">Дата:
                                <? $date = strtotime($n['News_date']);
                                echo date("d.m.Y", $date) ?>
                            </div>
                            <div class="item-name"><?= $n['News_name'] ?></div>
                            <div class="item-name-author">Автор: <?= $n['Login'] ?></div>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
    <? break;
    case "/webpages/news/news.php?page=rumors": ?>
        <div class="page__two-columns">
            <div class="column-menu">
                <a href="news.php" class="categories-item">Все новости</a>
                <a href="news.php?page=announces" class="categories-item">Анонсы</a>
                <a href="news.php?page=industry" class="categories-item">Индустрия</a>
                <a href="news.php?page=updates" class="categories-item">Обновления</a>
                <a href="news.php?page=rumors" class="categories-item active">Слухи</a>
                <a href="news.php?page=tech" class="categories-item">Технологии</a>
            </div>
            <div class="column-wrapper">
                <div class="column-title">Новости / Слухи</div>
                <? foreach ($rumors_news as $n) : ?>
                    <a href="/webpages/news/news_view.php?news=<?= $n['News_ID'] ?>" class="column-item__block">
                        <div class="item-img__block">
                            <img src="/media/news/preview_img/<?= $n['News_preview_img'] ?>" alt="<?= $n['News_name'] ?>" class="item-img">
                        </div>
                        <div class="item-text__block">
                            <div class="item-date">Дата:
                                <? $date = strtotime($n['News_date']);
                                echo date("d.m.Y", $date) ?>
                            </div>
                            <div class="item-name"><?= $n['News_name'] ?></div>
                            <div class="item-name-author">Автор: <?= $n['Login'] ?></div>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
    <? break;
    case "/webpages/news/news.php?page=tech": ?>
        <div class="page__two-columns">
            <div class="column-menu">
                <a href="news.php" class="categories-item">Все новости</a>
                <a href="news.php?page=announces" class="categories-item">Анонсы</a>
                <a href="news.php?page=industry" class="categories-item">Индустрия</a>
                <a href="news.php?page=updates" class="categories-item">Обновления</a>
                <a href="news.php?page=rumors" class="categories-item">Слухи</a>
                <a href="news.php?page=tech" class="categories-item active">Технологии</a>
            </div>
            <div class="column-wrapper">
                <div class="column-title">Новости / Технологии</div>
                <? foreach ($tech_news as $n) : ?>
                    <a href="/webpages/news/news_view.php?news=<?= $n['News_ID'] ?>" class="column-item__block">
                        <div class="item-img__block">
                            <img src="/media/news/preview_img/<?= $n['News_preview_img'] ?>" alt="<?= $n['News_name'] ?>" class="item-img">
                        </div>
                        <div class="item-text__block">
                            <div class="item-date">Дата:
                                <? $date = strtotime($n['News_date']);
                                echo date("d.m.Y", $date) ?>
                            </div>
                            <div class="item-name"><?= $n['News_name'] ?></div>
                            <div class="item-name-author">Автор: <?= $n['Login'] ?></div>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
    <? break;
    case "/webpages/news/news.php?page=updates": ?>
        <div class="page__two-columns">
            <div class="column-menu">
                <a href="news.php" class="categories-item">Все новости</a>
                <a href="news.php?page=announces" class="categories-item">Анонсы</a>
                <a href="news.php?page=industry" class="categories-item">Индустрия</a>
                <a href="news.php?page=updates" class="categories-item active">Обновления</a>
                <a href="news.php?page=rumors" class="categories-item">Слухи</a>
                <a href="news.php?page=tech" class="categories-item">Технологии</a>
            </div>
            <div class="column-wrapper">
                <div class="column-title">Новости / Обновления</div>
                <? foreach ($updates_news as $n) : ?>
                    <a href="/webpages/news/news_view.php?news=<?= $n['News_ID'] ?>" class="column-item__block">
                        <div class="item-img__block">
                            <img src="/media/news/preview_img/<?= $n['News_preview_img'] ?>" alt="<?= $n['News_name'] ?>" class="item-img">
                        </div>
                        <div class="item-text__block">
                            <div class="item-date">Дата:
                                <? $date = strtotime($n['News_date']);
                                echo date("d.m.Y", $date) ?>
                            </div>
                            <div class="item-name"><?= $n['News_name'] ?></div>
                            <div class="item-name-author">Автор: <?= $n['Login'] ?></div>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
<? break;
}
?>
</div>