-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2022 г., 17:29
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mirofgames`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `Comm_ID` int NOT NULL,
  `User_ID` int NOT NULL,
  `Game_ID` int NOT NULL,
  `Comm` varchar(2500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Comm_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`Comm_ID`, `User_ID`, `Game_ID`, `Comm`, `Comm_date`) VALUES
(1, 2, 1, 'крутая игра', '2022-03-31'),
(10, 11, 56, 'игра <i class=\"fa-solid fa-fire-flame-curved\"></i>ня полная', '2022-04-19'),
(11, 1, 1, 'игра <i class=\"fa-solid fa-fire-flame-curved\"></i>ня', '2022-04-19');

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE `games` (
  `Game_ID` int NOT NULL,
  `Game_name` varchar(100) NOT NULL,
  `Game_preview_img` varchar(100) NOT NULL,
  `Game_date` date NOT NULL,
  `Game_rating` float NOT NULL,
  `Game_video` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Game_prices` varchar(200) NOT NULL,
  `Game_developer` varchar(50) NOT NULL,
  `Game_system_requirements` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Game_about` varchar(2000) NOT NULL,
  `Game_genres` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`Game_ID`, `Game_name`, `Game_preview_img`, `Game_date`, `Game_rating`, `Game_video`, `Game_prices`, `Game_developer`, `Game_system_requirements`, `Game_about`, `Game_genres`) VALUES
(1, 'God Of War (2018)', '/media/games/God Of War (2018)/GodOfWar2018.jpg', '2018-04-20', 3, '/media/games/God Of War (2018)/Video/GodofWar.mp4', '<p>PS Store: 2 489 руб. (Недоступно)<br>Steam: 3 149 руб. (Недоступно)<br>Epic Games: 3 149 руб.</p>', 'SIE Santa Monica Studio', '<p>ОС: Windows 10 (64-разрядная)<br>Процессор: Intel i5-2500k (четырёхъядерный, 3,3 ГГц) или AMD Ryzen 3 1200 (четырёхъядерный, 3,1 ГГц)<br>Видеокарта: NVIDIA GTX 960 (4 ГБ) или AMD R9 290X (4 ГБ)<br>Оперативная память: 8 ГБ (DDR)<br>Место на диске: 70 ГБ (рекомендуется SSD)</p>', '<p>Отправляйтесь в скандинавское царство Отомстив богам Олимпа, Кратос поселился в царстве скандинавских божеств и чудовищ. В этом суровом беспощадном мире он должен не только самостоятельно бороться за выживание... но и научить этому сына.</p><p><strong>Второй шанс</strong></p><p>Кратос снова отец. Будучи наставником и защитником сына, который стремится заслужить уважение отца, Кратос получил неожиданную возможность обуздать собственный гнев, который долгое время определял его поступки.</p><p><strong>Погружайтесь в мрачный мир грозных существ</strong></p><p>От мраморных полов и роскошных колонн Олимпа до диких лесов, гор и пещер скандинавской мифологии задолго до появления викингов — вам предстоит оказаться в совершенно новых местах со своим пантеоном существ, чудовищ и богов.</p><p><strong>Участвуйте в беспощадных сражениях</strong></p><p>С новой камерой за плечом главного героя игроки окажутся ближе к схваткам, чем когда-либо, а сами бои будут под стать скандинавским существам God of War™, с которыми столкнётся Кратос: величественными, суровыми и неутомимыми. Новое основное оружие и способности хранят верность атмосфере серии God of War, давая возможность по-новому взглянуть на жестокие конфликты, присущие игровому жанру.</p>', '[\"Экшен\",\"Приключение\",\"Слэшер\",\"Фэнтези\"]'),
(2, 'The Witcher 3: Wild Hunt', '/media/games/The Witcher 3 Wild Hutn/TheWitcher3WildHutn.jpg', '2015-05-19', 4.5, '/media/games/The Witcher 3 Wild Hutn/', '', '', '', '', '[\"Экшен\",\"Ролевая\",\"Открытый мир\",\"Фэнтези\"]'),
(3, 'Horizon: Forbidden West', '/media/games/Horizon Forbidden West/HorizonForbiddenWest.jpg', '2022-02-18', 3.7, '/media/games/Horizon Forbidden West/', '', '', '', '', '[\"Экшен\",\"Постапокалипсис\",\"Открытый мир\"]'),
(4, 'The Elder Scrolls 5: Skyrim', '/media/games/The Elder Scrolls 5 Skyrim/TheElderScrolls5Skyrim.jpg', '2011-11-11', 4.7, '/media/games/The Elder Scrolls 5 Skyrim/', '', '', '', '', '[\"Экшен\",\"Ролевая\", \"Фэнтези\",\"Открытый мир\"]'),
(5, 'Sifu', '/media/games/Sifu/Sifu.jpg', '2022-02-08', 3.7, '/media/games/Sifu/', '', '', '', '', '[\"Экшен\",\"Файтинг\", \"Инди\",\"Открытый мир\"]'),
(6, 'Metro Exodus', '/media/games/Metro Exodus/MetroExodus.jpg', '2019-02-15', 5, '/media/games/Metro Exodus/', '', '', '', '', '[\"Экшен\",\"Шутер\", \"Выживание\",\"Постапокалипсис\"]'),
(7, 'Elden Ring', '/media/games/Elden Ring/EldenRing.jpg', '2022-02-25', 3, '/media/games/Elden Ring/', '', '', '', '', '[\"Экшен\",\"Ролевая\",\"Открытый мир\",\"Фэнтези\"]'),
(8, 'Cyberpunk 2077', '/media/games/Cyberpunk 2077/Cyberpunk2077.jpg', '2020-12-10', 2, '/media/games/Cyberpunk 2077/', '', '', '', '', '[\"Экшен\",\"Ролевая\",\"Открытый мир\",\"Киберпанк\"]'),
(9, 'The Sims 4', '/media/games/The Sims 4/TheSims4.jpg', '2014-09-01', 3, '/media/games/The Sims 4/', '', '', '', '', '[\"Симулятор\",\"Песочница\"]');

-- --------------------------------------------------------

--
-- Структура таблицы `games_genres`
--

CREATE TABLE `games_genres` (
  `Genre_ID` int NOT NULL,
  `Genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `games_genres`
--

INSERT INTO `games_genres` (`Genre_ID`, `Genre_name`) VALUES
(1, 'Экшен'),
(2, 'Приключение'),
(3, 'Слэшер'),
(4, 'Фэнтези'),
(5, 'Ролевая'),
(6, 'Открытый мир'),
(7, 'Постапокалипсис'),
(8, 'Файтинг'),
(9, 'Инди'),
(10, 'Шутер'),
(11, 'Выживание'),
(12, 'Киберпанк'),
(13, 'Симулятор'),
(14, 'Песочница');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `News_ID` int NOT NULL,
  `News_name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `News_preview_img` varchar(100) NOT NULL,
  `News_text` varchar(10000) NOT NULL,
  `News_date` date NOT NULL,
  `News_tag_ID` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `User_ID` int NOT NULL,
  `Game_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`News_ID`, `News_name`, `News_preview_img`, `News_text`, `News_date`, `News_tag_ID`, `User_ID`, `Game_ID`) VALUES
(1, 'Фанат God of War вручную сделал амфору в древнегреческом стиле', 'iPFgbz9ampaFimMDo6EH2A.png', '<p>Во время прохождения серии God of War игроки неоднократно сталкивались с древнегреческими амфорами, как частью декорации игры. В ранних частях они встречались особо часто, но также одну из них можно было найти и в God of War 2018 года, которая появлялась в качестве <strong>пасхалки</strong>. Один из поклонников игры решил воссоздать простую отсылку в реальной жизни. Пользователь с ником _Azweape_ <a href=\"https://www.reddit.com/r/GodofWar/comments/ttbdn0/hand_made_vase/\">сделал</a> точную копию вазы, где был изображен главный герой франшизы.</p><p>По словам энтузиаста он изготовил амфору с помощью 3D-принтера и вручную обрабатывал. _Azweape_ потребовалось сперва сделать детализированную трехмерную модель, а после печати воссоздать текстуру керамики и искусственно состарить вазу.</p><p>Рукодел собирается продавать, как трехмерную модель, так и саму амфору. Модель можно будет приобрести всего за 15 евро, а вот полностью готовое изделие обойдется в 60 долларов.</p>', '2022-04-15', '3', 11, 1),
(2, 'Для ПК-версии God of War вышло два патча 1.0.10 и 1.0.11', 'UgSVm_JcO5igkQh_B1-CDQ.jpeg', '<p>Sony Santa Monica выпустила два патча для ПК-версии God of War: 1.0.10 и 1.0.11, которые выходят сразу после 1.0.9. Учитывайте, что последний вышел всего несколько дней назад, 23 марта 2022 года.</p><p>Уже одно это должно сказать вам, что это классические исправления ошибок. В версии 1.0.10 исправлена орфографическая ошибка в пользовательском интерфейсе и ошибка в достижениях Steam, а в версии 1.0.11 исправлен графический сбой, из-за которого некоторые игроки видели мигающие огни на протяжении всей игры.</p><p>Оба патча автоматически загружаются и устанавливаются в игру с клиента, на котором она установлена. Единственное, что вам нужно сделать для их получения это подключиться к Интернету.</p>', '2022-02-14', '2', 11, 1),
(3, 'Таким должен быть новый Ведьмак: энтузиаст показал The Witcher 3 с сотней модов на графику в 8К', '_Ayf-4K6BlCJqP5bBUJgLg.png', '<p>Недавний анонс новой игры в серии The Witcher от CD Projekt RED вновь активизировал поклонников франшизы. Энтузиаст показал, какой должна быть новая игра по Ведьмаку. Пользователь установил на The Witcher 3: Wild Hunt больше сотники визуальных модификаций, встроил собственную трассировку лучей и все это показал в разрешении <strong>8К</strong>.</p><p>В первую очередь стоит отметить улучшенную работу визуальных эффектов. Благодаря трассировке лучей, туман стал выглядеть объемнее, а тени приблизились к реалистичности. Кроме этого, у игрока получилось значительно повысить качество растительности, что положительно отражаться на общем впечатлении. Теперь у нас есть наглядный пример, как может выглядеть новый Ведьмак на на Unreal Engine 5.</p><p>Большинство модификаций, которые использовал автор доступны для скачивания <a href=\"https://www.playground.ru/witcher_3_wild_hunt/file/graphics\">здесь</a>. Основой его сбор стал масштабный мод <strong>HD Reworked Project</strong>, который улучшает все текстуры в игре.</p><p>Напомним, недавно геймдиректор CD Projekt RED заявил, что новая игра также получит масштабный открытый мир.</p>', '2021-11-03', '5', 11, 2),
(4, 'Вышло обновление 1.11 для Horizon Forbidden West, исправляющее баланс и квесты', 'pGFZ_-y-3cg0Qzv--RyGiQ.jpeg', '<p><strong>Guerrilla Games</strong> выпустила новое обновление для эксклюзива PlayStation 4 и PlayStation 5 <strong>Horizon Forbidden West</strong>, которое переводит игру на версию <strong>1.11</strong>.</p><p>Многие геймеры жаловались на легендарное снаряжение Horizon Forbidden West после выпуска предыдущего обновления, и в связи с этим последний патч направлен на исправление этого аспекта игры. Версия 1.11 также исправляет баланс оружия и предлагает длинную серию исправлений, касающихся прохождения основных и второстепенных миссий, чтобы предложить игрокам плавный игровой процесс. Также ожидается, что обновление улучшит работу с динамическим разрешением и визуальное качество некоторых областей под водой.</p><p><strong>Примечания к патчу</strong></p><ul><li>Исправлена ​​ошибка в основном задании «Расколотое небо», из-за которой иногда игроки не могли взаимодействовать с Коталло или следовать за ним после быстрого перемещения и прохождения другого дополнительного контента.</li><li>Исправлена ​​ошибка в основном задании «Крылья десяти», из-за которой в редких случаях цель не обновлялась после возвращения на базу, что блокировало прогресс.</li><li>Исправлена ​​проблема с врагами-гуманоидами, из-за которой нанесение смертельного удара шипометом могло привести к тому, что враги застыли на месте, а не умерли и не упали на землю.</li><li>Перебалансировано непреднамеренное изменение легендарного оружия.</li><li>Активация новой подсказки квеста, когда она отображается в HUD, теперь будет правильно выделять этот квест на вкладке «Квесты» в журнале.</li><li>Исправлена ​​ошибка, из-за которой попытка доступа к верстаку после продажи всего оружия приводила к бесконечному черному экрану.</li><li>Подсказки к действию и маркеры квестов теперь можно скрыть в пользовательских настройках HUD.</li><li>Улучшена видимость в подводной части офиса San Francisco Challenge Ruin Hobart.</li><li>Изменен порядок сортировки некоторых активов растительности, чтобы сократить время рендеринга.</li><li>Внесены изменения в систему динамического разрешения для лучшего масштабирования.</li><li>Несколько исправлений сбоев.</li><li>Множественные исправления потоковой передачи в игре и роликах.</li><li>Добавлены субтитры к тексту заглавной песни «In The Flood».</li><li>Исправлена ​​ошибка, из-за которой настройки, связанные со сложностью, могли быть включены в режимах сложности, которые их не допускали.</li><li>Исправлено несколько случаев, когда Элой могла застрять.</li><li>Несколько исправлений анимации Элой.</li><li>Несколько исправлений и улучшений звука.</li><li>Несколько исправлений освещения и улучшений кинематографии.</li><li>Многочисленные исправления и улучшения анимации тела и лица в роликах.</li><li>Множество исправлений и улучшений анимации NPC и реквизита NPC в поселениях.</li><li>Несколько исправлений и улучшений локализации.</li><li>Несколько других исправлений ошибок.</li></ul><p>Полные примечания к патчу вы найдёте по <a href=\"https://www.reddit.com/r/horizon/comments/txl29g/patch_110_111/\">ссылке</a>.</p>', '2020-04-15', '2', 11, 3),
(5, 'Создатели Sifu сообщили о 500 тысячах игроков', '6v6YRnODN-_-CY4K7jmnjw.jpeg', '<p><strong>Sifu</strong> достигла более 500 000 игроков на PS5, PS4 и ПК, о чем сообщила команда разработчиков Sloclap в сообщении, поблагодарив пользователей за отличный прием игры.</p><p>Игра, основанная на боевых искусствах, предлагает свежий, увлекательный и сложный опыт с некоторыми действительно интересными идеями. Одна из них — своеобразная система, регулирующая здоровье главного героя, который может быть воскрешен после смерти, но платит дань в виде нескольких лет жизни и поэтому возвращается постаревшим, менее быстрым и выносливым, но более опытным и сильным.</p><p>Действие происходит в вымышленном городе в современном Китае. В нем рассказывается история мастера боевых искусств, поклявшегося отомстить группе мудрецов, убивших его учителя. Титул «<strong>Sifu</strong>» в переводе с китайского означает «мастер».</p>', '2022-04-18', '3', 11, 5),
(6, 'Metro получит новую версию или игры серии попадут на PS5 и Xbox Series X|S? Разработчики обещают анонс', 'UaVdoB226vTkbUqV2E_7Zw.jpeg', '<p>Украинская студия 4A Games в прошлом году выпустила Metro Exodus, но нельзя забывать, что в 2010 году разработчики представили первый продукт, созданный по вселенной Дмитрия Глуховского. Разработчики пока не успели отметить 10-летие бренда, но, видимо, нас ждёт что-то приятное.</p><p>Создатели Metro объявили, что 25 ноября состоится что-то важное, связанное с брендом Metro. Самые большие оптимисты верят в анонс новой версии, некоторые фанаты упоминают улучшения для следующего поколения в Metro Exodus, отдельные поклонники напоминают появлявшуюся информацию о сетевой версии Metro, и явно найдутся отчаянные игроки, которые хотели бы увидеть Metro 2033 и Metro Last Light на PlayStation 5 и Xbox Series X|S.</p><p>Подождать остаётся совсем чуть-чуть</p>', '2022-04-07', '4', 12, 6),
(7, 'Удивительный и мрачный открытый мир FromSoftware -15 минут геймплея Elden Ring вместе со смертоносным боссом', 'hardc4SLK9i_qrH5gptkjw.png', '<p>Bandai Namco совместно с FromSoftware опубликовали долгожданный геймплей Elden Ring. В первые с момента анонса ролевого экшена можно увидеть целый 15 минут игрового процесса. Авторы показали взаимодействие с открытым миром, в котором можно самому решать самостоятельно куда идти и с кем сражаться. А вместе с этим и первое сражение с боссом — Годриком Золотым, полубогом.</p><p>В новом геймплейном ролике Elden Ring показали сражения верхом. Игрок может использовать разные атаки мечом и даже заклинания, не слезая со своей лошади. В бой можно будет вступать с разным подходом, используя скрытность или молниеносную атаку в лоб на противника. Уникальность боевой системы Elden Ring заключается в возможности одинаково эффективно использовать холодное оружие и магию.</p><p>В FromSoftware заметно поработали над улучшением оригинальных механик Dark Souls. В Elden Ring появиться полноценная сюжетная кампания, а вместе с ней и внятные дополнительные здания. Игровой процесс изначально подразумевает разнообразие большого мира и ландшафта, поэтому в игре будет реализован удобный прыжок и возможность исследовать локации разными способами в одиночку или в компании товарищей.</p><p>Игра позволит экспериментировать с навыками персонажа, можно будет скрытно устранять врагов и использовать преимущества ландшафта или стать мастером меча, полагаясь на различные боевые умения. В распоряжении игрока будет целый арсенал возможностей, которые включают уникальное оружие и мощную магию. Разработчики из FromSoftware гарантируют масштабный и бесшовный открытый мир.</p><p>Elden Ring обещает быть самым масштабным проектом от студии, которая подарила играм популярную серию хардкорных экшенов Dark Souls. Действия игры развернутся в вымышленном фэнтези мире — Междуземье, который был расколот развращенными полубогами и потомками местной королевы. Геймеров ждет полноценный открытый мир, множество персонажей и цельный сюжет, написанным Джорджем Р. Р. Мартином и Хидэтакой Миядзаки.</p><p>Напомним, сегодня состоялась <a href=\"https://www.playground.ru/elden_ring/news/blagodarya_utechke_stal_izvesten_sostav_kollektsionnogo_izdaniya_elden_ring-1151692\">утечка </a>коллекционного издания Elden Ring, куда входит уникальные фигурка и саундтрек.</p><p>Официальная дата выхода Elden Ring запланирована на 25 февраля 2022 года для ПК, PlayStation 4, PlayStation 5, Xbox One и Xbox Series X | S. Больше новостей по игре стоит ожидать после уже после технического тестирования, которое пройдет с 12 по 14 ноября.</p>', '2022-02-15', '1', 12, 7),
(8, 'Новый крупный патч для Cyberpunk 2077 может выйти уже летом', 'if_GFHYWHtOoJaeYwFlUIg.png', '<p>На фоне недавних <a href=\"https://www.playground.ru/cyberpunk_2077/news/cd_projekt_red_znaet_chto_nad_cyberpunk_2077_esche_predstoit_porabotat_posle_nedavnego_patcha-1191854\">вестей </a>из студии CD Projekt Red, в сети появились слухи о возможной дате выхода следующего крупного обновления для Cyberpunk 2077. Некоторые источники и аналитики утверждают, что разработчики готовят крупный патч для игры уже к середине лета.</p><p>Новое обновление по своему масштабу будет сопоставимо с переходом на <a href=\"https://www.playground.ru/cyberpunk_2077/news/zhivoj_ii_ispravlennye_perki_i_mnogoe_drugoe_glavnye_izmeneniya_v_samom_masshtabnom_patche_dlya_cyberpunk_2077-1179631\">версию 1.5</a>. Теперь изменения направлены на технические улучшения игры, а также добавление нового контента в виде небольших DLC.</p><p>Предположительно, о новом патче для Cyberpunk 2077 разработчики начнут говорить в июне. Не исключено, что студия CD Projekt Red посетит одно из летних игровых мероприятий, где анонсирует релиз обновления и полноценное расширение.</p><p>Напомним недавно инсайдер <a href=\"https://www.playground.ru/cyberpunk_2077/news/insajder_cyberpunk_2077_poluchit_dva_masshtabnyh_dopolneniya_blizhe_k_kontsu_goda-1189648\">намекал </a>на выход двух масштабных дополнений к игре. Разработчики пока подтвердили только работу над одним DLC.</p>', '2022-02-02', '1', 12, 8),
(9, 'Обновлённая дорожная карта для Sims 4 появится в следующем месяце', 'gr9nQP3Zp9Xq0Z37iedaLw.jpeg', '<p>Следующая дорожная карта выпуска контента для The Sims 4 будет опубликована командой разработчиков в мае. В прошлом дорожные карты рассказывали о предстоящих бесплатных и платных <i>DLC</i> для Sims 4, которые будут выпущены в ближайшие месяцы после анонса. С момента выхода в 2014 году для симулятора было выпущено более 30 расширений разного размера.</p><p>В The Sims 4 есть четыре разных размера DLC-контента: самые большие, Expansion Packs, обычно предлагают целые новые миры и большие концепции геймплея, в то время как Game Packs обычно представляют одну новую большую функцию. Существуют также Stuff Packs и Kits, которые предлагают небольшое количество предметов или одежды на определенную тему.</p><p>За последние несколько месяцев The Sims 4 также получила множество бесплатных обновлений контента, добавляющих такие вещи, как новые продукты питания и предметы одежды с помощью новой системы Sims Delivery Express. Дорожная карта Sims 4 была опубликована для игры в начале 2022 года, в ней были указаны два набора и один игровой пак, которые будут выпущены в первые три месяца года. Последний из этих релизов завершился выпуском набора \"Декор по максимуму\", который появился в конце марта. С тех пор команда Sims 4 еще не опубликовала новую дорожную карту на оставшуюся часть 2022 года.</p><p>В ответе пользователю Iron_Cgull в Twitter аккаунт The Sims сообщил, что следующая дорожная карта для игры выйдет в мае. Пользователь написал, что сейчас \"время дорожной карты\" и отметил аккаунт игры в Twitter, на что команда The Sims ловко ответила gif-изображением Джастина Тимберлейка, поющего \"it\'s gonna be MAY\" из песни NSYNC \"It\'s Gonna Be Me\". Никаких других намеков команда Sims не дала, оставив поклонников гадать, что может содержать следующий анонс.</p><p>Команда разработчиков Sims 4 намекнула на предстоящий большой релиз в последних загадочных сообщениях в сети, который может быть раскрыт после выхода следующей дорожной карты. Основываясь на волнении, вызванном твитами разработчиков, многие фанаты предположили, что в скором времени может быть выпущен полный пакет расширений.</p>', '2022-03-10', '4', 12, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `news_tags`
--

CREATE TABLE `news_tags` (
  `News_tag_ID` int NOT NULL,
  `News_tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `news_tags`
--

INSERT INTO `news_tags` (`News_tag_ID`, `News_tag`) VALUES
(1, 'Анонсы'),
(2, 'Обновления'),
(3, 'Индустрия'),
(4, 'Слухи'),
(5, 'Технологии');

-- --------------------------------------------------------

--
-- Структура таблицы `ratings`
--

CREATE TABLE `ratings` (
  `Rating_ID` int NOT NULL,
  `Game_ID` int NOT NULL,
  `User_ID` int NOT NULL,
  `User_rating` int NOT NULL,
  `Count_1` int NOT NULL,
  `Count_2` int NOT NULL,
  `Count_3` int NOT NULL,
  `Count_4` int NOT NULL,
  `Count_5` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `ratings`
--

INSERT INTO `ratings` (`Rating_ID`, `Game_ID`, `User_ID`, `User_rating`, `Count_1`, `Count_2`, `Count_3`, `Count_4`, `Count_5`) VALUES
(1, 1, 2, 5, 0, 0, 0, 0, 1),
(2, 2, 2, 5, 0, 0, 0, 0, 1),
(3, 3, 2, 3, 0, 0, 1, 0, 0),
(4, 1, 1, 3, 0, 0, 1, 0, 0),
(5, 1, 3, 1, 1, 0, 0, 0, 0),
(6, 3, 3, 5, 0, 0, 0, 0, 1),
(7, 5, 3, 3, 0, 0, 1, 0, 0),
(8, 4, 3, 5, 0, 0, 0, 0, 1),
(9, 7, 3, 4, 0, 0, 0, 1, 0),
(10, 6, 3, 5, 0, 0, 0, 0, 1),
(11, 9, 3, 3, 0, 0, 1, 0, 0),
(12, 8, 3, 3, 0, 0, 1, 0, 0),
(13, 4, 2, 5, 0, 0, 0, 0, 1),
(14, 5, 2, 4, 0, 0, 0, 1, 0),
(15, 6, 2, 5, 0, 0, 0, 0, 1),
(16, 7, 2, 3, 0, 0, 1, 0, 0),
(17, 8, 2, 2, 0, 1, 0, 0, 0),
(18, 9, 2, 4, 0, 0, 0, 1, 0),
(19, 2, 1, 4, 0, 0, 0, 1, 0),
(20, 3, 1, 3, 0, 0, 1, 0, 0),
(21, 4, 1, 4, 0, 0, 0, 1, 0),
(22, 5, 1, 4, 0, 0, 0, 1, 0),
(23, 6, 1, 5, 0, 0, 0, 0, 1),
(24, 7, 1, 2, 0, 1, 0, 0, 0),
(25, 8, 1, 1, 1, 0, 0, 0, 0),
(26, 9, 1, 2, 0, 1, 0, 0, 0),
(27, 55, 12, 4, 0, 0, 0, 1, 0),
(28, 56, 11, 4, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `User_ID` int NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`User_ID`, `Login`, `Password`, `Role`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
(2, 'pumaster', 'c81e728d9d4c2f636f067f89cc14862c', 'moder'),
(3, 'alex', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'user'),
(11, 'Pixel', '3c59dc048e8850243be8079a5c74d079', 'editor'),
(12, 'Santa', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'editor');

-- --------------------------------------------------------

--
-- Структура таблицы `users_screenshots`
--

CREATE TABLE `users_screenshots` (
  `Screenshot_ID` int NOT NULL,
  `Screenshot_url` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `User_ID` int NOT NULL,
  `Game_ID` int NOT NULL,
  `Archive` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users_screenshots`
--

INSERT INTO `users_screenshots` (`Screenshot_ID`, `Screenshot_url`, `User_ID`, `Game_ID`, `Archive`) VALUES
(1, '/media/games/Users_screenshots/1581465115_1655.jpg', 3, 1, 1),
(2, '/media/games/Users_screenshots/6ac2cfd075-2_1390x600.jpg', 3, 2, 1),
(3, '/media/games/Users_screenshots/SE8mAV3do.jpg', 3, 3, 1),
(4, '/media/games/Users_screenshots/c9ae895578eed1851b34aa994ccc3da5.jpg', 3, 4, 1),
(5, '/media/games/Users_screenshots/wu8wOujQ5FkNSQaFu02U2w.jpg', 2, 5, 1),
(6, '/media/games/Users_screenshots/MetroExodusScreenshot.jpg', 2, 6, 1),
(7, '/media/games/Users_screenshots/b2DusGxamyogKOktgEtbRw.jpg', 2, 7, 1),
(8, '/media/games/Users_screenshots/Cyberpunk2077.jpg', 2, 8, 1),
(9, '/media/games/Users_screenshots/23d000f97e8213ae4a71e9a1b5c2f691.jpg', 2, 9, 1),
(10, '/media/games/Users_screenshots/171237.jpg', 1, 1, 1),
(11, '/media/games/Users_screenshots/maxresdefault.jpg', 2, 1, 1),
(12, '/media/games/Users_screenshots/PlayStation-4-Santa-Monica-Studio-PlayStation-screen-shot-God-of-War-2018-God-of-War-1887159.jpg', 1, 1, 1),
(13, '/media/games/Users_screenshots/tjaebbqSkHROsAoyp-wiEA.jpg', 3, 1, 1),
(14, '/media/games/Users_screenshots/God-of-War-God-of-War-2018-video-games-2006271.jpg', 3, 1, 1),
(15, '/media/games/Users_screenshots/God-of-War-Kratos-video-games-God-of-War-2018-1386105.jpg', 2, 1, 1),
(16, '/media/games/Users_screenshots/FKIZUTXQM_VL6qkdxfZwyQ.jpg', 2, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comm_ID`);

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`Game_ID`);

--
-- Индексы таблицы `games_genres`
--
ALTER TABLE `games_genres`
  ADD PRIMARY KEY (`Genre_ID`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_ID`);

--
-- Индексы таблицы `news_tags`
--
ALTER TABLE `news_tags`
  ADD PRIMARY KEY (`News_tag_ID`);

--
-- Индексы таблицы `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`Rating_ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- Индексы таблицы `users_screenshots`
--
ALTER TABLE `users_screenshots`
  ADD PRIMARY KEY (`Screenshot_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `Comm_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `Game_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `games_genres`
--
ALTER TABLE `games_genres`
  MODIFY `Genre_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `News_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `news_tags`
--
ALTER TABLE `news_tags`
  MODIFY `News_tag_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `ratings`
--
ALTER TABLE `ratings`
  MODIFY `Rating_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users_screenshots`
--
ALTER TABLE `users_screenshots`
  MODIFY `Screenshot_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
