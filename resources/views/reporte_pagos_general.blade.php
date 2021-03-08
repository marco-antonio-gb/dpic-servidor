<?php
$postgrados = $postgrados; 
$datetime=date('d/m/Y h:i:s a');
$title_page="PAGOS - MAESTRIA EN ENERGIA RENOVABLE Y EFICIENCIA ENERGÉTICA";
$firma_docente="Dr. Ing. Roberto Del Barco Gamarra";
$cargo="DIRECTOR DPIC";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('/css/pdf_landscape.css') }}" media="all" />
    <title>Reporte de Calificaciones</title>
</head>
<body>
    <script type="text/php">
        if (isset($pdf)) {
            $text = "Página {PAGE_NUM} de {PAGE_COUNT}";
            $size = 8;
            $font = $fontMetrics->getFont("sans-serif",'italic');
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = ($pdf->get_width() - $width) - 20;
            $y = $pdf->get_height() - 27;
            $pdf->page_text($x, $y, $text, $font, $size);
            $text2 ="Fecha y Hora:".' '. date('d/m/Y h:i:s a');
            $width = $fontMetrics->get_text_width($text2, $font, $size) / 2;
            $x2 = ($pdf->get_width() - $width) - ($pdf->get_width()-115);
            $pdf->page_text($x2, $y, $text2, $font, $size);
            $x3 = ($pdf->get_width() - $width) /2;
            $text3 = "http://dpic.fni.edu.bo/";
            $pdf->page_text($x3, $y, $text3, $font, $size);
        }
    </script>
    <div >
        <table class="table-borderless mb-1">
            <tr class="mb-2">
                <td class="text-left">
                    <img src="{{ asset('/img/uto_logo.png') }}" alt="LOGO UTO" class="logo">
                </td>
                <td class="text-center">
                    <div class="title-container">
                            <p class="m-0">Universidad Técnica de Oruro</p>
                            <p class="m-0"> Facultad Nacional de Ingeniería</p>
                            <p class="m-0">Dirección de Postgrado e Investigación Científica (DPIC)</p>
                    </div>
                </td>
                <td class="text-right">
                    <img src="{{ asset('/img/fni_logo.png') }}" alt="LOGO UTO" class="logo">
                </td>
            </tr>
                <tr><td colspan="3"> <br> </td></tr>
            <tr >
                <td colspan="3" class="text-center "> 
                    <h1 class="titulo-pagina-land p-0 m-0">{{$title_page}}</h1>
                    <small>Reporte detallado de todos los pagos realizados en el desarrollo del programa de postgrado</small>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <!-- <br>
        <p class="p-0 m-0"><strong>ASIGNATURA: </strong> ENERGÍA, DESARROLLO Y SISTEMAS ELECTRICOS</p>
        <p class="m-0 p-0" style="margin-bottom: 5px !important"><strong>PROGRAMA DE POSTGRADO: </strong> MAESTRIA EN ENERGIA RENOVABLE Y EFICIENCIA ENERGÉTICA
        </p> -->
        <table class="small-table">
            <thead>
              <tr class="text-center ">
                <th width="15">Nro.</th>
                <th width="130">Nombre y Apellidos</th>
                <th>Matricula</th>
                <th>Boleta</th>
                <th>Fecha</th>
                <th>1erPago</th>
                <th>Boleta</th>
                <th>Fecha</th>
                <th>2doPago</th>
                <th>Boleta</th>
                <th>Fecha</th>
                <th>3erPago</th>
                <th>Boleta</th>
                <th>Fecha</th>
                <th>4erPago</th>
                <th>Boleta</th>
                <th>Fecha</th>
                <th>5erPago</th>
                <th>Boleta</th>
                <th>Fecha</th>
                <th>6erPago</th>
                <th>Boleta</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center ">1</td>
                <td>GUTIERREZ BELTRAN MARCO ANTONIO</td>
                <td class="text-center ">2500</td>
                <td class="text-center ">1280425</td>
                <td class="text-center ">2016-12-12</td>
                <td class="text-center ">2500</td>
                <td class="text-center ">1280425</td>
                <td class="text-center ">2016-12-12</td>
                <td class="text-center ">2500</td>
                <td class="text-center ">1280425</td>
                <td class="text-center ">2016-12-12</td>
                <td class="text-center ">2500</td>
                <td class="text-center ">1280425</td>
                <td class="text-center ">2016-12-12</td>
                <td class="text-center ">2500</td>
                <td class="text-center ">1280425</td>
                <td class="text-center ">2016-12-12</td>
                <td class="text-center ">2500</td>
                <td class="text-center ">1280425</td>
                <td class="text-center ">2016-12-12</td>
                <td class="text-center ">2500</td>
                <td class="text-center ">1280425</td>
                <td class="text-center ">2016-12-12</td>
              </tr>
            </tbody>
            </table>
            <small class="small-text">Los pagos son expresados en pesos Bolivianos (Bs.) </small>
            <div class="text-center mt-8"> 
              <hr class="new3">
            <strong>{{$firma_docente}}  <br> {{$cargo}}</strong>
            </div>
    </div>
</body>
</html>
