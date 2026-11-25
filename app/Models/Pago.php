<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public  $timestamps = false;
    protected $table = 'pagos'; 
    protected $primaryKey = 'id_Pagos';
    protected $fillable = [
        'id_Pagos',
        'Numero_comprobante',
        'Fecha_pago',
        'Monto_Total',
        'Metodo_Pago',
        'Estado_Pago',
        'ALUMNOS_Ci'
    ];
}

    