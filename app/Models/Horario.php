<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Horario extends Model
{
    public  $timestamps = false;
    protected $table = 'horarios'; 
    protected $primaryKey = 'id_Horarios';
    protected $fillable = [
        'id_Horarios',
        'Dia_semana',
        'Horario_Inicio',
        'Hora_Fin',
        'Turno',
        'CLASES_id_Clases'
    ];

    public function clase(): BelongsTo
    {
        return $this->belongsTo(Clase::class, 'CLASES_id_Clases');
    }
}
