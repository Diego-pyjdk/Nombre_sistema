<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    public  $timestamps = false;
    protected $table = 'contratos'; 
    protected $primaryKey = 'id_Contrato';
    protected $fillable = [
        'id_Contrato',
        'Numero_contrato',
        'Tipo_contrato',
        'Fecha_inicio',
        'Fecha_Fin',
        'Salario_base',
        'Horas_Semanales',
        'PERSONALES_ADMINISTRATIVOS_Ci',
    ];
}



