<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arancele extends Model
{
    public  $timestamps = false;
    protected $table = 'aranceles'; 
    protected $primaryKey = 'id_Aranceles';
    protected $fillable = [
        'id_Aranceles',
        'Concepto',
        'Monto_estandar',
        'Descripcion',
        'IVAS_id_Ivas'
    ];
}
