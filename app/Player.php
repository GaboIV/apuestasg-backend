<?php

namespace App;

use App\Selection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Player extends Model
{
    use Notifiable;

    const FEMENINO = 'F';
    const MASCULINO = 'M';

    public static $genders = [self::FEMENINO, self::MASCULINO];

    const SENIOR = 'Sr.';
    const SENIORA = 'Sra.';
    const MISS = 'Srta.';
    const MISTER = 'Srto.';

    public static $treatments = [self::SENIOR, self::SENIORA, self::MISS, self::MISTER];

    protected $fillable = [
        'user_id', 'document_type', 'document_number', 'name', 'lastname', 'birthday', 'gender', 'state', 'city', 'parish', 'phone', 'available', 'risk', 'points', 'country', 'address', 'browser', 'ip', 'treatment'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setDoiTypeAttribute($value) {
        $this->attributes['document_number'] = strtoupper($value);
    }

    public function selections() {
        return $this->hasMany(Selection::class)
        ->where('ticket_id', null)
        ->with('game.competitors');
    }
}
