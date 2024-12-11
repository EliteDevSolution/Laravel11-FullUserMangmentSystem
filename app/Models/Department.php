<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'id_departamento';
    public $timestamps = false;

    protected $fillable = [
        'nm_departamento',
        'cd_departamento',
        'nm_descricao',
        'id_status',
        'dt_cadastro',
        'id_usuario_cadastro',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function natures(): BelongsToMany
    {
        return $this->belongsToMany(
            Nature::class,
            'department_nature',
            'id_departamento',
            'id_natureza'
        )->withPivot(['dt_cadastro', 'id_usuario_cadastro']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}