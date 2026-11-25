<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    public  $timestamps = false;
    protected $table = 'calificaciones'; 
    protected $primaryKey = 'id_Calificaciones';
    protected $fillable = [
        'id_Calificaciones',
        'Puntaje_Obtenido',
        'Tipo_Evaluacion',
        'Fecha_Evaluacion',
        'DETALLES_MATRICULAS_MATRICULAS_id_Matriculas',
        'DETALLES_MATRICULAS_ASIGNATURAS_id_Asignaturas'
    ];
}
