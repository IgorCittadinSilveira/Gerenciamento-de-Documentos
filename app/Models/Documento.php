<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
    
    protected $fillable =['nome','localizacao','categoria','data','publico','arquivo'];
    protected $table = 'documento';
    
}
