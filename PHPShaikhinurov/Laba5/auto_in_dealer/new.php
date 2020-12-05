<html>
    <head> <title> Добавление нового автодилера </title> </head>
    <body>
        <H2>Добавление нового дилера</H2>
        <form action="save_new.php" method="get">
            id автомобиля: <input name="idauto" size="20" type="text">
            <br>id автодилера: <input name="iddealer" size="30" type="text">
            <br>Стоимость: <input name="price" size="30" type="text">
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p><button style='color: green' onclick="window.location.href='auto_in_dealer.php'">Вернуться к списку автомобилей в наличии</button></td></p>
    </body>
</html>