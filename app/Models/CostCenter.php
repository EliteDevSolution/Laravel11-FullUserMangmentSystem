<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
    protected $table = 'centro_custos';
    protected $primaryKey = 'id_centro_custo';
    public $timestamps = false;

    protected $fillable = [
        'nm_centro_custo',
        'dt_cadastro',
        'id_usuario_cadastro',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}