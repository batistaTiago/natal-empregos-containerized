<?php



if (!function_exists('realMoney')) {
    function realMoney($value)
    {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}
