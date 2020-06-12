<?php

namespace App\Helpers;

class Functions {
    public static function getValidatorMessage($validator) {
        $message = "";
        foreach ($validator->messages()->all() as $item => $value) {
            $message .= $message == "" ? $value : "\n$value";
        }
        return $message;
    }

    public static function decimalToFraction($decimal)
    {
        if ($decimal < 0 || !is_numeric($decimal)) {
            // Negative digits need to be passed in as positive numbers
            // and prefixed as negative once the response is imploded.
            return false;
        }
        if ($decimal == 0) {
            return [0, 0];
        }

        $tolerance = 1.e-4;

        $numerator = 1;
        $h2 = 0;
        $denominator = 0;
        $k2 = 1;
        $b = 1 / $decimal;
        do {
            $b = 1 / $b;
            $a = floor($b);
            $aux = $numerator;
            $numerator = $a * $numerator + $h2;
            $h2 = $aux;
            $aux = $denominator;
            $denominator = $a * $denominator + $k2;
            $k2 = $aux;
            $b = $b - $a;
        } while (abs($decimal - $numerator / $denominator) > $decimal * $tolerance);

        return [
            $numerator,
            $denominator
        ];
    }
}