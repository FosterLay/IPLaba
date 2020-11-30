<html>
    <head> <title> Добавление нового автомобиля </title> </head>
    <body>
        <H2>Добавление нового автомобиля:</H2>
        <form action="save_new_elements.php" method="get">
            Марка: <input name="Brand" size="50" type="text">
            <br>Модель: <input name="models" size="20" type="text">
            <br>Год выпуска: <input name="date_release" size="20" type="date">
            <br>Трансимиссия: <input name="transmission" size="30" type="text">
            <br>Объём выпуска: <input name="release_amount" size="30" type="text">
            <br>Стоимость: <input name="price" size="30" type="text">
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <button style='color: green' onclick="window.location.href='index.php'">Вернуться к списку автомобилей</button></td>
    </body>
</html>