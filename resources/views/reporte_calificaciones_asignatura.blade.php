<?php
#info pagina
$titulo_pagina = 'REPORTE DE CALIFICACIONES';
$subtitulo_pagina = 'Reporte detallado de calificaciones en la asignatura del curso de postgrado';
#Variables reportes
$asignatura_nombre = $calificaciones_asignatura_pdf['materia']['nombre'];
$asignatura_sigla = $calificaciones_asignatura_pdf['materia']['sigla'];
$curso_postgrado = $calificaciones_asignatura_pdf['postgrado'];
$docente = $calificaciones_asignatura_pdf['docente'];
$calificaciones = $calificaciones_asignatura_pdf['calificaciones'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('/css/pdf.css') }}" media="all" />
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
    <div>
        @include('header')

    </div>
    <div>
        <br>
        <p class="p-0 m-0"><strong>ASIGNATURA: </strong> {{ $asignatura_nombre }}</p>
        <p class="m-0 p-0" style="margin-bottom: 5px !important"><strong>PROGRAMA DE POSTGRADO: </strong>
            {{ $curso_postgrado }}
        </p>
        <table class="table-report">
            <thead class="head-style">
                <tr class="text-center ">
                    <th width="15">NRO</th>
                    <th>NOMBRE COMPLETO</th>
                    <th width="50">NOTA FINAL</th>
                    <th width="150">CALIFICACION LITERAL</th>
                    <th width="40">OBSERVACION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calificaciones as $key => $nota)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td >{{ $nota->full_name }}</td>
                        <td  class="text-center">{{ $nota->nota_numerica }}</td>
                        <td >{{ $nota->nota_literal }}</td>
                        <td >
                          @if ($nota->nota_numerica <75)
                              <span>REPROBADO</span>
                          @else
                          <span>APROBADO</span>
                          @endif
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('footer')

    </div>
</body>

</html>
