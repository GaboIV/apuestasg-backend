<?php

namespace App;

use App\Racecourse;
use Illuminate\Database\Eloquent\Model;

class Career extends Model {

	protected $appends = ['dia'];

	// protected $with = ["racecourse"];

    protected $fillable = [
        'code',
        'name',
        'title',
        'racecourse_id',
        'date',
        'posttime',
        'distance',
        'number',
        'valid',
        'surface',
        'status',
        'grade',
        'purse',
        'age_restriction',
        'sex_restriction',
        'record'
    ];

    public function racecourse() {
        return $this->hasOne(Racecourse::class, 'id', 'racecourse_id');
    }

    public function getDiaAttribute() { 
        $dia = date('l', strtotime($this->date));

        if ($dia == 'Monday') { $dia = "Lunes"; }
        if ($dia == 'Tuesday') { $dia = "Martes"; }
        if ($dia == 'Wednesday') { $dia = "Miércoles"; }
        if ($dia == 'Thursday') { $dia = "Jueves"; }
        if ($dia == 'Friday') { $dia = "Viernes"; }
        if ($dia == 'Saturday') { $dia = "Sábado"; }
        if ($dia == 'Sunday') { $dia = "Domingo"; }

        return $dia;
    }

    public function getInscripcionAttribute() { 
        $inscritos = $this->inscriptions;

        if (count($inscritos) == 0) { 
            return "0 inscritos";
        } elseif (count($inscritos) == 1) {
            return "1 inscrito";
        } else {
            return count($inscritos) . " inscritos";
        }
    }

    public function inscriptions() {
        return $this->hasMany('App\Inscription')->orderBy('number');
    }
}
