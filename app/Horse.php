<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Horse extends Model
{
    use Notifiable; 

    protected $appends = ['edad', 'sexo'];

    protected $with = ["father", "mother", "haras"];
    
    const FEMENINO = 'F';
    const MASCULINO = 'M';

    public static $sexs = [self::FEMENINO, self::MASCULINO];

    const BREED1 = 'C';
    const BREED2 = 'N';

    public static $breeds = [self::BREED1, self::BREED2];

    protected $fillable = [
        'name',
        'code',
        'color',
        'sex',
        'birthday',
        'jacket_url',
        'father_id',
        'mother_id',
        'haras_id'
    ];

    public function father() {
        return $this->belongsTo(Horse::class, 'father_id', 'id');
    }

    public function mother() {
        return $this->belongsTo(Horse::class, 'mother_id', 'id');
    }

    public function haras() {
        return $this->belongsTo(Haras::class, 'haras_id', 'id');
    }

    public function getEdadAttribute() { 
        if ($this->birthday != '0000-00-00') {
            $datetime1 = date_create($this->birthday);
            $datetime2 = date_create(date("Y-m-d"));

            $interval = date_diff($datetime1, $datetime2);

            $descripcion = $interval->format('%y años');

            if ($interval->format('%m') == "0") {
                $descripcion2 = "exactos";
            }
            // } elseif ($interval->format('%m') == "1") {
            //     $descripcion2 = "y ".$interval->format('%m mes');
            // } else {
            //     $descripcion2 = "y ".$interval->format('%m meses');
            // }    

            return $descripcion." ". ($descripcion2 ?? '');
        } else {
            return "S/I edad";
        }
    }

    public function getSexoAttribute() { 
        $descripcion = 0;
        if ($this->birthday != '0000-00-00') {
            $datetime1 = date_create($this->birthday);
            $datetime2 = date_create(date("Y-m-d"));

            $interval = date_diff($datetime1, $datetime2);

            $descripcion = $interval->format('%y');
        }

        if ($this->sex != 'M') {
            if ($descripcion >= 3 OR $descripcion == 0)
                return "Macho";
            else 
                return "Potro";
        } elseif ($this->sex != 'F') {
            if ($descripcion >= 3 OR $descripcion == 0)
                return "Yegua";
            else 
                return "Potra";
        } else {
            return "S/I";
        }
    }

    // public function getJacketUrlAttribute() {

    // }
}
