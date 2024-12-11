<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = [
        'id_tipo_pessoa',
        'nm_cliente',
        'nm_email',
        'nr_telefone',
        'nm_documento',
        'nm_codigo',
        'nm_razao_social',
        'nm_endereco',
        'nr_endereco',
        'nm_complemento',
        'nm_cep',
        'nm_municipio',
        'nm_estado',
        'dt_cadastro',
        'id_usuario_cadastro',
        'dt_atualizacao',
    ];

    public function typePerson(): BelongsTo
    {
        return $this->belongsTo(TypePerson::class, 'id_tipo_pessoa');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}