<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    use HasFactory;

    protected $fillable=[
        'agent_id',
        'nom_Fichier',
        'contenu_Fichier'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
