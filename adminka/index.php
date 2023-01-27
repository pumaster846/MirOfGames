<?php
session_start();
if (($_SESSION['userRole'] == 'admin') || ($_SESSION['userRole'] == 'editor')) : ?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="/adminka/css/media.css">
        <script src="https://kit.fontawesome.com/5dd8e1247e.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <title>Административная страница</title>
    </head>

    <body>
        <div class="wrapper">
            <div class="body">
                <div class="two-columns">
                    <div class="modal-column">
                        <div class="burger-wrapper">
                            <i class="fa-solid fa-bars"></i>
                            <div class="burger-menu__block">
                                <div><?= 'Ваш логин: '.$_SESSION['userName'];?></div>
                                    <a href="/index.php" class="burger-column__header-link">На сайт</a>
                                    <div class="burger-modal-column__content-title">Страницы</div>
                                    <ul class="burger-menu-list">
                                        <li class="burger-menu-list__item" data-value="news"><i class="fa-regular fa-rectangle-list"></i><a href="/adminka/index.php?page=news">Новости</a></li>
                                        <li class="burger-menu-list__item" data-value="games"><i class="fa-regular fa-rectangle-list"></i><a href="/adminka/index.php?page=games">Игры</a></li>
                                    </ul>
                                    <?php if($_SESSION['userRole'] == 'admin'): ?>
                                        <div class="burger-modal-column__content-title">Пользователи</div>
                                        <ul class="burger-menu-list">
                                            <li class="burger-menu-list__item"><i class="fa-regular fa-folder"></i><a href="/adminka/index.php?page=images">Изображения</a></li>
                                        </ul>
                                    <? endif; ?>
                                    <a href="/adminka/php/authorization/logout.php" class="burger-logout">Выйти</a>
                            </div>
                        </div>
                        <div class="modal-column__header">
                            <a href="/index.php" class="modal-column__header-link">сайт</a>
                            <div class="modal-column__header-link">администрирование</div>
                        </div>
                        <div class="modal-column__content">
                            <div class="modal-column__title">Контент</div>
                            <div class="modal-column__content-title"><i class="fa-solid fa-caret-right"></i>Страницы</div>
                            <ul class="menu-list">
                                <li class="menu-list__item" data-value="news"><a href="/adminka/index.php?page=news"><i class="fa-regular fa-rectangle-list"></i>Новости</a></li>
                                <li class="menu-list__item" data-value="games"><a href="/adminka/index.php?page=games"><i class="fa-regular fa-rectangle-list"></i>Игры</a></li>
                            </ul>
                            <?php if($_SESSION['userRole'] == 'admin'): ?>
                                <div class="modal-column__content-title"><i class="fa-solid fa-caret-right"></i>Пользователи</div>
                                <ul class="menu-list">
                                    <li class="menu-list__item"><a href="/adminka/index.php?page=images"><i class="fa-regular fa-folder"></i>Изображения</a></li>
                                </ul>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="content-column">
                        <div class="content-column__header">
                            <div class="content-column__header-login"><?= $_SESSION['userName'] ?></div>
                            <a href="/adminka/php/authorization/logout.php" class="content-column__header-logout">выйти</a>
                        </div>
                        <div class="content-column__content">
                            <?php
                                $url = $_SERVER['REQUEST_URI'];
                                switch ($url) {
                                    case("/adminka/index.php?page=news"):?>
                                    <div class="tools-menu">
                                        <ul>
                                            <a href="/adminka/index.php?editor=add-news">
                                                <li class="tools-menu__item" id="addContent">
                                                    <i class="fa-solid fa-circle-plus"></i>Добавить элемент
                                                </li>
                                            </a>
                                            <li class="tools-menu__item" id="deleteContent">
                                                <i class="fa-solid fa-eraser"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <?break;
                                    case("/adminka/index.php?page=games"):?>
                                        <div class="tools-menu">
                                            <ul>
                                                <a href="/adminka/index.php?editor=add-game">
                                                    <li class="tools-menu__item" id="addContent">
                                                        <i class="fa-solid fa-circle-plus"></i>Добавить элемент
                                                    </li>
                                                </a>
                                                <li class="tools-menu__item" id="deleteContent">
                                                    <i class="fa-solid fa-eraser"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    <?break;
                                    case("/adminka/index.php?page=images"):?>
                                        <div class="tools-menu">
                                            <ul>
                                                <li class="tools-menu__item" id="addContent">
                                                    <i class="fa-solid fa-circle-plus"></i>Подтвердить загрузку
                                                </li>
                                                <li class="tools-menu__item" id="deleteContent">
                                                    <i class="fa-solid fa-eraser"></i> Удалить элемент
                                                </li>
                                            </ul>
                                        </div>
                                    <?break;
                                }
                            ?>
                            <div class="content">
                                <?php
                                    include('./php/pagescontent.php');
                                    include('./php/editor.php');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="js/script.js"></script>
    <script src="ckeditor5/ckeditor.js"></script>
    <script>
        let allEditors = document.querySelectorAll('#editor');
        
        const burger = document.querySelector('.fa-bars');

        burger.addEventListener('click', function(){
            var menu = document.querySelector('.burger-menu__block');
            console.log(menu);
            menu.classList.toggle("active");
        });

        for (let i = 0; i < allEditors.length; ++i) {
            ClassicEditor
                .create( allEditors[i], {
                    toolbar: {
                        items: [
                            'bold',
                            'italic',
                            '|',
                            'bulletedList',
                            'link',
                            '|',
                            'undo',
                            'redo'
                        ]
                    },
                })
                .catch( error => {
                    console.log( error );
                });
        }
    </script>

    <!-- <script>
        //**************------------------ Редактор новостей - добавление ------------------**************

        const
            $Highlighting = $('#addHighlighting'), //strong
            $Paragraph = $('#addParagraph'), //p
            $Video = $('#addVideo'), //video
            $Image = $('#addImage'), //img
            $List = $('#addList'), //ul
            $pageContent = $('#pageContent'); //textarea

        function wrapTag(open, close) {
            var control = $pageContent[0],
                start = control.selectionStart,
                end = control.selectionEnd,
                text = $(control).val();

            if (start != end) {
                $(control).val(text.substring(0, start) + open + text.substring(start, end) + close + text.substring(end));
                $(control).focus();
                var sel = end + (open + close).length;
                control.setSelectionRange(sel, sel);
            }
            return false;
        }

        $Highlighting.on('click', () => {
            return wrapTag('<strong>', '</strong>');
        });

        function addTag(tag) {
            var control = $pageContent[0],
                start = control.selectionStart,
                pos = start + tag.length,
                text = $(control).val();

            $(control).val(text.substring(0, start) + tag + text.substring(start));

            control.setSelectionRange(pos, pos);

            // return false;
        }

        

        $Paragraph.on('click', () => {
            return wrapTag('<p>', '</p>');
        });

        $Video.on('click', () => {
            return addTag('<video>\r\n<sourse src="/media/news/news_media/video/">\r\n</video>');
        });
        $Image.on('click', () => {
            $.ajax({
                action: "php/addimage.php",
                name: 'uploadfile',
                onSubmit: function(file, ext) {
                    if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                        $('#status').text('можно загружать только файлы с расширением jpg, png, jpeg, gif');
                        return false;
                    }
                    $('$status').text('Загрузка..');
                },
                onComplete: function(response) {
                    $('#status').text('');
                    if (response != null) {
                        $('#status').html('<img src="/media/temp/' + response + '" alt="">');
                        // return addTag('<img src="/media/temp/' + response + '" alt="">');
                    } else {
                        $('#status').text('Файл не загружен!');
                    }
                }
            })

        });
        $List.on('click', () => {
            return addTag('<ul>\r\n<li>TEXT</li>\r\n<li>TEXT</li>\r\n<li>TEXT</li>\r\n<li>TEXT</li>\r\n</ul>');
        });

        //************** ------------------------------------------------------------------- **************
    </script> -->

    </html>

<? else :
    require_once("./php/authorization/login.php");
endif; ?>