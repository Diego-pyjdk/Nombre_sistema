<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    public  $timestamps = false;
    protected $table = 'profesores'; 
    protected $primaryKey = 'Ci';
    protected $fillable = [
        'Ci',
        'Nombre',
        'Apellido',
        'Titulo_Academico',
        'Especialidad',
        'Correo_Electronico',
        'CIUDADES_id_Ciudades',
        'NACIONALIDADES_id_Nacionalidades'
    ];
}
