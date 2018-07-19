<?php
/**
 * Created by PhpStorm.
 * User: Chinos
 * Date: 15/07/2018
 * Time: 10:12 PM
 */

namespace App;


class util
{
   static function fecha()
    {
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d H:i:s');

        return $fecha;
    }

    static function fecha_ingles()
    {
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d H:i:s');

        return $fecha;
    }

    static function fecha_a_ingles($fecha)
    {
        $fecha = date("Y-m-d", strtotime($fecha));
        return $fecha;
    }

    static function fecha_a_espanol($fecha){
        $fecha = date("d-m-Y", strtotime($fecha));
        return $fecha;
    }
}