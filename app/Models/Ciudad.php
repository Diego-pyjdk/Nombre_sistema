<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    public  $timestamps = false;
    protected $table = 'ciudades'; 
    protected $primaryKey = 'id_Ciudades';
    protected $fillable = [
        'id_Ciudades',
        'Nombre_Ciudad',
        'Departamento'
    ];
}
