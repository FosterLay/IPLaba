<?php
    require('tfpdf/tfpdf.php');

    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $pdf = new tFPDF();
    $pdf->AddFont('PDFFont','','Classic.ttf');
    $pdf->SetFont('PDFFont','',12);
    $pdf->AddPage();

    $pdf->Cell(80);
    $pdf->Cell(30,10,'Автомобили',1,0,'C');
    $pdf->Ln(20);

    $pdf->SetFillColor(200,200,200);
    $pdf->SetFontSize(6);

    $header = array("№ п/п","Марка","Модель","Год выпуска","Трансмиссия","Стоимость","Название автосалона","Адрес");
    $w = array(6,30,25,25,25,20,20,25);
    $h = 10;
    for ($c = 0; $c < 8; $c++){
        $pdf->Cell($w[$c],$h,$header[$c],'LRTB','0','',true);
    }
    $pdf->Ln();

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
        LEFT JOIN autodealer ON auto_in_dealer.iddealer=autodealer.id"
    );

    if ($result){
        $counter = 1;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $pdf->Cell($w[0],$h,$counter,'LRBT','0','C',true);
            $pdf->Cell($w[1],$h,$row[0],'LRB');

            for ($c = 2; $c < 8; $c++){
                if ($c == 3){
                    $row[2] = date('d-m-Y' , strtotime($row[2]));
                }
                $pdf->Cell($w[$c],$h,$row[$c-1],'RB');
            }
            $pdf->Ln();
            $counter++;
        }
    }

    $pdf->Output("I",'Games.pdf',true);
?>