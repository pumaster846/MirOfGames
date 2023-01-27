<?php
$url = $_SERVER['REQUEST_URI'];
switch ($url) {
    case "/webpages/games/games_view.php?game=" . $gameID: ?>
        <div class="navigation-menu">
            <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>" class="nav-menu_active">новости</a>
            <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>&gallery">галерея</a>
        </div>
        <div class="menu-content">
            <? foreach ($gameNews as $news) : ?>
                <a href="/webpages/news/news_view.php?news=<?= $news['News_ID'] ?>" class="column-item__block">
                    <div class="item-img__block">
                        <div class="item-teg"><?= $news['News_tag'] ?></div>
                        <img src="/media/news/preview_img/<?= $news['News_preview_img'] ?>" alt="<?= $news['News_name'] ?>" class="item-img">
                    </div>
                    <div class="item-text__block">
                        <div class="item-date">Дата:
                            <? $date = strtotime($news['News_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="item-name"><?= $news['News_name'] ?></div>
                        <div class="item-name-author">Автор: <?= $news['Login'] ?></div>
                    </div>
                </a>
            <? endforeach; ?>
        </div>
    <? break;
    case "/webpages/games/games_view.php?game=" . $gameID . "&gallery": ?>
        <div class="navigation-menu">
            <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>">новости</a>
            <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>" class="nav-menu_active">галерея</a>
        </div>
        <div class="menu-content__gallery image__wrapper">
            <? foreach ($gameScreenshots as $pic) : ?>
                <img src="<?= $pic['Screenshot_url'] ?>" class="minimized gallery-image__item" alt="клик для увеличения" />
            <? endforeach; ?>
        </div>
        <?php if($_SESSION['authorization'] == true):?>
                <form class="download-inputs" method="POST" enctype="multipart/form-data">
                    <label class="label">
                        <div>
                            <i class="fa-solid fa-file-image"></i>
                            <span>Загрузить ваш скриншот</span>
                        </div>
                        <input type="file" name="gameScreenshot" class="input-file" id="imgInp" accept="image/*">
                    </label>
                    <input type="submit" name="addScreen" value="Отправить" class="input-news__submit">
                </form>
            <?endif;?>
    <script>
    $(function(){
        $('.minimized').click(function(event) {
            var i_path = $(this).attr('src');
            $('body').append('<div id="overlay"></div><div id="magnify"><img src="'+i_path+'"><div id="close-popup"><i></i></div></div>');
            $('#magnify').css({
            left: ($(document).width() - $('#magnify').outerWidth())/2,
            // top: ($(document).height() - $('#magnify').outerHeight())/2 upd: 24.10.2016
                    top: ($(window).height() - $('#magnify').outerHeight())/2
        });
            $('#overlay, #magnify').fadeIn('fast');
        });
        
        $('body').on('click', '#close-popup, #overlay', function(event) {
            event.preventDefault();

            $('#overlay, #magnify').fadeOut('fast', function() {
            $('#close-popup, #magnify, #overlay').remove();
            });
        });
    });
    </script>
<?
if(isset($_POST['addScreen'])){
    if(is_uploaded_file($_FILES['gameScreenshot']['tmp_name'])){
        $home = $_SERVER['DOCUMENT_ROOT']."/";
        //загрузка изображения в созданную папку игры
        $files = $_FILES['gameScreenshot'];
        $fileTmpPath = $files['tmp_name'];
        $previewImg = $files['name'];
        $urlImg = "/media/temp/".$files['name'];
        move_uploaded_file($fileTmpPath, $home.'media/temp/'. $files['name']);

        $sql = "INSERT INTO `users_screenshots` SET `Screenshot_url` = ?, `User_ID` = ?, `Game_ID` = ?, `Archive` = ?";
        $insertImg = $pdo->prepare($sql);
        $insertImg->execute(array($urlImg, $_SESSION['userID'], $gameID, "0"));
        echo "<script type='text/javascript'>alert('Спасибо, что поделились вашим скриншотом! Он появится на сайте, после рассмотрения администрацией :)')</script>";
        echo "<script type='text/javascript'>location.href='/webpages/games/games_view.php?game=".$gameID."'</script>";
    }
}
break;
}