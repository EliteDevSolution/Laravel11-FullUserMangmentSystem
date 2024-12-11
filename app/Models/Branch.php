<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    protected $table = 'filiais';
    protected $primaryKey = 'id_filial';
    public $timestamps = false;

    protected $fillable = [
        'id_tipo_filial',
        'nm_filial',
        'nm_documento',
        'nm_codigo',
        'nm_razao_social',
        'nm_social',
        'nr_telefone',
        'nm_email',
        'nm_endereco',
        'nr_endereco',
        'nm_complemento',
        'nm_cep',
        'nm_municipio',
        'nm_estado',
        'dt_cadastro',
        'id_usuario_cadastro',
        'dt_alteracao',
    ];

    public function branchType(): BelongsTo
    {
        return $this->belongsTo(BranchType::class, 'id_tipo_filial');
    }

    public function banks(): HasMany
    {
        return $this->hasMany(BranchBank::class, 'id_filial');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}