<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    public  $timestamps = false;
    protected $table = 'personales_administrativos'; 
    protected $primaryKey = 'Ci';
    protected $fillable = [
        'Ci',
        'Nombre',
        'Apellido',
        'Cargo_Puesto',
        'Departamento_Area',
        'Correo_Electronico',
        'Estado_Laboral',
        'CIUDADES_id_Ciudades',
        'NACIONALIDADES_id_Nacionalidades'
    ];
}
