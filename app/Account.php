<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    const AHORRO = 'Ahorro';
    const CORRIENTE = 'Corriente';

    public static $types = [self::AHORRO, self::CORRIENTE];
}
