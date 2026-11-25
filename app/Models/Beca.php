<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Beca extends Model
{
    public  $timestamps = false;
    protected $table = 'becas'; 
    protected $primaryKey = 'id_Becas';
    protected $fillable = [
       'id_Becas',
       'Nombre_Beca',
       'Porcentaje_Descuento',
       'Tipo_Beca',
       'Requisitos'
    ];

    public function alumnos(): HasMany
    {
        return $this->hasMany(Alumno::class, 'BECAS_id_Becas');
    }
}
