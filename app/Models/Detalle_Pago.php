<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Pago extends Model
{
    public  $timestamps = false;
    protected $table = 'detalles_pagos';
    protected $primaryKey = ['PAGOS_id_Pagos', 'ARANCELES_id_Aranceles'];
    public $incrementing = false;
    protected $fillable = [
        'PAGOS_id_Pagos',
        'ARANCELES_id_Aranceles',
        'Cantidad',
        'Precio_Unitario',
        'Subtotal'
    ];
}
