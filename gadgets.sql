-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 03 2018 г., 21:20
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gadgets`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `short_description`, `description`, `image`, `category_id`, `user_id`, `created_at`) VALUES
(1, 'Made in Ukraine: гаджети, які вас здивують', '<p>Енергоефективні жалюзі, особистий лікар, генератор снів і ключ від усіх дверей</p>', '<p>Мало хто знає, що українські гаджети не закінчуються на Petcube і Branto. Наші розробники на початку 2017 року представили масу цікавих технологічних новинок на CES і досі продовжують дивувати своїми стартапами. У цій збірці ви дізнаєтеся про жалюзі з сонячними батареями, ключі від усіх замків і паролів, масці, що дозволяє говорити конфіденційно, генераторі усвідомлених сновидінь і інших не менш цікавих винаходи, які чекають своєї години</p>', 'post-image/5a3fc16a605c5.jpg', 3, 3, '2017-12-15 17:45:01'),
(2, 'Apple зізналася, що спеціально уповільнює роботу старих айфонів', '<p>Американський ТехноГігант пояснив це \"турботою про користувачів\"</p>', '<p>Apple відповіла на звинувачення в заниженні швидкості роботи старих айфонів. Компанія визнала, що навмисно знижує тактову частоту процесорів. Про це Apple розповіла у відповідь на запит видання TechCrunch.</p>\r\n<p>У компанії пояснили, що мета Apple - надавати користувачам \"кращий досвід, включаючи високу продуктивність і довгий термін служби їх пристроїв\". Заниження швидкості процесорів пояснили природою літій-іонних акумуляторів, які дуже недовговічні і погано переносять високі і низькі температури.</p>\r\n<p>\"Літій-іонні батареї різко втрачають ємність в холодних умовах і з часом гірше зберігають заряд, через що пристрої могли несподівано виключатися для захисту електронних компонентів. У минулому році ми додали цю функцію (зниження частоти процесора) для iPhone 6, iPhone 6s і iPhone SE, щоб запобігти мимовільні відключення. найближчим часом вона з\'явиться і на iPhone 7 з виходом оновлення iOS 11.2. \", - говориться в листі.</p>\r\n<p>Також представники Apple повідомили про плани додати функцію в інші продукти компанії в майбутньому.</p>\r\n<p>Як зазначив редактор TechCrunch Метью Панзаріно, такою ціною Apple збільшує термін служби батарей в айфонах: смартфон обмежує активність процесора, щоб йому не потрібен був серйозний заряд енергії. При цьому в більшості випадків зниження тактової частоти чіпа залишиться для користувачів непомітним, так як це в більшій мірі стосується завдань, для яких потрібні серйозні обчислювальні ресурси.</p>\r\n<p>11 грудня на Reddit помітили, що старі айфони починають швидше працювати після заміни батареї. Користувач майданчика з ніком TeckFire перевірив одну і ту ж модель смартфона зі старим акумулятором і з новим в синтетичних тестах і прийшов до висновку, що Apple штучно занижує швидкість роботи старих пристроїв. Він відразу зазначив, що компанія робить це не просто так, а щоб айфон тримав заряд акумулятора протягом усього дня.</p>\r\n<p>У лютому 2017 року західні ЗМІ звернули увагу на оновлення iOS 10.2.1, яке усувало мимовільні відключення iPhone 6s. Однак Apple тоді не розповіла, що проблему вирішують за допомогою заниження швидкості роботи процесорів.</p>', 'post-image/5a3fb1e6a71ed.jpg', 2, 2, '2017-12-21 16:06:24'),
(3, 'До 2020 року Китай запустить масове виробництво домашніх роботів', '<p>Китай планує до 2020 року налагодити масове виробництво</p>', '<p>Китай планує до 2020 року налагодити масове виробництво і застосування домашніх роботів.<br />Згідно з планами Міністерства промисловості і інформатизації Китаю, до 2020 року має бути налагоджено масове виробництво і застосування роботів для домашнього обслуговування, а також випуск зразків роботів для лікування, реабілітації та допомоги людям похилого віку і людям з обмеженими можливостями.<br />У розробці домашніх роботів упор буде зроблений на такі ключові технології, як інтерактивність, інтелектуальні операції, взаємодія декількох роботів, а також на підвищенні інтелектуального рівня роботів, створених для прибирання, допомоги літнім людям, реабілітації хворих, допомоги людям з обмеженими можливостями, навчання дітей.<br />Також планується просувати інтегроване застосування \"розумної\" продукції в області промисловості, охорони здоров\'я, транспорту, сільського господарства і в інших сферах.</p>', 'post-image/5a3faf3397dae.jpg', 4, 1, '2017-12-24 13:44:19'),
(4, 'Adidas закриває провадження спорт-гаджетів', '<p>У компанії говорять, що таке рішення прийнято через непопулярність даних пристроїв</p>', '<p>Компанія Adidas офіційно заявила про вихід з бізнесу з випуску носяться електронних пристроїв для занять спортом. Раніше компанія вже відмовилася від розробки нових апаратних рішень, а тепер і зовсім припиняє їх виробництво. Про це повідомляє The Verge.</p>\r\n<p>Відмовившись від випуску апаратних рішень, Adidas зосередить зусилля на розробці програмного забезпечення. Зокрема мова йде про додатки Adidas App та Runtastic. Останнє було куплено компанією в 2015 році.</p>\r\n<p>Раніше Adidas випустила кілька фітнес-трекерів під торговою маркою miCoach, а також \"розумні\" годинник для спортсменів miCoach Smart Run. Але судячи з усього, ці пристрої не користувалися високим попитом у споживачів.</p>\r\n<p>Разом з тим бренд Adidas все ж залишиться на ринку переносної електроніки. Компанія вже заявила про намір укласти партнерську угоду з Fitbit, завдяки чому в 2018 році на ринок планується вивести спеціальну версію \"розумних\" годин Ionic Adidas edition.</p>\r\n<p>Варто відзначити, що таке рішення Adidas, судячи з усього, прийняла не спонтанно. У минулому році Стейсі Барр, віце-президент по переносної спортивної електроніці, заявила сайту Wearable, що \"якийсь час ми не побачимо нових бігових годин від Adidas\".</p>\r\n<p>Кілька років тому схожим чином поступила Nike. У неї були аналогічні носяться пристрої під назвою Fuelband, які, як і miCoach, чекав провал. Після цього американський виробник звернув в бік програмного забезпечення і почав співпрацювати з компаніями на кшталт Apple. Остання тепер випускає версію Apple Watch під брендом Nike.</p>\r\n<p>Як і Nike, Adidas не припиняє працювати з пристроями цілком і повністю. Зокрема компанія вже оголосила про те, що разом з Fitbit в 2018 році випустить власну версію \"розумних\" годин Ionic.&nbsp;</p>', 'post-image/5a3fb2cc23509.jpg', 3, 2, '2017-12-24 13:57:52'),
(5, '\"Укроборонпром\" представив 3D локатор для системи ППО', '<p>Локатор може одночасно відстежувати до 500 цілей на висоті до 40 км</p>', '<p>КП НПК Іскра, яка входить до складу Укроборонпрому, представила 3D оглядового локатор 80К6Т, який може відстежувати до 500 цілей одночасно. Його завдання - видача цілевказівок засобів ППО. Про це повідомляє прес-служба Укроборонпрому.</p>\r\n<p>\"Державний концерн\" Укроборонпром \"готує до випробувань 3D-радар 80К6Т. Цей радар може виявляти об\'єкти в повітрі на відстані до 500 км, оновлюючи дані кожні 5 секунд, і супроводжувати цілі з високою роздільною здатністю\", - написав Президент України Петро Порошенко на сторінці в Facebook.</p>\r\n<p>Він зазначив, що можливості радара дозволяють використовувати його з усіма зенітно-ракетними комплексами, які є на озброєнні Збройних сил України, і як інформаційне ланка в підрозділах Повітряних сил України.</p>\r\n<p>У свою чергу держконцерн \"Укроборонпром\" на сторінці в Facebook наводить дані про параметри цього оглядового локатора. Так, в основі конструкції радара - твердотільні модулі. Він призначений для видачі цілевказівок засобів ППО.</p>\r\n<p>\"Головною особливістю 80К6Т стала цифрова фазированная активна решітка. Ця технологія дозволяє виявляти і супроводжувати цілі з високою роздільною здатністю. При цьому, завдяки лише одній станції виконується одночасне вимірювання положення цілі відразу за трьома координатами: дальності, азимуту і висоті\", - інформує держконцерн.</p>\r\n<p>Можливості 80К6Т дозволяють виявляти повітряні об\'єкти на відстані до 500 км, на висоті до 40 км. Одночасно радар може відстежувати до 500 цілей. Ця радіолокаційна станція може працювати при значному протидії засобів радіоелектронної боротьби противника. Завдяки цьому оператори 80К6Т можуть безперешкодно \"бачити\" повітряний простір.</p>\r\n<p>За 1 хвилину радар робить до 12 оборотів, що забезпечує оновлення даних про цілі кожні 5 секунд, а велика зона огляду по куту місця (до 70 градусів) дозволяє виявляти тактичні і оперативно-тактичні ракети. Крім того, спеціальна система обробки сигналів дозволяє виявляти малорозмірні і крилаті ракети, які йдуть на малих висотах з огибанием рельєфу.</p>', 'post-image/5a3fb59c988da.jpg', 5, 1, '2017-12-24 14:11:40');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `created_at`) VALUES
(2, 'Інше', 'post-image/5a3fb45b11efa.jpg', '2017-12-01 20:15:52'),
(3, 'Події', 'post-image/5a3fb49809059.jpg', '2017-12-12 14:16:01'),
(4, 'Новини', 'post-image/5a3fb487db3ee.jpg', '2017-12-14 19:29:42'),
(5, 'Роботи', 'post-image/5a3fb4edad4dd.jpg', '2017-12-14 19:08:11');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `recognize_schema` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `up_vote` int(11) DEFAULT NULL,
  `down_vote` int(11) DEFAULT NULL,
  `status` smallint(4) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `recognize_schema`, `parent_id`, `post_id`, `username`, `email`, `comment`, `up_vote`, `down_vote`, `status`, `created_at`, `updated_at`) VALUES
(1, '/web/site/single', 0, 5, 'Имя', 'mail@gmail.com', 'Коммент!!!', NULL, NULL, 0, 1514137721, 1514137721);

-- --------------------------------------------------------

--
-- Структура таблицы `markArticle`
--

CREATE TABLE `markArticle` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `markArticle`
--

INSERT INTO `markArticle` (`post_id`, `tag_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(1, 2),
(3, 7),
(5, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `marks`
--

INSERT INTO `marks` (`id`, `name`) VALUES
(1, 'Пристрої'),
(2, 'Прилади'),
(3, 'Програми'),
(4, 'Телефони'),
(5, 'ПК'),
(6, 'Ноутбуки'),
(7, 'Роботи');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) DEFAULT '10',
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `status`, `password_hash`, `created_at`) VALUES
(1, 'В`ячеслав', 'Лісаченко', 'slavasumyua@gmail.com', 10, '$2y$13$sR.fELVyT2PrZdN3zNgY.e3o3TqoXyUTikioIFgLBIZ47pi1AeR9m', '2017-12-11 17:21:11'),
(2, 'Крістіна', 'Жемаєва', 'zhemaichik@ukr.net', 11, '$2y$13$sR.fELVyT2PrZdN3zNgY.e3o3TqoXyUTikioIFgLBIZ47pi1AeR9m', '2017-12-11 18:08:42'),
(3, 'Атрем', 'Нестеров', 'timewarrior@gmail.com', 12, '$2y$13$sR.fELVyT2PrZdN3zNgY.e3o3TqoXyUTikioIFgLBIZ47pi1AeR9m', '2017-12-11 18:09:48');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_ibfk_1` (`user_id`),
  ADD KEY `post_ibfk_2` (`category_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_ibfk_1` (`post_id`);

--
-- Индексы таблицы `markArticle`
--
ALTER TABLE `markArticle`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Индексы таблицы `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `markArticle`
--
ALTER TABLE `markArticle`
  ADD CONSTRAINT `markarticle_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `markarticle_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `marks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
