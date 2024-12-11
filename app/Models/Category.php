<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;

    protected $fillable = [
        'nm_categoria',
        'cd_categoria',
        'nm_descricao',
        'dt_cadastro',
        'id_usuario_cadastro',
    ];

    public function subcategories(): BelongsToMany
    {
        return $this->belongsToMany(
            Subcategory::class,
            'category_subcategory',
            'id_categoria',
            'id_subcategoria'
        )->withPivot(['dt_cadadtro', 'id_usuario_cadastro']);
    }

    public function natures(): BelongsToMany
    {
        return $this->belongsToMany(
            Nature::class,
            'nature_category',
            'id_categoria',
            'id_natureza'
        )->withPivot(['dt_cadastro', 'id_usuario_cadastro']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}