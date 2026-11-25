<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    public  $timestamps = false;
    protected $table = 'asignaturas'; 
    protected $primaryKey = 'id_Asignaturas';
    protected $fillable = [
        'id_Asignaturas',
        'Codigo_Materia',
        'Nombre_Asignatura',
        'Horas_Catedra',
        'Creditos',
        'Programa_Estudio',
        'CURSOS_id_Cursos',
        
    ];
}
