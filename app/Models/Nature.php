<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nature extends Model
{
    protected $table = 'naturezas';
    protected $primaryKey = 'id_natureza';
    public $timestamps = false;

    protected $fillable = [
        'nm_natureza',
        'cd_natureza',
        'nm_descricao',
        'id_status',
        'dt_cadastro',
        'id_usuario_cadastro',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'nature_category',
            'id_natureza',
            'id_categoria'
        )->withPivot(['dt_cadastro', 'id_usuario_cadastro']);
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(
            Department::class,
            'department_nature',
            'id_natureza',
            'id_departamento'
        )->withPivot(['dt_cadastro', 'id_usuario_cadastro']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}