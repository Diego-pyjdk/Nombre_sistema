<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    public  $timestamps = false;
    protected $table = 'asistencias'; 
    protected $primaryKey = 'id_Asistencias';
    protected $fillable = [
        'id_Asistencias',
        'Fecha',
        'Estado_Asistencia',
        'DETALLES_MATRICULAS_MATRICULAS_id_Matriculas',
        'DETALLES_MATRICULAS_ASIGNATURAS_id_Asignaturas'
    ];
}
