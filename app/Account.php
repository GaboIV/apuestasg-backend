<?php

namespace App;

use App\Bank;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	protected $with = ["bank"];
	
    const AHORRO = 'Ahorro';
    const CORRIENTE = 'Corriente';

    public static $types = [self::AHORRO, self::CORRIENTE];

    public function bank() {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
}
