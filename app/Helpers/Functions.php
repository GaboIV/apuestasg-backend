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
}