<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function hasAccess($config_permission)
    {
        $role = $this->role;
        if(!$role) {
            return false;
        }
        foreach ($role->permissions as $permission) {
            if($config_permission == $permission ?? false) {
                return true;
            }
        }
    }
}
