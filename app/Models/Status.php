<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    public $timestamps = false;

    protected $fillable = [
        'nm_status',
    ];

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'id_status');
    }

    public function natures(): HasMany
    {
        return $this->hasMany(Nature::class, 'id_status');
    }
}