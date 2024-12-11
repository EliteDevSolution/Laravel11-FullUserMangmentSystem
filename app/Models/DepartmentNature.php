<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DepartmentNature extends Model
{
    protected $table = 'departamento_natureza';
    public $timestamps = false;
    protected $fillable = [
        'id_departamento',
        'id_natureza',
        'dt_cadadtro',
        'id_usuario_cadastro',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}