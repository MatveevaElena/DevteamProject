-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2020 г., 12:26
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `Text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `PersonID` int(11) NOT NULL,
  `NewsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `like_comment`
--

CREATE TABLE `like_comment` (
  `ID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `like_news`
--

CREATE TABLE `like_news` (
  `ID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL,
  `NewsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `like_news`
--

INSERT INTO `like_news` (`ID`, `PersonID`, `NewsID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 3, 2),
(6, 1, 2),
(7, 2, 2),
(8, 6, 2),
(9, 7, 2),
(10, 8, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `Authors` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Views` int(11) DEFAULT NULL,
  `Title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Main` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='a one news';

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`ID`, `Date`, `Authors`, `Img`, `Views`, `Title`, `Description`, `Main`) VALUES
(1, '2020-05-22 00:00:00', 'СамГТУ', '1', 42, 'Открыт прием заявок на конкурс «Ты - инноватор»', 'Регистрация участников продлится до 28 мая', 'Министерство образования и науки Самарской области проводит региональный отборочный этап II Всероссийского конкурса «Ты – инноватор». Цель соревнований – вовлечение молодежи в научную, научно-техническую и инновационную деятельность.'),
(2, '2020-05-21 00:00:00', 'СамГТУ', '1', 22, 'Опорный вуз проводит карьерный мастер-класс для студентов', 'Об особенностях трудоустройства участникам расскажет Ирина Святицкая', '27 мая управление по работе с индустриальными партнерами опорного университета организует мастер-класс «Рынок труда молодых специалистов. Тренды и вызовы». В роли спикера вновь выступит Ирина Святицкая, эксперт по вопросам трудоустройства и построения карьеры молодых специалистов, руководитель молодежного направления hh.ru. Встреча со студентами пройдет в рамках XI Всероссийского Кадрового форума им. А.Я. Кибанова в форме вебинара и начнется в 16:00 на платформе ZOOM.'),
(3, '2020-05-19 00:00:00', 'СамГТУ', '1', 36, 'Политеховцы стали победителями олимпиады «Я - профессионал»', 'Дипломами отмечены четверо студентов опорного университета', 'Подведены итоги Всероссийской олимпиады студентов «Я – профессионал» – масштабных образовательных соревнований нового формата для студентов разных специальностей, где проверяется не абстрактная эрудиция, а профессиональные знания. В этом году дипломантами стали свыше 3758 студентов из 70 регионов России. В число лауреатов вошли и представители Самарского политеха.'),
(4, '2020-05-18 00:00:00', 'СамГТУ', '1', 47, 'Химики опорного вуза разработали «вечные» материалы', 'Они поглощают углекислый газ и канцерогены', 'Совместно с китайскими и итальянскими коллегами ученые Политеха разработали три ранее неизвестных материала для улавливания из воздуха углекислого газа и вызывающих рак ароматических веществ. Поглотители CO2 используются в промышленности и играют большую роль в современной экологии. Созданный химиками материал показал рекордную сложность межмолекулярного плетения, а также высокий уровень гибкости и эффективности. Кроме того, поглотитель можно растворить и кристаллизировать заново бесконечное количество раз без потери эффективности. Исследования поддержаны грантом Президентской программы исследовательских проектов Российского научного фонда (РНФ). – Наша научная группа синтезировала три вариации фильтра изодной и той же 4,4\',4\'\'-(1,3,5-триазин-2,4,6-триил)-трибензойной кислоты (H3TATB) плоского треугольного строения. Мы использовали в качестве растворителей для кристаллизации изопропиловый и этиловый спирты, а также воду. Именно в этих веществах мы увидели наибольший потенциал для улавливания углекислого газа и летучих ароматических веществ, – рассказывает руководитель проекта по гранту РНФ, заведующий лабораторией синтеза новых кристаллических материалов Политеха Евгений Александров. – Отличительной чертой нашего сорбента стала волнистая структура. Нам удалось стабилизировать сборку микроскопических частиц в условиях повышенных температур и давления. Также важным нововведением считаем то, что мы смогли повысить количество межмолекулярных взаимодействий и устойчивость материалов. Все благодаря увеличению их молекулярной плотности за счет повышения сложности плетения сеток водородных связей между молекулами. Главным преимуществом разработки самарских ученых стала ее доступность и способность к абсолютной регенерации (возобновлению) этого материала: фильтр можно растворить и кристаллизировать заново бесконечное количество раз, обновляя работоспособность сорбента. В ходе анализа материала выяснилось, что по сложности плетения молекулярных «сеток» и адсорбционным параметрам изобретенные учеными поглотители являются лучшими в мире: несмотря на то, что фильтр оказался не самым емким из существующих, его высокая стабильность в воде и других растворителях, способность к поглощению большого количества паров бензола и регенерации – это отличные нововведения. В будущем исследование ученых поможет найти наиболее рациональный материал для очистки воздуха от углекислого газа и канцерогенных ароматических веществ.');

-- --------------------------------------------------------

--
-- Структура таблицы `news_person_link`
--

CREATE TABLE `news_person_link` (
  `ID` int(11) NOT NULL,
  `NewsID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='authors';

-- --------------------------------------------------------

--
-- Структура таблицы `news_tag_link`
--

CREATE TABLE `news_tag_link` (
  `ID` int(11) NOT NULL,
  `NewsID` int(11) NOT NULL,
  `TagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='relations: tag - news';

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `like_comment`
--
ALTER TABLE `like_comment`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `like_news`
--
ALTER TABLE `like_news`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `news_person_link`
--
ALTER TABLE `news_person_link`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `news_tag_link`
--
ALTER TABLE `news_tag_link`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `like_comment`
--
ALTER TABLE `like_comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `like_news`
--
ALTER TABLE `like_news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `news_person_link`
--
ALTER TABLE `news_person_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news_tag_link`
--
ALTER TABLE `news_tag_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
