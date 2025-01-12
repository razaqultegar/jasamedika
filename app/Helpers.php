<?php

if (!function_exists('currency_formates')) {
    function currency_formates($nominal)
    {
        $result = "Rp" . number_format($nominal, 0, ',', '.');
        return $result;
    }
}

if (!function_exists('initial_formates')) {
    function initial_formates($name)
    {
        $words = explode(' ', $name);
        $result = '';

        foreach ($words as $word) {
            $result .= strtoupper(substr($word, 0, 1));
        }

        return $result;
    }
}
