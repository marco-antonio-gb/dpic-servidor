<?php
$titulo_pagina = 'Reporte personal de pagos';
$subtitulo_pagina = 'Reporte detallado de todos los pagos realizados por el postgraduante';


$postgraduante = $pagos_personal_pdf['postgraduante'];
$curso_postgrad = $pagos_personal_pdf['postgrado'];
$pagos = $pagos_personal_pdf['pagos'];
$firma_docente = 'Dr. Ing. Roberto Del Barco Gamarra';
$cargo = 'DIRECTOR DPIC';
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
            <tr>
                <td colspan="3"> <br> </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center ">
                    <h1 class="titulo-pagina p-0 m-0">{{ $titulo_pagina }}</h1>
                    <small>{{ $subtitulo_pagina }}</small>
                    {{-- <hr> --}}
                </td>
            </tr>
        </table>
    </div>
    <div>
        <br>
        <p class="p-0 m-0"><strong>POSTGRADUANTE: </strong> {{ $postgraduante }}</p>
        <p class="m-0 p-0" style="margin-bottom: 5px !important"><strong>PROGRAMA DE POSTGRADO: </strong>
            {{ $curso_postgrad }}
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
        <div class="text-center mt-8">
            <hr class="new3">
            <strong>{{ $firma_docente }} <br> {{ $cargo }}</strong>
        </div>
    </div>
</body>

</html>
