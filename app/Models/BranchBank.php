<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchBank extends Model
{
    protected $table = 'filial_bancos';
    protected $primaryKey = 'id_filial_banco';
    public $timestamps = false;

    protected $fillable = [
        'id_filial',
        'cd_banco',
        'nm_banco',
        'nr_agencia',
        'nr_conta',
        'dt_cadastro',
        'id_usuario_cadastro',
        'dt_alteracao',
        'fl_filial_bancario',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'id_filial');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}