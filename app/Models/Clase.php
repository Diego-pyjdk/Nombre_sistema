<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    public  $timestamps = false;
    protected $table = 'clases'; 
    protected $primaryKey = 'id_Clases';
    protected $fillable = [
        'id_Clases',
        'Codigo_Seccion',
        'Aula_Laboratorio',
        'Periodo_Lectivo',
        'Cupo_Disponible',
        'ASIGNATURAS_id_Asignaturas',
        'PROFESORES_Ci'
    ];
}
