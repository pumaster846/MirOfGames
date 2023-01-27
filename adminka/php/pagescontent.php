<?php
require_once('connection-db/logic.php');
$url = $_SERVER['REQUEST_URI'];

switch ($url) {
    case "/adminka/": ?>
        <h2>Административная часть</h2>
        <p>С возвращением, <?=$_SESSION['userName']?></p>
        <p>Удачной работы</p>
        <p>Разработчик сайта - Мирсал Нигаматьянов</p>
    <? break;
    case "/adminka/index.php": ?>
        <h2>Административная часть</h2>
        <p>С возвращением, <?=$_SESSION['userName']?></p>
        <p>Удачной работы</p>
        <p>Разработчик сайта - Мирсал Нигаматьянов</p>
    <? break;
    case "/adminka/index.php?page=news": ?>
        <style>
            .tools-menu {
                display: block;
            }
        </style>
        <div class="table">
            <div class="t-r">
                <div class="t-h"></div>
                <div class="t-h" data-sortID="1">Дата <i class="fa-solid fa-arrow-down-short-wide"></i></div>
                <div class="t-h" data-sortID="2">Тег <i class="fa-solid fa-arrow-down-a-z"></i></div>
                <div class="t-h" data-sortID="3">Наименование <i class="fa-solid fa-arrow-down-a-z"></i></div>
                <div class="t-h" data-sortID="4">Автор <i class="fa-solid fa-arrow-down-a-z"></i></div>
                <div class="t-h" data-sortID="5">ID <i class="fa-solid fa-arrow-down-short-wide"></i></div>
            </div>
            <div class="table-content">
            <? foreach ($news as $n) : ?>
                <a href="/adminka/index.php?editor=edit-news&id=<?=$n['News_ID']?>" id="newsLink">
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
            <? endforeach; ?>
            </div>
        </div>
<script>
    $(document).ready(function() {
        const
            sortInputs = document.querySelectorAll('.t-h'),
            checkbox = document.querySelectorAll('.checkbox'),
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
            
            $deleteInput.on('click', function(){
                const idCheckbox = [];
                let idNews;

                $.each(checkbox, (index, value) => {
                    if($(value).is(":checked")) {
                        idNews = $(value).attr('data-id');
                        idCheckbox.push(idNews);
                    }
                });
                if(idCheckbox.length > 0) {
                    const confirmDelete = confirm('Вы уверены, что хотите удалить записи?');
                    
                    if(confirmDelete == true) {
                        $.ajax({
                             url: "/adminka/php/deletenews.php",
                             method: "POST",
                             data: {
                                'idNews' : idCheckbox,
                            }
                        })
                        .success(() => {
                            location.reload();
                        });
                    } else {
                        alert('Вы не выбрали ни одной записи!');
                    }
                }
            });
        });
</script>
<? break;
    case "/adminka/index.php?page=games": ?>
    <style>
            .tools-menu {
                display: block;
            }
        </style>
        <div class="table">
            <div class="t-r">
                <div class="t-h"></div>
                <div class="t-h" data-sortID="6">Дата <i class="fa-solid fa-arrow-down-short-wide"></i></div>
                <div class="t-h" data-sortID="7">Рейтинг <i class="fa-solid fa-arrow-down-wide-short"></i></div>
                <div class="t-h" data-sortID="8">Наименование <i class="fa-solid fa-arrow-down-a-z"></i></div>
                <div class="t-h" data-sortID="9">Издатель <i class="fa-solid fa-arrow-down-a-z"></i></div>
                <div class="t-h" data-sortID="10">ID <i class="fa-solid fa-arrow-down-short-wide"></i></div>
            </div>
            <div class="table-content">
            <? foreach ($games as $n) : ?>
                <a href="/adminka/index.php?editor=edit-games&idgame=<?=$n['Game_ID']?>" id="newsLink">
                    <div class="t-r news-date">
                    <input type="checkbox" name="checkDelete" class="checkbox" id="checkDelete" data-id="<?=$n['Game_ID']?>">
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
            <? endforeach; ?>
            </div>
        </div>
<script>
    $(document).ready(function() {
        const
            sortInputs = document.querySelectorAll('.t-h'),
            checkbox = document.querySelectorAll('.checkbox'),
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
            
            $deleteInput.on('click', function(){
                const idCheckbox = [];
                let idNews;

                $.each(checkbox, (index, value) => {
                    if($(value).is(":checked")) {
                        idNews = $(value).attr('data-id');
                        idCheckbox.push(idNews);
                    }
                });
                if(idCheckbox.length > 0) {
                    const confirmDelete = confirm('Вы уверены, что хотите удалить записи?');
                    
                    if(confirmDelete == true) {
                        $.ajax({
                             url: "/adminka/php/deletegames.php",
                             method: "POST",
                             data: {
                                'idGame' : idCheckbox
                            }
                        })
                        .success(() => {
                            location.reload();
                        });
                    } else {
                        alert('Вы не выбрали ни одной записи!');
                    }
                }
            });
    });
</script>
<? break;
case "/adminka/index.php?page=images": ?>
    <style>
        .tools-menu {
            display: block;
        }
    </style>
    <div class="table">
        <div class="t-r">
            <div class="t-h"></div>
            <div class="t-h-img">Состояние</div>
            <div class="t-h-img">Img</div>
            <div class="t-h" data-sortID="11">Наименование игры <i class="fa-solid fa-arrow-down-a-z"></i></div>
            <div class="t-h" data-sortID="12">Автор <i class="fa-solid fa-arrow-down-a-z"></i></div>
            <div class="t-h" data-sortID="13">ID <i class="fa-solid fa-arrow-down-wide-short"></i></div>
        </div>
        <div class="table-content">
        <? foreach ($Screenshots as $n) : ?>
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
        <? endforeach; ?>
        </div>
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

                if(idCheckbox.length > 0) {
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
                }else {
                    alert('Вы не выбрали ни одной записи!');
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
                if(idCheckbox.length > 0) {
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
                    } else {
                        alert('Вы не выбрали ни одной записи!');
                    }
                }
            });
    });
</script>
<? break;
} ?>

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