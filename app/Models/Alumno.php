<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alumno extends Model
{
    public  $timestamps = false;
    protected $table = 'alumnos'; 
    protected $primaryKey = 'Ci';
    public $incrementing = false;
    protected $fillable = [
        'Ci',
        'Matricula_Numero',
        'Nombre',
        'Apellido',
        'Fecha_Nacimiento',
        'Genero',
        'Direccion',
        'Correo_Electronico',
        'CIUDADES_id_Ciudades',
        'BECAS_id_Becas',
        'NACIONALIDADES_id_Nacionalidades'
    ];

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'CIUDADES_id_Ciudades');
    }

    public function beca(): BelongsTo
    {
        return $this->belongsTo(Beca::class, 'BECAS_id_Becas');
    }

    public function nacionalidad(): BelongsTo
    {
        return $this->belongsTo(Nacionalidad::class, 'NACIONALIDADES_id_Nacionalidades');
    }

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class, 'ALUMNOS_Ci');
    }

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class, 'ALUMNOS_Ci');
    }
}
