<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;

    protected $fillable=[
        'agent_id',
        'Motif_absence',
        'Debut_absence',
        'Fin_absence',
        'Statut_absence'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

}
