<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BranchType extends Model
{
    protected $table = 'tipo_filiais';
    protected $primaryKey = 'id_tipo_filial';
    public $timestamps = false;

    protected $fillable = [
        'nm_tipo_filial',
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class, 'id_tipo_filial');
    }
}