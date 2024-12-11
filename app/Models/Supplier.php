<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supplier extends Model
{
    protected $table = 'fornecedores';
    protected $primaryKey = 'id_fornecedor';
    public $timestamps = false;

    protected $fillable = [
        'id_tp_pessoa',
        'nm_fornecedor',
        'nm_documento',
        'nm_codigo',
        'nm_razao_social',
        'nm_social',
        'nm_endereco',
        'nr_endereco',
        'nm_complemento',
        'nm_estado',
        'nm_municipio',
        'nm_cep',
        'nr_telefone',
        'nm_email',
        'cd_banco',
        'nm_banco',
        'nr_agencia',
        'nr_conta',
        'nm_chave_pix',
        'nm_dados_bancarios_internacional',
        'dt_cadastro',
        'id_usuario_cadastro',
        'dt_atualizacao',
    ];

    public function typePerson(): BelongsTo
    {
        return $this->belongsTo(TypePerson::class, 'id_tp_pessoa');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}