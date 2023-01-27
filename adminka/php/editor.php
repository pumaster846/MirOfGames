<?php
require_once('connection-db/logic.php');
$url = $_SERVER['REQUEST_URI'];
if($_GET['id']){
    $newsID = $_GET['id'];
}
if($_GET['idgame']){
    $gameID = $_GET['idgame'];
}

switch ($url) {
    case "/adminka/index.php?editor=add-news": ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="inputs-news">
                <input type="text" id="newsTitle" name="newsTitle" placeholder="Заголовок писать здесь" autocomplete="off" onkeyup="writeNewsTitle();" required>

                <div class="input-news__menu-block">
                    <select class="menu-block__menu" name="newsTag">
                        <option disabled selected>- Категория новости -</option>
                        <?foreach($news_tags as $n) : ?>
                            <option value="<?=$n['News_tag_ID']?>"><?=$n['News_tag']?></option>
                        <?endforeach;?>
                    </select>
                </div>

                <div class="input-news__menu-block gameName">
                    <select class="menu-block__menu" name="gameName">
                        <option disabled selected>- Выберите игру к новости -</option>
                        <?foreach($selectGames as $n) : ?>
                            <option value="<?=$n['Game_ID']?>"><?=$n['Game_name']?></option>
                        <?endforeach;?>
                    </select>
                </div>

                <label class="label">
                    <div>
                        <i class="fa-solid fa-file-image"></i>
                        <span>Загрузить превью</span>
                    </div>
                    <input type="file" name="newsPreviewImg" class="input-file" id="imgInp" accept="image/*">
                </label>
            </div>

            <fieldset class="block__mini-preview">
                <legend>Вид новости в миниатюре</legend>
                <div class="column-item__block">
                    <div class="item-img__block">
                        <div class="item-teg">Категория</div>
                        <img id="miniPreview" src="#" class="item-img">
                    </div>
                    <div class="item-text__block">
                        <div class="item-date">Дата: <?= date("d.m.Y") ?></div>
                        <div class="item-name">Заголовок новости</div>
                        <div class="item-name-author">Автор: <?= $_SESSION['userName'] ?></div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="block-preview">
                <legend>Вид новости при подробном просмотре</legend>
                <h2 class="post-title">Заголовок новости</h2>
                <img id="bigPreview" src="#" alt="Здесь появится превью после загрузки" />
                <textarea name="content" id="editor">Текст новости</textarea>
            </fieldset>

            <input type="submit" name="addNews" class="input-news__submit">
        </form>
        <?php
            if(isset($_POST['addNews'])) {
                $varTag = $_POST['newsTag'];
                $varGame = $_POST['gameName'];
                if ($varTag > 0) {
                    $files = $_FILES['newsPreviewImg'];
                    $fileTmpPath = $files['tmp_name'];
                    $fileName = $files['name'];
                    move_uploaded_file($fileTmpPath, '../media/news/preview_img/' . $files['name']);
                
                    $sql = "INSERT INTO `news` SET `News_name` = ?, `News_preview_img` = ?, `News_text` = ?, `News_date` = ?, `News_tag_ID` = ?, `User_ID` =?, `Game_ID` = ?";
                    $addnews = $pdo->prepare($sql);
                    $addnews->execute(array($_POST['newsTitle'], $fileName, $_POST['content'], date("Y.m.d"), $varTag, $_SESSION['userID'], $varGame));
                    echo "<script type='text/javascript'>location.href='index.php?page=news'</script>";
                }else{
                    echo "<span class='err-msg'>Категория для новости не выбрана</span>";
                }
            }
        ?>
        <script>
            const
                $previewTitle = $('#newsTitle'),
                miniPreviewTitle = document.querySelector(".item-name"),
                bigPreviewTitle = document.querySelector(".post-title");

            imgInp.onchange = evt => {
                const [file] = imgInp.files;
                if (file) {
                    $('.block__mini-preview').css({
                            display: 'block'
                    });
                    miniPreview.src = URL.createObjectURL(file);
                    bigPreview.src = URL.createObjectURL(file);
                }
            }

            function writeNewsTitle() {
                const text = $previewTitle.val();
                if(text != ''){
                    miniPreviewTitle.innerText = `${text}`;
                    bigPreviewTitle.innerText = `${text}`;
                }else{
                    miniPreviewTitle.innerText ='Заголовок новости';
                    bigPreviewTitle.innerText = 'Заголовок новости';
                }
            }
        </script>
<? break;
case "/adminka/index.php?editor=edit-news&id=".$newsID:
    $sql = "SELECT * FROM `news`
    INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
    INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
    INNER JOIN `games` ON `news`.`Game_ID` = `games`.`Game_ID`
    WHERE `News_ID` = ".$newsID;
    $data = $pdo->query($sql);
    $newsContent = $data->fetchAll();
?>
    <style>
        .input-news__menu-block.gameName,
        .block__mini-preview{
            display: block;
        }
    </style>
    <form method="POST" enctype="multipart/form-data">
        <?foreach($newsContent as $content):?>
            <div class="inputs-news">
                <input type="text" id="newsTitle" name="newsTitle" value="<?=$content['News_name']?>" placeholder="Заголовок писать здесь" autocomplete="off" onkeyup="writeNewsTitle();" required>

                <div class="input-news__menu-block">
                    <select class="menu-block__menu" name="newsTag">
                        <option value="<?=$content['News_tag_ID']?>" disabled selected><?=$content['News_tag']?></option>
                        <?foreach($news_tags as $n) : ?>
                            <option value="<?=$n['News_tag_ID']?>"><?=$n['News_tag']?></option>
                        <?endforeach;?>
                    </select>
                </div>

                <div class="input-news__menu-block gameName">
                    <select class="menu-block__menu" name="gameName">
                        <option value="<?=$content['Game_ID']?>" disabled selected><?=$content['Game_name']?></option>
                        <?foreach($selectGames as $n) : ?>
                            <option value="<?=$n['Game_ID']?>"><?=$n['Game_name']?></option>
                        <?endforeach;?>
                    </select>
                </div>

                <label class="label">
                    <div>
                        <i class="fa-solid fa-file-image"></i>
                        <span>Изменить превью</span>
                    </div>
                    <input type="file" name="newsPreviewImg" class="input-file" id="imgInp" accept="image/*">
                </label>
            </div>

            <fieldset class="block__mini-preview">
                <legend>Вид новости в миниатюре</legend>
                <div class="column-item__block">
                    <div class="item-img__block">
                        <div class="item-teg">Категория</div>
                        <img id="miniPreview" src="/media/news/preview_img/<?=$content['News_preview_img']?>" class="item-img">
                    </div>
                    <div class="item-text__block">
                        <div class="item-date">Дата: <? $date = strtotime($content['News_date']);
                                                        echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="item-name"><?=$content['News_name']?></div>
                        <div class="item-name-author">Автор: <?= $content['Login'] ?></div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="block-preview">
                <legend>Вид новости при подробном просмотре</legend>
                <h2 class="post-title"><?=$content['News_name']?></h2>
                <img id="bigPreview" src="/media/news/preview_img/<?=$content['News_preview_img']?>" alt="Здесь появится превью после загрузки" />
                <textarea name="content" id="editor"><?= $content['News_text'] ?></textarea>
            </fieldset>

            <input type="submit" name="editNews" class="input-news__submit">
        <?endforeach;?>
    </form>
    <?php
        if(isset($_POST['editNews'])) {
            $varTag = $_POST['newsTag'];
            $varGame = $_POST['gameName'];
            if ($varTag > 0) {
                $files = $_FILES['newsPreviewImg'];
                $fileTmpPath = $files['tmp_name'];
                $fileName = $files['name'];
                move_uploaded_file($fileTmpPath, '../media/news/preview_img/' . $files['name']);

                $sql2 = "UPDATE `news` SET `News_name` = ?, `News_preview_img` = ?, `News_text` = ?, `News_tag_ID` = ?, `Game_ID` = ? WHERE `News_ID` = ?";
                $editdnews = $pdo->prepare($sql2);
                $editdnews->execute(array($_POST['newsTitle'], $fileName, $_POST['content'], $varTag, $varGame, $newsID));
                echo "<script type='text/javascript'>location.href='index.php?page=news'</script>";
            }else{
                echo "<span class='err-msg'>Категория для новости не выбрана</span>";
            }
        }
    ?>
    <script>
            const
                $previewTitle = $('#newsTitle'),
                miniPreviewTitle = document.querySelector(".item-name"),
                bigPreviewTitle = document.querySelector(".post-title");


            imgInp.onchange = evt => {
                const [file] = imgInp.files;
                if (file) {
                    $('.block__mini-preview').css({
                            display: 'block'
                    });
                    miniPreview.src = URL.createObjectURL(file);
                    bigPreview.src = URL.createObjectURL(file);
                }
            }
            function writeNewsTitle() {
                const text = $previewTitle.val();
                if(text != ''){
                    miniPreviewTitle.innerText = `${text}`;
                    bigPreviewTitle.innerText = `${text}`;
                }else{
                    miniPreviewTitle.innerText ='Заголовок новости';
                    bigPreviewTitle.innerText = 'Заголовок новости';
                }
            }
        </script>
<?break;
case "/adminka/index.php?editor=add-game":
    // $sql = "SELECT `games`.`Game_ID`, `games`.`Game_name`, `games`.`Game_preview_img`,
    // `games`.`Game_date`, `games`.`Game_rating`, `games`.`Game_video`, `games`.`Game_prices`,
    // `games`.`Game_developer`, `games`.`Game_system_requirements`, `games`.`Game_about`,
    // GROUP_CONCAT(`games_genres`.`Genre_name` SEPARATOR ', ') as genres
    // FROM `genres_in_games`
    // INNER JOIN `games` ON `genres_in_games`.`Game_ID` = `games`.`Game_ID`
    // INNER JOIN `games_genres` ON `genres_in_games`.`Genre_ID` = `games_genres`.`Genre_ID`
    // GROUP BY `games`.`Game_ID`, `games`.`Game_name`";
    $sql = "SELECT * FROM `games`";
    $data = $pdo->query($sql);
    $addGame = $data->fetchAll();
?>
    <form method="POST" enctype="multipart/form-data">
        <div class="inputs-games">
            <div class="inputs-text__game">
                <input type="text" id="gameName" name="gameName" placeholder="Название писать здесь" autocomplete="off" onkeyup="writeGameName();" required>
                <input type="text" id="developerName" name="developerName" placeholder="Издателя писать здесь" autocomplete="off" onkeyup="writeDeveloper();" required>
                <input type="date" name="gameDate" id="gameDate" required>
            </div>
            <div class="input-games__menu-block">
                <span>Выберите жанры игры</span>
                <select class="menu-block__menu" name="gameGenres[]" id="gameGenres" size="3" multiple>
                    <?foreach($gamesGenres as $n) : ?>
                        <option value="<?=$n['Genre_name']?>"><?=$n['Genre_name']?></option>
                    <?endforeach;?>
                </select>
            </div>
            <div class="download-inputs">
                <label class="label">
                    <div>
                        <i class="fa-solid fa-file-image"></i>
                        <span>Загрузить превью</span>
                    </div>
                    <input type="file" name="gamePreviewImg" class="input-file" id="imgInp" accept="image/*">
                </label>
                <label class="label">
                    <div>
                        <i class="fa-solid fa-file-video"></i>
                        <span>Загрузить трейлер</span>
                    </div>
                    <input type="file" name="gamePreviewVideo" class="input-file" id="videoInp" accept="video/*" required>
                </label>
            </div>
        </div>
        <fieldset class="block-preview block-preview__games">
            <legend>Вид игры при подробном просмотре</legend>
            <div class="game-card__info-block">
                <img class="preview-img" id="previewImg" src="" alt="Здесь появится превью после загрузки" />
                <div class="game-info__block">
                    <div class="game-name">Название игры</div>
                    <div><span class="game-genre">Жанры игры</span></div>
                    <div>Дата выхода: <span class="game-date">0000-00-00</span></div>
                    <div>Разработчик: <span class="developer-name"></span></div>
                    <div>Цены в официальных магазинах:</div>
                    <textarea name="gamePrice" id="editor">
                        <p>PS Store: &#8381;</p>
                        <p>Steam: &#8381;</p>
                        <p>Epic Games: &#8381;</p>
                    </textarea>
                </div>
            </div>
            <div class="info-title">минимальные системные требования</div>
            <textarea name="systemRequirements" id="editor">
                <p>ОС:</p>
                <p>Процессор:</p>
                <p>Видеокарта:</p>
                <p>Оперативная память:</p>
                <p>Место на диске:</p>
            </textarea>
            <div class="video-block">
                <video controls type="video/mp4">
                    <source id="videoTrailer" src="">
                </video>
            </div>
            <div class="info-title">об игре</div>
            <textarea name="aboutGame" id="editor">Информация об игре</textarea>
        </fieldset>

        <input type="submit" name="addGame" class="input-news__submit">
    </form>
    <?php
        if(isset($_POST['addGame'])) {
            $systemRequirements = $_POST['systemRequirements'];
            $developerName      = $_POST['developerName'];
            $GenresArray        = $_POST['gameGenres'];
            $gamePrices         = $_POST['gamePrice'];
            $aboutGame          = $_POST['aboutGame'];
            $gameName           = $_POST['gameName'];
            $gameDate           = $_POST['gameDate'];
            $gameName           = $_POST['gameName'];

            $GenresJson = json_encode($GenresArray, JSON_UNESCAPED_UNICODE);

            // //создание папки игры
            $home = $_SERVER['DOCUMENT_ROOT']."/";
            //проверка на существование папки на сервере
            if(is_dir($home."/media/games/".$gameName)){
                echo "Такая игра уже существует";
            }else{
                //проверка, загрузили ли превьюшку
                if(is_uploaded_file($_FILES['gamePreviewImg']['tmp_name'])){
                    //создание папок Img и Video
                    $img = $home."/media/games/".$gameName."/Img";
                    $video = $home."/media/games/".$gameName."/Video";
                    if(!is_dir($img)) @mkdir($img,0777, true);
                    if(!is_dir($video)) @mkdir($video,0777, true);

                    //загрузка изображения в созданную папку игры
                    $files = $_FILES['gamePreviewImg'];
                    $fileTmpPath = $files['tmp_name'];
                    $previewImg = $files['name'];
                    $urlImg = "/media/games/".$gameName.'/'.$files['name'];
                    move_uploaded_file($fileTmpPath, '../media/games/'.$gameName.'/' . $files['name']);

                    //загрузка видео в созданную папку игры
                    $files1 = $_FILES['gamePreviewVideo'];
                    $fileTmpPath1 = $files1['tmp_name'];
                    $trailerVideo = $files1['name'];
                    $urlVideo = "/media/games/".$gameName.'/Video/'.$files1['name'];
                    move_uploaded_file($fileTmpPath1,  $video.'/'. $files1['name']);

                    $sql = "INSERT INTO `games` SET `Game_name` = ?, `Game_preview_img` = ?, `Game_date` = ?, `Game_rating` = ?, `Game_video` = ?, `Game_prices` = ?, `Game_developer` = ?, `Game_system_requirements` = ?, `Game_about` = ?, `Game_genres` = ?";
                    $insertComm = $pdo->prepare($sql);
                    $insertComm->execute(array($gameName, $urlImg, $gameDate, "0", $urlVideo, $gamePrices, $developerName, $systemRequirements, $aboutGame, $GenresJson));
                    echo "<script type='text/javascript'>location.href='index.php?page=games'</script>";
               }else{
                    echo "Не загружено превью игры";
               }
            }
        }
    ?>
    <script>
        const
            $writeGameName   = $('#gameName'),
            $writeDeveloper  = $('#developerName'),
            $gameName        = $('.game-name'),
            $developerName   = $('.developer-name'),
            $gameDate        = $('.game-date'),
            videoInp         = document.getElementById('videoInp'),
            gameDateSelect   = document.getElementById('gameDate');

        function writeGameName() {
            let $text = $writeGameName.val();
            if($text != ''){
                $gameName.html($text);
            }else{
                $gameName.html('Название игры');
            }
        };

        function writeDeveloper() {
            let $text = $writeDeveloper.val();
            if($text != ''){
                $developerName.html($text);
            }else{
                $developerName.html('Разработчик');
            }
        };
        gameDateSelect.onchange = function(){
            let $input = $(this).val();
            $gameDate.html($input);
        }
        imgInp.onchange = evt => {
            const [file] = imgInp.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        };
        videoInp.onchange = function(event) {
            let file = event.target.files[0];
            let blobURL = URL.createObjectURL(file);
            document.querySelector("video").src = blobURL;
        }
        document.addEventListener('DOMContentLoaded', () => {
            var a = document.getElementsByTagName('video')[0];
            a.volume = 0.1;
        });
    </script>
<? break;
case "/adminka/index.php?editor=edit-games&idgame=".$gameID:
    $sql = "SELECT * FROM `games`
    WHERE `Game_ID` = ".$gameID;
    $data = $pdo->query($sql);
    $editGame = $data->fetchAll();
?>
    <form method="POST" enctype="multipart/form-data">
        <?foreach($editGame as $content):?>
            <div class="inputs-games">
                <div class="inputs-text__game">
                    <input type="text" id="gameName" value="<?=$content['Game_name']?>" name="gameName" placeholder="Название писать здесь" autocomplete="off" onkeyup="writeGameName();" required>
                    <input type="text" id="developerName" value="<?=$content['Game_developer']?>" name="developerName" placeholder="Издателя писать здесь" autocomplete="off" onkeyup="writeDeveloper();" required>
                    <input type="date" value="<?=$content['Game_date']?>" name="gameDate" id="gameDate" required>
                </div>
                <div class="input-games__menu-block">
                    <span>Выберите жанры игры</span>
                    <select class="menu-block__menu" name="gameGenres[]" id="gameGenres" size="3" multiple>
                        <?foreach($gamesGenres as $n) : ?>
                            <option value="<?=$n['Genre_name']?>"><?=$n['Genre_name']?></option>
                        <?endforeach;?>
                    </select>
                </div>
                <div class="download-inputs">
                    <label class="label">
                        <div>
                            <i class="fa-solid fa-file-image"></i>
                            <span>Загрузить превью</span>
                        </div>
                        <input type="file" name="gamePreviewImg" class="input-file" id="imgInp" accept="image/*">
                    </label>
                    <label class="label">
                        <div>
                            <i class="fa-solid fa-file-video"></i>
                            <span>Загрузить трейлер</span>
                        </div>
                        <input type="file" name="gamePreviewVideo" class="input-file" id="videoInp" accept="video/*" required>
                    </label>
                </div>
            </div>
            <fieldset class="block-preview block-preview__games">
                <legend>Вид игры при подробном просмотре</legend>
                <div class="game-card__info-block">
                    <img class="preview-img" id="previewImg" src="<?=$content['Game_preview_img']?>" alt="Здесь появится превью после загрузки" />
                    <div class="game-info__block">
                        <div class="game-name">Название игры</div>
                        <div><span class="game-genre">Жанры игры</span></div>
                        <div>Дата выхода: <span class="game-date"><?=$content['Game_date']?></span></div>
                        <div>Разработчик: <span class="developer-name"><?=$content['Game_developer']?></span></div>
                        <div>Цены в официальных магазинах:</div>
                        <textarea name="gamePrice" id="editor"><?=$content['Game_prices']?></textarea>
                    </div>
                </div>
                <div class="info-title">минимальные системные требования</div>
                <textarea name="systemRequirements" id="editor"><?=$content['Game_system_requirements']?></textarea>
                <div class="video-block">
                    <video controls type="video/mp4">
                        <source id="videoTrailer" src="<?=$content['Game_video']?>">
                    </video>
                </div>
                <div class="info-title">об игре</div>
                <textarea name="aboutGame" id="editor"><?=$content['Game_about']?></textarea>
            </fieldset>

            <input type="submit" name="addGame" class="input-news__submit">
        <?endforeach;?>
    </form>
    <?php
        if(isset($_POST['addGame'])) {
            $systemRequirements = $_POST['systemRequirements'];
            $developerName      = $_POST['developerName'];
            $GenresArray        = $_POST['gameGenres'];
            $gamePrices         = $_POST['gamePrice'];
            $aboutGame          = $_POST['aboutGame'];
            $gameName           = $_POST['gameName'];
            $gameDate           = $_POST['gameDate'];
            $gameName           = $_POST['gameName'];

            $GenresJson = json_encode($GenresArray, JSON_UNESCAPED_UNICODE);

            //создание папки игры
            $home = $_SERVER['DOCUMENT_ROOT']."/";
            //проверка на существование папки на сервере
            if(is_dir($home."/media/games/".$gameName)){
                echo "Такая игра уже существует";
            }else{
                //проверка, загрузили ли превьюшку
                if(is_uploaded_file($_FILES['gamePreviewImg']['tmp_name'])){
                    //создание папок Img и Video
                    $img = $home."/media/games/".$gameName."/Img";
                    $video = $home."/media/games/".$gameName."/Video";
                    if(!is_dir($img)) @mkdir($img,0777, true);
                    if(!is_dir($video)) @mkdir($video,0777, true);

                    //загрузка изображения в созданную папку игры
                    $files = $_FILES['gamePreviewImg'];
                    $fileTmpPath = $files['tmp_name'];
                    $previewImg = $files['name'];
                    $urlImg = "/media/games/".$gameName.'/'.$files['name'];
                    move_uploaded_file($fileTmpPath, '../media/games/'.$gameName.'/' . $files['name']);

                    //загрузка видео в созданную папку игры
                    $files1 = $_FILES['gamePreviewVideo'];
                    $fileTmpPath1 = $files1['tmp_name'];
                    $trailerVideo = $files1['name'];
                    $urlVideo = "/media/games/".$gameName.'/Video/'.$files1['name'];
                    move_uploaded_file($fileTmpPath1,  $video.'/'. $files1['name']);

                    $sql = "UPDATE `games` SET `Game_name` = ?, `Game_preview_img` = ?, `Game_date` = ?, `Game_video` = ?, `Game_prices` = ?, `Game_developer` = ?, `Game_system_requirements` = ?, `Game_about` = ?, `Game_genres` = ? WHERE `Game_ID` = ?";
                    $insertComm = $pdo->prepare($sql);
                    $insertComm->execute(array($gameName, $urlImg, $gameDate, $urlVideo, $gamePrices, $developerName, $systemRequirements, $aboutGame, $GenresJson, $gameID));
                    echo "<script type='text/javascript'>location.href='index.php?page=games'</script>";
               }else{
                    echo "Не загружено превью игры";
               }
            }
        }
    ?>
    <script>
        const
            $writeGameName   = $('#gameName'),
            $writeDeveloper  = $('#developerName'),
            $gameName        = $('.game-name'),
            $developerName   = $('.developer-name'),
            $gameDate        = $('.game-date'),
            videoInp         = document.getElementById('videoInp'),
            gameDateSelect   = document.getElementById('gameDate');

        function writeGameName() {
            let $text = $writeGameName.val();
            if($text != ''){
                $gameName.html($text);
            }else{
                $gameName.html('Название игры');
            }
        };

        function writeDeveloper() {
            let $text = $writeDeveloper.val();
            if($text != ''){
                $developerName.html($text);
            }else{
                $developerName.html('Разработчик');
            }
        };
        gameDateSelect.onchange = function(){
            let $input = $(this).val();
            $gameDate.html($input);
        }
        imgInp.onchange = evt => {
            const [file] = imgInp.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        };
        videoInp.onchange = function(event) {
            let file = event.target.files[0];
            let blobURL = URL.createObjectURL(file);
            document.querySelector("video").src = blobURL;
        }
        document.addEventListener('DOMContentLoaded', () => {
            var a = document.getElementsByTagName('video')[0];
            a.volume = 0.1;
        });
    </script>
<? break;}?>