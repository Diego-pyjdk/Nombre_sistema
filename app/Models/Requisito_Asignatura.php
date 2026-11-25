<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisito_Asignatura extends Model
{
    public  $timestamps = false;
    protected $table = 'requisitos_asignaturas'; 
    protected $primaryKey = 'id_Requisitos_Asignaturas';
    protected $fillable = [
       'id_Requisitos_Asignaturas',
       'Es_Obligatorio',
       'ASIGNATURAS_id_Asignaturas'
    ];
}
