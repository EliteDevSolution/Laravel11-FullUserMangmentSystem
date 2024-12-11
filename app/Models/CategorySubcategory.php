<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CategorySubcategory extends Model
{
    protected $table = 'categoria_subcategoria';
    public $timestamps = false;
    protected $fillable = [
        'id_categoria',
        'id_subcategoria',
        'dt_cadadtro',
        'id_usuario_cadastro',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}