<?php
if (!function_exists('format_money')) {
    /**
        * Check exist image and return image
        *
        * @param $money
        * @param $decimal
        * @return string
        *
        * */
    function format_money($money)
    {
        $money = number_format($money, 2, '.', ',');
        return strpos($money,'.')!==false ? rtrim(rtrim($money,'0'),'.') : $money;
    }
}

