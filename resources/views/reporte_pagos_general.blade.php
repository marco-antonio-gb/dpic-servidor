<?php
 #info pagina
$curso_postgrado = $pagos_general_pdf['postgrado'];
$titulo_pagina = $curso_postgrado;
$subtitulo_pagina="Reporte detallado de todos los pagos realizados en el desarrollo del programa de postgrado";
#variables reportes
$pagos = $pagos_general_pdf['pagos_postgrado'];
$cantidad_pagos = $pagos_general_pdf['cantidad_pagos'];

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
    <div>
        @include('header')
        
    </div>
    <div>
        <table class="small-table" style="width: 100%;">
            <thead>
                <tr class="text-center ">
                    <th >Nro.</th>
                    <th >Nombres</th>
                    @for ($i = 0; $i < $cantidad_pagos-1; $i++)
                        @if ($i == 0) <th>Matricula</th>
                    @else
                        <th >{{ $i }}:Pago</th> @endif
                        <th >Boleta</th>

                        <th >Fecha</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
              @foreach ($pagos as $key => $pago)
              <tr>
                  <td class="text-center">{{ ($key + 1)  }}</td>
                  <td style="width: auto">{{ $pago->postgraduante }}</td>
                  @foreach ($pago->pagos as $item)
                    <td class="text-center">{{ number_format($item->costo_unitario, 2, '.', ',') }}</td>
                    <td class="text-center">{{ $item->boleta }}</td>
                    <td class="text-center">{{ $item->fecha_cobro }}</td>
                  @endforeach
              </tr>
              @endforeach
          </tbody>
        </table>
        <small class="small-text">Los pagos son expresados en pesos Bolivianos (Bs.) </small>
        
        @include('footer')
    </div>
</body>

</html>
