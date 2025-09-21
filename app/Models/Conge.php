<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conge extends Model
{
    protected $fillable=[
        'Type_conge',
        'Date_debut',
        'Date_fin',
        'statut_conge',
        'motif',
    ];
    
    use HasFactory;

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_conge', 'conge_id', 'agent_id')
            ->withTimestamps();
    }

    public function duree()
    {
        return Carbon::parse($this->Date_debut)->diffInDays(Carbon::parse($this->Date_Fin)) + 1;
    }
}
