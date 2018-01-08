<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 22/12/2017
 * Time: 16:19
 */

class helper
{
    public static function convertDate($date){
        $formatter = new IntlDateFormatter('fr_FR',IntlDateFormatter::LONG,
            IntlDateFormatter::NONE,
            'Europe/Paris',
            IntlDateFormatter::GREGORIAN );

        $date_temp = new DateTime($date);

        $date_converted = $formatter->format($date_temp);

        return $date_converted;

        //$date_temp = new DateTime($date);
        /*$date_temp=date_create($date);
        date_format($date_temp,'d/m/Y à H\hi\m\i\n\u\t\e\s');

        return $date_temp;*/
    }
}