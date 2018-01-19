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
        $date_temp = date("d/m/Y", strtotime($date));

        return $date_temp;
    }

    public static function convertDateTime($dateTime){
        $dateTime_temp = date("d/m/Y à H\hi\ms\s", strtotime($dateTime));

        return $dateTime_temp;
    }

    public static function verifyForm($form){
        if (isset($form) && !empty($form))
            return TRUE;
        else
            return FALSE;
    }
}