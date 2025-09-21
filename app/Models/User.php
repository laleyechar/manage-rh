<?php

namespace App\Models;

use App\Models\Agent;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable

{
    use HasRoles;
    use HasFactory, Notifiable;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'password_changed',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
}
