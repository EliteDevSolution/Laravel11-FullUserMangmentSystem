<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone',
        'nivel',
        'password',
        'status',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function userlogs()
    {
        return $this->hasMany(UserEventLog::class, 'id_usuario_cadastro');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'id_usuario_cadastro');
    }

    public function branchbanks()
    {
        return $this->hasMany(BranchBank::class, 'id_usuario_cadastro');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'id_usuario_cadastro');
    }

    public function categorysubcategories()
    {
        return $this->hasMany(CategorySubcategory::class, 'id_usuario_cadastro');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'id_usuario_cadastro');
    }

    public function costcenters()
    {
        return $this->hasMany(CostCenter::class, 'id_usuario_cadastro');
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'id_usuario_cadastro');
    }

    public function departmentnatures()
    {
        return $this->hasMany(DepartmentNature::class, 'id_usuario_cadastro');
    }

    public function natures()
    {
        return $this->hasMany(Nature::class, 'id_usuario_cadastro');
    }

    public function naturecategories()
    {
        return $this->hasMany(NatureCategory::class, 'id_usuario_cadastro');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'id_usuario_cadastro');
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class, 'id_usuario_cadastro');
    }
}
