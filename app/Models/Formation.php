<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom_Formation',
        'Description_Formation',
        'debut_Formation',
        'fin_Formation' ,
        'pays_Formation',
        'ville_Formation',
        'type_formation',
        'note'
    ];

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_formation', 'formation_id', 'agent_id');
    }
}
