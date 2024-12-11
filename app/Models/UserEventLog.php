<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEventLog extends Model
{
    protected $table = "usuario_logs";

    protected $fillable = ['id', 'id_usuario_cadastro', 'tipo_evento', 'evento_conteudo'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario_cadastro');
    }
}
