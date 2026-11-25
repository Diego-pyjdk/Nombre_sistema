<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Matricula extends Model
{
    public  $timestamps = false;
    protected $table = 'detalles_matriculas';
    protected $primaryKey = ['MATRICULAS_id_Matriculas', 'ASIGNATURAS_id_Asignaturas'];
    public $incrementing = false;
    protected $fillable = [
        'MATRICULAS_id_Matriculas',
        'ASIGNATURAS_id_Asignaturas',
        'Estado_Materia',
        'Nota_Final'
    ];
}
