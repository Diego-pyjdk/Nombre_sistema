<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Iva extends Model
{
    public  $timestamps = false;
    protected $table = 'ivas'; 
    protected $primaryKey = 'id_Ivas';
    protected $fillable = [
        'id_Ivas',
        'Porcentaje',
        'Descripcion_Iva'
    ];

    public function aranceles(): HasMany
    {
        return $this->hasMany(Arancele::class, 'IVAS_id_Ivas');
    }
}
