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

    public static function objArraySearch($array, $index, $value)
    {
        foreach ($array as $key => $arrayInf) {
            if (isset($arrayInf[$index]) && $arrayInf[$index] == $value) {
                return $arrayInf;
            }
        }

        return false;
    }

    public static function objArrayKeySearch($array, $index, $value)
    {
        foreach ($array as $key => $arrayInf) {
            if (isset($arrayInf[$index]) && $arrayInf[$index] == $value) {
                return $key;
            }
        }

        return false;
    }

    public static function parseFraction (string $fraction)
    {
        if(preg_match('#(\d+)\s+(\d+)/(\d+)#', $fraction, $m)) {
            return ($m[1] + $m[2] / $m[3]);
        } else if( preg_match('#(\d+)/(\d+)#', $fraction, $m) ) {
            return ($m[1] / $m[2]);
        }
        return (float) $fraction;
    }

    public static function resultThreeOptions ($team1, $team2)
    {
        $result = $team1 - $team2;

        if ($result == 0) {
            return 'X';
        } elseif ($result > 0) {
            return '1';
        } else {
            return '2';
        }
    }

    public static function resultTwoOptions ($team1, $team2)
    {
        $result = $team1 - $team2;

        if ($result == 0) {
            return '0';
        } elseif ($result > 0) {
            return '1';
        } else {
            return '2';
        }
    }

    public static function resultScoreBothOptions ($team1, $team2)
    {
        if ($team1 > 0 && $team2 > 0) {
            return "J";
        } else {
            return "N";
        }
    }
}