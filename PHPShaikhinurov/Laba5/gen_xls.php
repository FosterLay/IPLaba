<?php
    require_once('php_excel/Classes/PHPExcel.php');
    require_once('php_excel/Classes/PHPExcel/Writer/Excel2007.php');

    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
    if ($mysqli->connect_errno){
        echo "Не удалось подключиться к БД";
    }

    // Запрос на выборку сведений о пользователях
    $result = $mysqli->query("SELECT
        automobiles.Brand as Brand,
        automobiles.models as models,
        automobiles.date_release as date_release,
        automobiles.transmission as transmission,
        automobiles.price as price,
        autodealer.name as name,
        autodealer.mail as mail
        FROM auto_in_dealer
        LEFT JOIN automobiles ON auto_in_dealer.idauto=automobiles.id
        LEFT JOIN autodealer ON auto_in_dealer.iddealer=autodealer.id
    ");

    $xls = new PHPExcel();
    // Устанавливаем индекс активного листа
    $xls->setActiveSheetIndex(0);
    // Получаем активный лист
    $sheet = $xls->getActiveSheet();
    // Подписываем лист
    $sheet->setTitle('Автомобили');
    // Вставляем текст в ячейку A1
    $sheet->setCellValue("A1", 'Автомобили');
    $sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
    // Объединяем ячейки
    $sheet->mergeCells('A1:H1');
    // Выравнивание текста
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $c = 0;

    $header = array("№ п/п","Марка","Модель","Год выпуска","Трансмиссия","Стоимость","Название автосалона","Адрес");
    foreach ($header as $h){
        $sheet->setCellValueByColumnAndRow($c,2,$h);
        // Применяем выравнивание
        $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
        $c++;
    }

    if ($result){
        $r = 3;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $c = 0;

            $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
            $c++;

            foreach ($row as $cell){
                if ($c == 3){
                    $cell = date('d-m-Y' , strtotime($cell));
                }
                $sheet->setCellValueByColumnAndRow($c,$r,$cell);
                $c++;
            }
            $r++;
        }
    }

    header('Content-Type: application/xls');
    header('Content-Disposition: inline; filename=Automobiles.xls');
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');

    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('php://output');
?>