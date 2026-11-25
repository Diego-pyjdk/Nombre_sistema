<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    public  $timestamps = false;
    protected $table = 'nacionalidades'; 
    protected $primaryKey = 'id_Nacionalidades';
    protected $fillable = [
        'id_Nacionalidades',
        'Descripcion'
    ];
}
