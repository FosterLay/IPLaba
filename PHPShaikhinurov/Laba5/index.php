<html>
    <head> <title> Сведения </title> </head>

    <h2> Управление БД </h2>
    <ul id="bd"> <!-- Собственные скрипты для просмотра и редактирования БД -->
        <li><a href="../BazaDanniyh/commander.php">Коммандер для БД</a>
        <li><a href="../BazaDanniyh/show_bd.php">Редактирование БД</a>
    </ul>

<!--

4. Автомобили (id, Марка, модель, год выпуска, трансмиссия, объем выпуска, стоимость)

4.1. Добавить таблицу Автосалоны (id, название, адрес) и возможность
добавлять/удалять/редактировать ее записи;

4.2. Добавить таблицу Автомобили в наличии (id, id автомобиля, id автосалона, стоимость)
и возможность добавлять/удалять/редактировать ее записи. Поля id автомобиля и id
автосалона являются внешними ключами. При этом у одного автосалона может быть
несколько автомобилей в наличии. И в таблице Автомобили в наличии может быть
несколько автомобилей одной марки и модели.

4.3. При удалении автомобиля удаляются все записи с ним из таблицы Автомобили в
наличии.

4.4. При удалении Автосалона удаляются все записи с ним из таблицы Автомобили в
наличии.

--> 

    <h2>Ссылки</h2>
    <ul id="nav"> <!-- Собственные скрипты для просмотра и редактирования БД -->
        <li><a href="automobiles/index.php">Автомобили</a>
        <li><a href="autodealer/autodealer.php"> Автодилер</a>
        <li><a href="auto_in_dealer/auto_in_dealer.php">Ключи игр</a>
    </ul>

    <button onclick="window.location.href='gen_pdf.php'">PDF-версия таблицы игр</button>
    <button onclick="window.location.href='gen_xls.php'">XML-версия таблицы игр</button>
</html>