<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypePerson extends Model
{
    protected $table = 'tipo_pessoas';
    protected $primaryKey = 'id_tipo_pessoa';
    public $timestamps = false;

    protected $fillable = [
        'nm_tipo_pessoa',
    ];

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class, 'id_tipo_pessoa');
    }

    public function suppliers(): HasMany
    {
        return $this->hasMany(Supplier::class, 'id_tp_pessoa');
    }
}