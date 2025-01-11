<?php

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
