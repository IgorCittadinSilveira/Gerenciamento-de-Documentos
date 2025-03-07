<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoVersion extends Model
{
    use HasFactory;

    protected $fillable = [
        'documento_id',
        'nome',
        'localizacao',
        'categoria',
        'data',
        'arquivo',
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
