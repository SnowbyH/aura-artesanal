<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_usuario', 'user_id', 'rol_id');
    }

    public function tieneRol(string|array $roles): bool
    {
        $lista = is_array($roles) ? $roles : [$roles];
        return $this->roles()->whereIn('nombre', $lista)->exists();
    }
}
