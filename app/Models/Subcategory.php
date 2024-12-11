<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subcategory extends Model
{
    protected $table = 'subcategorias';
    protected $primaryKey = 'id_subcategoria';
    public $timestamps = false;

    protected $fillable = [
        'nm_subcategoria',
        'cd_subcategoria',
        'nm_descricao',
        'dt_cadastro',
        'id_usuario_cadastro',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'category_subcategory',
            'id_subcategoria',
            'id_categoria'
        )->withPivot(['dt_cadadtro', 'id_usuario_cadastro']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}