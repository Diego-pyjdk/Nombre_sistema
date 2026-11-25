<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    public  $timestamps = false;
    protected $table = 'matriculas'; 
    protected $primaryKey = 'id_Matriculas';
    protected $fillable = [
        'id_Matriculas',
        'Numero_Inscripcion',
        'Fecha_Matricula',
        'Anio_Lectivo',
        'Semestre_Turno',
        'Monto_Total',
        'Estado_Matricula',
        'ALUMNOS_Ci',
        'CURSOS_id_Cursos'
    ];
}


    

