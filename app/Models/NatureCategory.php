<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NatureCategory extends Model
{
    protected $table = 'natureza_categoria';
    public $timestamps = false;

    protected $fillable = [
        'id_natureza',
        'id_categoria',
        'dt_cadastro',
        'id_usuario_cadastro',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}