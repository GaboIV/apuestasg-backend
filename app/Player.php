<?php

namespace App;

use App\Ticket;
use App\Selection;
use App\Transaction;
use App\Events\PlayerCreated;
use App\Events\PlayerUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Player extends Model {
    use Notifiable;

    protected $appends = ['risk', 'total'];

    const FEMENINO = 'F';
    const MASCULINO = 'M';

    public static $genders = [self::FEMENINO, self::MASCULINO];

    const SENIOR = 'Sr.';
    const SENIORA = 'Sra.';
    const MISS = 'Srta.';
    const MISTER = 'Srto.';

    public static $treatments = [self::SENIOR, self::SENIORA, self::MISS, self::MISTER];

    protected $fillable = [
        'user_id', 
        'document_type', 
        'document_number', 
        'name', 
        'lastname', 
        'birthday', 
        'gender', 
        'city', 
        'parish', 
        'phone', 
        'available', 
        'risk', 
        'points', 
        'country_id', 
        'state_id',
        'city_id',
        'parish_id',
        'address', 
        'browser', 
        'timezone',
        'format_quot',
        'language_id',
        'ip', 
        'treatment'
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

    public function tickets() {
        return $this->hasMany(Ticket::class)
        ->orderBy('created_at', 'desc')
        ->with('selections');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class)
        ->orderBy('created_at', 'desc');
    }

    public function getRiskAttribute() { 
        return Ticket::wherePlayerId($this->id)
        ->whereStatus(0)
        ->sum('amount');
    }

    public function getTotalAttribute() { 
        return $this->risk + $this->available;
    }

    /**
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        "created" => PlayerCreated::class,
        "updated" => PlayerUpdated::class
    ];
}
