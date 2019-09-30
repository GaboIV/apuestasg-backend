<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Horse extends Model
{
    use Notifiable; 
    
    const FEMENINO = 'F';
    const MASCULINO = 'M';

    public static $sexs = [self::FEMENINO, self::MASCULINO];

    const BREED1 = 'C';
    const BREED2 = 'N';

    public static $breeds = [self::BREED1, self::BREED2];

    protected $fillable = [
        
    ];
}
