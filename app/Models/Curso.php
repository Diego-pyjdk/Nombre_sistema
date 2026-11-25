<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    public  $timestamps = false;
    protected $table = 'cursos'; 
    protected $primaryKey = 'id_Cursos';
    protected $fillable = [
        'id_Cursos',
        'Nombre_Curso',
        'Nivel_Anio',
        'Turno',
        'Cupo_Maximo'
    ];

    public function asignaturas(): HasMany
    {
        return $this->hasMany(Asignatura::class, 'CURSOS_id_Cursos');
    }

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class, 'CURSOS_id_Cursos');
    }
}
