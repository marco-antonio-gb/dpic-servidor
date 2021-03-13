<?php
#info pagina
$titulo_pagina = 'REPORTE PERSONAL DE PAGOS';
$subtitulo_pagina = 'Reporte detallado de todos los pagos realizados por el postgraduante';

#variables reportes
$postgraduante = $pagos_personal_pdf['postgraduante'];
$curso_postgrado = $pagos_personal_pdf['postgrado'];
$pagos = $pagos_personal_pdf['pagos'];
 
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
        <p class="p-0 m-0"><strong>POSTGRADUANTE: </strong> {{ $postgraduante }}</p>
        <p class="m-0 p-0" style="margin-bottom: 5px !important"><strong>PROGRAMA DE POSTGRADO: </strong>
            {{ $curso_postgrado }}
        </p>
        
           

        <table>
            <thead>
                <tr class="text-center ">
                    <th width="15">NRO</th>
                    <th>ITEM</th>
                    <th>MONTO [Bs.]</th>
                    <th>Nro. BOLETA</th>
                    <th>FECHA DE PAGO</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($pagos as $key => $pago)
              <tr>
                  <td class="text-center">{{ ($key + 1)  }}</td>
                  <td class="text-center">{{ $pago->item }}</td>
                  <td class="text-center">{{ number_format($pago->costo_unitario, 2, '.', ',') }}</td>
                  <td class="text-center">{{ $pago->boleta }}</td>
                  <td class="text-center">{{ $pago->fecha_cobro }}</td>
                  {{-- <td class="text-right ">{{ number_format($pago->pre, 2, ',', '.') }}</td> --}}
              </tr>
              @endforeach
          </tbody>
        </table>
        <small class="small-text">Los pagos son expresados en pesos Bolivianos (Bs.) </small>
        @include('footer')
    </div>
</body>

</html>
