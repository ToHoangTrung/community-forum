<?php


namespace app\services;


class FunctionalService
{
    public final static function formatDisplayDatetime(string $datetimeStr){

        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $datetime = strtotime($datetimeStr);

        $inputYear = date('Y', $datetime);
        $inputMonth = date('m', $datetime);
        $inputDay = date('d', $datetime);
        $inputHour = date('H', $datetime);
        $inputMinute = date('i', $datetime);

        $currentDate = strtotime(date("Y-m-d H:i:s"));
        $today = date('d', $currentDate);
        $thisMonth = date('m', $currentDate);

        $formatDatetime = '';

        if(intval($inputDay) == intval($today) && $inputMonth == $thisMonth){
            $formatDatetime .= 'Hôm nay, lúc' . " " . $inputHour . ":" . $inputMinute;
        }else if(intval($today) - intval($inputDay) == 1 && $inputMonth == $thisMonth){
            $formatDatetime .= 'Hôm qua, lúc' . " " . $inputHour . ":" . $inputMinute;
        }else{
            $formatDatetime .= $inputDay . "/" .  $inputMonth . "/" . $inputYear;
        }

        return $formatDatetime;
    }
}