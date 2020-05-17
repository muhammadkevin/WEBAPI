<?php

namespace App\ClassTambahan;

class Layout
{

    public static function bulan($param)
    {
    	$bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );

    	$split = explode("-", $param);

    	return $split[0] .' '. $bulan[$split[1]] .' '. $split[2];
    }
}
