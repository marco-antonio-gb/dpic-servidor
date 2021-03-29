<?php

namespace Database\Seeders;

use App\Models\Pago;
use Illuminate\Database\Seeder;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materias_docente =
        [
        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211001','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211002','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211003','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211004','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211005','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211006','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211007','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211008','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211009','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 2,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211010','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 2,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211011','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 2,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211012','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 2,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211013','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 2,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211014','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 2,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211015','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 2,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211016','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 2,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211017','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 3,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211018','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 3,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211019','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 3,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211020','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 3,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211021','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 3,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211022','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 3,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211023','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 3,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211024','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 3,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211025','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 4,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211026','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 4,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211027','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 4,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211028','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 4,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211029','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 4,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211030','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 4,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211031','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 4,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211032','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 4,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211033','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 5,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211034','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 5,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211035','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 5,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211036','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 5,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211037','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 5,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211038','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 5,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211039','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 5,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211040','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 5,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211041','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 6,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211042','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 6,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211043','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 6,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211044','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 6,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211045','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 6,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211046','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 6,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211047','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 6,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211048','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 6,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211051','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 7,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211052','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 7,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211053','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 7,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211054','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 7,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211055','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 7,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211056','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 7,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211057','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 7,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211058','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 7,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211061','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 8,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211062','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 8,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211063','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 8,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211064','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 8,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211065','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 8,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211066','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 8,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211067','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 8,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211068','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 8,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211071','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 9,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211072','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 9,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211073','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 9,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211074','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 9,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211075','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 9,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211076','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 9,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211077','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 9,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211078','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 9,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211081','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 10,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211082','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 10,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211083','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 10,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211084','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 10,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211085','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 10,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211086','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 10,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211087','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 10,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211088','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 10,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211091','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 11,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211092','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 11,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211093','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 11,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211094','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 11,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211095','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 11,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211096','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 11,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211097','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 11,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211098','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 11,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211101','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 12,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211102','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211103','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 12,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211104','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 12,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211105','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 12,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211106','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 12,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211107','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 12,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211108','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 12,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211111','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 13,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211112','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211113','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 13,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211114','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 13,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211115','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 13,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211116','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 13,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211117','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 13,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211118','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 13,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211121','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 14,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211122','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211123','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 14,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211124','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 14,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211125','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 14,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211126','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 14,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211127','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 14,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211128','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 14,],

        ['item' => 'Matricula','costo_unitario' => '2500','boleta' => '20211131','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 15,],
        ['item' => 'Cuota Nro 1','costo_unitario' => '2500','boleta' => '20211132','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 1,],
        ['item' => 'Cuota Nro 2','costo_unitario' => '2500','boleta' => '20211133','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 15,],
        ['item' => 'Cuota Nro 3','costo_unitario' => '2500','boleta' => '20211134','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 15,],
        ['item' => 'Cuota Nro 4','costo_unitario' => '2500','boleta' => '20211135','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 15,],
        ['item' => 'Cuota Nro 5','costo_unitario' => '2500','boleta' => '20211136','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 15,],
        ['item' => 'Cuota Nro 6','costo_unitario' => '2500','boleta' => '20211137','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 15,],
        ['item' => 'Cuota Nro 7','costo_unitario' => '2500','boleta' => '20211138','fecha_cobro' => '2021-03-28 23:08:13','observacion' => 'ninguna','postgrado_id' => 1,'postgraduante_id' => 15,],
            
        ];
        foreach ($materias_docente as $asignacion) {
            Pago::create($asignacion);
        }
    }
}
