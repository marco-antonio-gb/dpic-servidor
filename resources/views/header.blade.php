<?php
$universidad = 'Universidad Técnica de Oruro';
$facultad = 'Facultad Nacional de Ingeniería';
$departamento = 'Dirección de Postgrado e Investigación Científica';
$logo_universidad = 'uto_logo.png';
$logo_facultad = 'fni_logo.png';
?>
<table class="table-borderless mb-1">
    <tr class="mb-2">
        <td class="text-left">
            <img src="{{ asset('/img/' . $logo_universidad) }}" alt="LOGO UTO" class="logo">
        </td>
        <td class="text-center">
            <div class="title-container">
                <p class="m-0">{{ $universidad }}</p>
                <p class="m-0">{{ $facultad }}</p>
                <p class="m-0">{{ $departamento }}</p>
            </div>
        </td>
        <td class="text-right">
            <img src="{{ asset('/img/' . $logo_facultad) }}" alt="LOGO UTO" class="logo">
        </td>
    </tr>
    <tr>
        <td colspan="3"> <br> </td>
    </tr>
    <tr>
        <td colspan="3" class="text-center ">
            <h1 class="titulo-pagina-land p-0 m-0"> {{ $titulo_pagina }} </h1>

            <small>{{ $subtitulo_pagina }}</small>
        </td>
    </tr>
</table>
