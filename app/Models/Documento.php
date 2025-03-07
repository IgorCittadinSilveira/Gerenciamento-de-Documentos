<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
    
    protected $fillable =['nome','localizacao','categoria','data','arquivo'];
    protected $table = 'documento';

    public function users()
    {
        return $this->belongsToMany(User::class, 'documento_user');
    }
    
}
