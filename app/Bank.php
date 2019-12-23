<?php

namespace App;

use App\Account;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model {
    public function account() {
        return $this->hasOne(Account::class, 'bank_id', 'id');
    }
}
