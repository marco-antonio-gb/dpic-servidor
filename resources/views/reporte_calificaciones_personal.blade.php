<?php
$titulo_pagina="Reporte provisional de calificaciones";
$subtitulo_pagina="Reporte detallado de las calificaciones registradas durante el curso de postgrado";
$postgrados = $postgrados; 
$datetime=date('d/m/Y h:i:s a');
$postgraduante="MARCO ANTONIO GUTIERREZ BELTRAN";
$curso_postgrado="MAESTRIA EN ENERGIA RENOVABLE Y EFICIENCIA ENERGÉTICA";
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
    <link rel="stylesheet" href="{{ asset('/css/pdf.css') }}" media="all" />
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <title>Reporte de Calificaciones personales</title>
</head>
<body>
    <script type="text/php">
        if (isset($pdf)) {
            $text = "Página {PAGE_NUM} de {PAGE_COUNT}";
            $size = 8;
            $font = $fontMetrics->getFont("sans-serif",'italic');
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = ($pdf->get_width() - $width) - 20;
            $y = $pdf->get_height() - 40;
            $pdf->page_text($x, $y, $text, $font, $size);
            $text2 ="Fecha y Hora:".' '. date('d/m/Y h:i:s a');
            $width = $fontMetrics->get_text_width($text2, $font, $size) / 2;
            $x2 = ($pdf->get_width() - $width) - ($pdf->get_width()-115);
            $y2 = $pdf->get_height() - 40;
            $pdf->page_text($x2, $y2, $text2, $font, $size);
            $x3 = ($pdf->get_width() - $width) /2;
            $text3 = "http://dpic.fni.edu.bo/";
            $pdf->page_text($x3, $y, $text3, $font, $size);
        }
    </script>
    <div >
        <table class="table-borderless">
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
                    <h1 class="titulo-pagina p-0 m-0">{{$titulo_pagina}}</h1>
                    <small>{{$subtitulo_pagina}}</small>
                    {{-- <hr> --}}
                </td>
            </tr>
        </table>
    </div>
    <div>
        <br>
        <p class="p-0 m-0"><strong>POSTGRADUANTE: </strong> {{$postgraduante}}</p>
        <p class="m-0 p-0" style="margin-bottom: 5px !important"><strong>PROGRAMA DE POSTGRADO: </strong> {{$curso_postgrado}}
        </p>
        <table>
            <thead>
              <tr class="text-center ">
                <th width="15">NRO</th>
                <th>NOMBRES ASIGNATURA</th>
                <th width="50">NOTA FINAL</th>
                <th width="120">CALIFICACION LITERAL</th>
                <th width="35">OBSERVACION</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center ">1</td>
                <td>ESTADÍSTICA APLICADA</td>
                <td class="text-center ">65</td>
                <td class="text-center ">SESENTA Y CINCO</td>
                <td class="text-center ">REPROBADO</td>
              </tr>
              <tr>
                <td class="text-center ">2</td>
                <td>INVESTIGACIÓN DE OPERACIONES</td>
                <td class="text-center ">65</td>
                <td class="text-center ">SESENTA Y CINCO</td>
                <td class="text-center ">REPROBADO</td>
              </tr>
              <tr>
                <td class="text-center ">3</td>
                <td>FUNDAMENTOS DE ORGANIZACIÓN Y MÉTODOS</td>
                <td class="text-center ">65</td>
                <td class="text-center ">SESENTA Y CINCO</td>
                <td class="text-center ">REPROBADO</td>
              </tr>
              <tr>
                <td class="text-center ">4</td>
                <td>INGENIERÍA DE MÉTODOS Y PRODUCTIVIDAD</td>
                <td class="text-center ">65</td>
                <td class="text-center ">SESENTA Y CINCO</td>
                <td class="text-center ">REPROBADO</td>
              </tr>
              <tr>
                <td class="text-center ">5</td>
                <td>SISTEMAS DE CALIDAD Y PRODUCCIÓN ESBELTA</td>
                <td class="text-center ">65</td>
                <td class="text-center ">SESENTA Y CINCO</td>
                <td class="text-center ">REPROBADO</td>
              </tr>
              <tr>
                <td class="text-center ">6</td>
                <td>SISTEMAS DE PRODUCCIÓN Y OPERACIONES</td>
                <td class="text-center ">65</td>
                <td class="text-center ">SESENTA Y CINCO</td>
                <td class="text-center ">REPROBADO</td>
              </tr>
              <tr>
                <td class="text-center ">7</td>
                <td>SISTEMAS DE PRODUCCIÓN Y OPERACIONES</td>
                <td class="text-center ">65</td>
                <td class="text-center ">SESENTA Y CINCO</td>
                <td class="text-center ">REPROBADO</td>
              </tr>
              <tr>
                <td class="text-center ">8</td>
                <td>METODOLOGÍA DE LA INVESTIGACIÓN</td>
                <td class="text-center ">65</td>
                <td class="text-center ">SESENTA Y CINCO</td>
                <td class="text-center ">REPROBADO</td>
              </tr>
              <tr>
                <td class="text-center ">9</td>
                <td>LOGÍSTICA INTEGRADA</td>
                <td class="text-center ">65</td>
                <td class="text-center ">SESENTA Y CINCO</td>
                <td class="text-center ">REPROBADO</td>
              </tr>
            </tbody>
            </table>
            <div class="text-center mt-8"> 
              <hr class="new3">
            <strong>{{$firma_docente}}  <br> {{$cargo}}</strong>
            </div>
    </div>
</body>
</html>
