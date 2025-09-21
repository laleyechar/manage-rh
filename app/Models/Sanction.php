<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sanction extends Model
{
    use HasFactory;

    protected $fillable =[
        'agent_id',  
        'santion',
        'Date_sanction'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
