<?php
    require_once('connection-db/logic.php');
    if(isset($_POST['sortID'])){
        $sortID = $_POST['sortID'];
    };
    switch($sortID){
        case(1):
            $sql = "SELECT * FROM `news`
            INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
            INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
            ORDER BY `News_date` ASC";
            $data = $pdo->query($sql);
            $sortDate = $data->fetchAll();

            foreach ($sortDate as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['News_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['News_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['News_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['News_tag'] ?></div>
                        <div class="t-d name"><?= $n['News_name'] ?></div>
                        <div class="t-d author"><?= $n['Login'] ?></div>
                        <div class="t-d id"><?= $n['News_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(2):
            $sql = "SELECT * FROM `news`
            INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
            INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
            ORDER BY `News_tag` ASC";
            $data = $pdo->query($sql);
            $sortTag = $data->fetchAll();

            foreach ($sortTag as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['News_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['News_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['News_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['News_tag'] ?></div>
                        <div class="t-d name"><?= $n['News_name'] ?></div>
                        <div class="t-d author"><?= $n['Login'] ?></div>
                        <div class="t-d id"><?= $n['News_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(3):
            $sql = "SELECT * FROM `news`
            INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
            INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
            ORDER BY `News_name` ASC";
            $data = $pdo->query($sql);
            $sortName = $data->fetchAll();

            foreach ($sortName as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['News_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['News_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['News_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['News_tag'] ?></div>
                        <div class="t-d name"><?= $n['News_name'] ?></div>
                        <div class="t-d author"><?= $n['Login'] ?></div>
                        <div class="t-d id"><?= $n['News_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(4):
            $sql = "SELECT * FROM `news`
            INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
            INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
            ORDER BY `Login` ASC";
            $data = $pdo->query($sql);
            $sortAuthor = $data->fetchAll();

            foreach ($sortAuthor as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['News_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['News_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['News_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['News_tag'] ?></div>
                        <div class="t-d name"><?= $n['News_name'] ?></div>
                        <div class="t-d author"><?= $n['Login'] ?></div>
                        <div class="t-d id"><?= $n['News_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(5):
            $sql = "SELECT * FROM `news`
            INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
            INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
            ORDER BY `News_ID` ASC";
            $data = $pdo->query($sql);
            $sortNewsID = $data->fetchAll();

            foreach ($sortNewsID as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['News_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['News_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['News_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['News_tag'] ?></div>
                        <div class="t-d name"><?= $n['News_name'] ?></div>
                        <div class="t-d author"><?= $n['Login'] ?></div>
                        <div class="t-d id"><?= $n['News_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(6):
            $sql = "SELECT * FROM `games`
            ORDER BY `Game_date` ASC";
            $data = $pdo->query($sql);
            $sortGamesDate = $data->fetchAll();

            foreach ($sortGamesDate as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['Games_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['Games_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['Game_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['Game_rating'] ?></div>
                        <div class="t-d name"><?= $n['Game_name'] ?></div>
                        <div class="t-d author"><?= $n['Game_developer'] ?></div>
                        <div class="t-d id"><?= $n['Game_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(7):
            $sql = "SELECT * FROM `games`
            ORDER BY `Game_rating` DESC";
            $data = $pdo->query($sql);
            $sortGamesRating = $data->fetchAll();

            foreach ($sortGamesRating as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['Games_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['Games_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['Game_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['Game_rating'] ?></div>
                        <div class="t-d name"><?= $n['Game_name'] ?></div>
                        <div class="t-d author"><?= $n['Game_developer'] ?></div>
                        <div class="t-d id"><?= $n['Game_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(8):
            $sql = "SELECT * FROM `games`
            ORDER BY `Game_name` ASC";
            $data = $pdo->query($sql);
            $sortGamesName = $data->fetchAll();

            foreach ($sortGamesName as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['Games_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['Games_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['Game_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['Game_rating'] ?></div>
                        <div class="t-d name"><?= $n['Game_name'] ?></div>
                        <div class="t-d author"><?= $n['Game_developer'] ?></div>
                        <div class="t-d id"><?= $n['Game_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(9):
            $sql = "SELECT * FROM `games`
            ORDER BY `Game_developer` ASC";
            $data = $pdo->query($sql);
            $sortGamesDeveloper = $data->fetchAll();

            foreach ($sortGamesDeveloper as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['Games_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['Games_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['Game_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['Game_rating'] ?></div>
                        <div class="t-d name"><?= $n['Game_name'] ?></div>
                        <div class="t-d author"><?= $n['Game_developer'] ?></div>
                        <div class="t-d id"><?= $n['Game_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(10):
            $sql = "SELECT * FROM `games`
            ORDER BY `Game_ID` ASC";
            $data = $pdo->query($sql);
            $sortGamesID = $data->fetchAll();

            foreach ($sortGamesID as $n) : ?>
                <a href="/adminka/index.php?editor=edit&id=<?=$n['Games_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['Games_ID']?>">
                        <div class="t-d date">
                            <? $date = strtotime($n['Game_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        <div class="t-d tag"><?= $n['Game_rating'] ?></div>
                        <div class="t-d name"><?= $n['Game_name'] ?></div>
                        <div class="t-d author"><?= $n['Game_developer'] ?></div>
                        <div class="t-d id"><?= $n['Game_ID'] ?></div>
                    </div>
                </a>
            <? endforeach;
        break;
        case(11):
            $sql = "SELECT * FROM `users_screenshots`
            INNER JOIN `users` ON `users_screenshots`.`User_ID` = `users`.`User_ID`
            INNER JOIN `games` ON `users_screenshots`.`Game_ID` = `games`.`Game_ID`
            ORDER BY `Game_Name` ASC";
            $data = $pdo->query($sql);
            $sortScreenID = $data->fetchAll();

            foreach ($sortScreenID as $n) : ?>
                <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['Screenshot_ID']?>" data-status="<?=$n['Archive']?>">
                    <div class="t-d">
                        <?php if($n['Archive'] == 1){ echo "&#10003;"; }else{ echo "&#128500;"; } ?>
                    </div>
                    <img class="minimized t-d-screen" src="<?=$n['Screenshot_url']?>">
                    <div class="t-d"><?=$n['Game_name']?></div>
                    <div class="t-d"><?=$n['Login']?></div>
                    <div class="t-d"><?=$n['Screenshot_ID']?></div>
                </div>
                <script>
                    $(document).ready(function() {
                        const
                            sortInputs = document.querySelectorAll('.t-h'),
                            checkbox = document.querySelectorAll('.checkbox'),
                            $addInput = $('#addContent'),
                            $deleteInput = $('#deleteContent');

                            sortInputs.forEach((item, i) => {
                                item.addEventListener('click', function() {
                                    let sortID = this.getAttribute('data-sortID');
                                    $.ajax({
                                        url: '/adminka/php/sort.php',
                                        method: 'POST',
                                        data: {
                                            'sortID': sortID
                                        }
                                    }).success((done) => {
                                        $('.table-content').html(done);
                                    });
                                });
                            });

                            $addInput.on('click', function(){
                                const idCheckbox = [];
                                let idScreen;

                                $.each(checkbox, (index, value) => {
                                    if($(value).is(":checked")) {
                                        idScreen = $(value).attr('data-id');
                                        screenStatus = $(value).attr('data-status');
                                        idCheckbox.push(idScreen);
                                    }
                                });

                                    if(screenStatus == 0){
                                        $.ajax({
                                            url: "/adminka/php/addscreenshots.php",
                                            method: "POST",
                                            data: {
                                                'idScreenshot' : idCheckbox
                                            }
                                        })
                                        .success(() => {
                                            location.reload();
                                        });
                                    }else{
                                        alert('Одна из записей уже загружена');
                                    }
                            });
                            
                            $deleteInput.on('click', function(){
                                const idCheckbox = [];
                                let idNews;

                                $.each(checkbox, (index, value) => {
                                    if($(value).is(":checked")) {
                                        idNews = $(value).attr('data-id');
                                        idCheckbox.push(idNews);
                                    }
                                });
                                    const confirmDelete = confirm('Вы уверены, что хотите удалить записи?');
                                    
                                    if(confirmDelete == true) {
                                        $.ajax({
                                            url: "/adminka/php/deletescreenshots.php",
                                            method: "POST",
                                            data: {
                                                'idScreenshot' : idCheckbox
                                            }
                                        })
                                        .success(() => {
                                            location.reload();
                                        });
                                    }
                                }
                            });
                    });
                </script>
            <? endforeach;
        break;
        case(12):
            $sql = "SELECT * FROM `users_screenshots`
            INNER JOIN `users` ON `users_screenshots`.`User_ID` = `users`.`User_ID`
            INNER JOIN `games` ON `users_screenshots`.`Game_ID` = `games`.`Game_ID`
            ORDER BY `Login` ASC";
            $data = $pdo->query($sql);
            $sortScreenID = $data->fetchAll();

            foreach ($sortScreenID as $n) : ?>
                <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['Screenshot_ID']?>" data-status="<?=$n['Archive']?>">
                    <div class="t-d">
                        <?php if($n['Archive'] == 1){ echo "&#10003;"; }else{ echo "&#128500;"; } ?>
                    </div>
                    <img class="minimized t-d-screen" src="<?=$n['Screenshot_url']?>">
                    <div class="t-d"><?=$n['Game_name']?></div>
                    <div class="t-d"><?=$n['Login']?></div>
                    <div class="t-d"><?=$n['Screenshot_ID']?></div>
                </div>
                <script>
                    $(document).ready(function() {
                        const
                            sortInputs = document.querySelectorAll('.t-h'),
                            checkbox = document.querySelectorAll('.checkbox'),
                            $addInput = $('#addContent'),
                            $deleteInput = $('#deleteContent');

                            sortInputs.forEach((item, i) => {
                                item.addEventListener('click', function() {
                                    let sortID = this.getAttribute('data-sortID');
                                    $.ajax({
                                        url: '/adminka/php/sort.php',
                                        method: 'POST',
                                        data: {
                                            'sortID': sortID
                                        }
                                    }).success((done) => {
                                        $('.table-content').html(done);
                                    });
                                });
                            });

                            $addInput.on('click', function(){
                                const idCheckbox = [];
                                let idScreen;

                                $.each(checkbox, (index, value) => {
                                    if($(value).is(":checked")) {
                                        idScreen = $(value).attr('data-id');
                                        screenStatus = $(value).attr('data-status');
                                        idCheckbox.push(idScreen);
                                    }
                                });

                                    if(screenStatus == 0){
                                        $.ajax({
                                            url: "/adminka/php/addscreenshots.php",
                                            method: "POST",
                                            data: {
                                                'idScreenshot' : idCheckbox
                                            }
                                        })
                                        .success(() => {
                                            location.reload();
                                        });
                                    }else{
                                        alert('Одна из записей уже загружена');
                                    }
                            });
                            
                            $deleteInput.on('click', function(){
                                const idCheckbox = [];
                                let idNews;

                                $.each(checkbox, (index, value) => {
                                    if($(value).is(":checked")) {
                                        idNews = $(value).attr('data-id');
                                        idCheckbox.push(idNews);
                                    }
                                });
                                    const confirmDelete = confirm('Вы уверены, что хотите удалить записи?');
                                    
                                    if(confirmDelete == true) {
                                        $.ajax({
                                            url: "/adminka/php/deletescreenshots.php",
                                            method: "POST",
                                            data: {
                                                'idScreenshot' : idCheckbox
                                            }
                                        })
                                        .success(() => {
                                            location.reload();
                                        });
                                    }
                                }
                            });
                    });
                </script>
            <? endforeach;
        break;
        case(13):
            $sql = "SELECT * FROM `users_screenshots`
            INNER JOIN `users` ON `users_screenshots`.`User_ID` = `users`.`User_ID`
            INNER JOIN `games` ON `users_screenshots`.`Game_ID` = `games`.`Game_ID`
            ORDER BY `Screenshot_ID` ASC";
            $data = $pdo->query($sql);
            $sortScreenID = $data->fetchAll();

            foreach ($sortScreenID as $n) : ?>
                <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['Screenshot_ID']?>" data-status="<?=$n['Archive']?>">
                    <div class="t-d">
                        <?php if($n['Archive'] == 1){ echo "&#10003;"; }else{ echo "&#128500;"; } ?>
                    </div>
                    <img class="minimized t-d-screen" src="<?=$n['Screenshot_url']?>">
                    <div class="t-d"><?=$n['Game_name']?></div>
                    <div class="t-d"><?=$n['Login']?></div>
                    <div class="t-d"><?=$n['Screenshot_ID']?></div>
                </div>
                <script>
                    $(document).ready(function() {
                        const
                            sortInputs = document.querySelectorAll('.t-h'),
                            checkbox = document.querySelectorAll('.checkbox'),
                            $addInput = $('#addContent'),
                            $deleteInput = $('#deleteContent');

                            sortInputs.forEach((item, i) => {
                                item.addEventListener('click', function() {
                                    let sortID = this.getAttribute('data-sortID');
                                    $.ajax({
                                        url: '/adminka/php/sort.php',
                                        method: 'POST',
                                        data: {
                                            'sortID': sortID
                                        }
                                    }).success((done) => {
                                        $('.table-content').html(done);
                                    });
                                });
                            });

                            $addInput.on('click', function(){
                                const idCheckbox = [];
                                let idScreen;

                                $.each(checkbox, (index, value) => {
                                    if($(value).is(":checked")) {
                                        idScreen = $(value).attr('data-id');
                                        screenStatus = $(value).attr('data-status');
                                        idCheckbox.push(idScreen);
                                    }
                                });

                                    if(screenStatus == 0){
                                        $.ajax({
                                            url: "/adminka/php/addscreenshots.php",
                                            method: "POST",
                                            data: {
                                                'idScreenshot' : idCheckbox
                                            }
                                        })
                                        .success(() => {
                                            location.reload();
                                        });
                                    }else{
                                        alert('Одна из записей уже загружена');
                                    }
                            });
                            
                            $deleteInput.on('click', function(){
                                const idCheckbox = [];
                                let idNews;

                                $.each(checkbox, (index, value) => {
                                    if($(value).is(":checked")) {
                                        idNews = $(value).attr('data-id');
                                        idCheckbox.push(idNews);
                                    }
                                });
                                    const confirmDelete = confirm('Вы уверены, что хотите удалить записи?');
                                    
                                    if(confirmDelete == true) {
                                        $.ajax({
                                            url: "/adminka/php/deletescreenshots.php",
                                            method: "POST",
                                            data: {
                                                'idScreenshot' : idCheckbox
                                            }
                                        })
                                        .success(() => {
                                            location.reload();
                                        });
                                    }
                                }
                            });
                    });
                </script>
            <? endforeach;
        break;
    }
?>