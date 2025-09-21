<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Conge;
use App\Models\Grade;
use App\Models\Poste;
use App\Models\Absence;
use App\Models\Fichier;
use App\Models\Sanction;
use App\Models\Formation;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    use SoftDeletes;

    protected $guardable = [
        'id',
        'created_at',
        'update_at'
    ];

    protected $fillable = [
        'nom_Agent',
        'prenom_Agent',
        'tel_Agent',
        'matricule_Agent',
        'date_naissance',
        'lieu_naissance',
        'situation_matrimoniale',
        'grade_Agent',
        'poste_id',
        'date_prise_service',
        'date_depart_retraite',
        'num_affiliation_cnss',
        'statut_Agent',
        'statut',
        'categorie',
        'classe',
        'echelon',
    ];

    use HasFactory;

    public function conges()
    {
        return $this->belongsToMany(Conge::class, 'agent_conge' ,'agent_id', 'conge_id')
            ->withTimestamps();
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function sanctions()
    {
        return $this->hasMany(Sanction::class);
    }


    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'agent_formation', 'agent_id', 'formation_id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function fichiers()
    {
        return $this->hasMany(Fichier::class);
    }

    public function getDatesMonteeGrade(): array
    {
        $dates = [];
        $start = Carbon::parse($this->date_prise_service);
        $end = Carbon::parse($this->date_depart_retraite);

        while ($start->addYears(2)->lessThanOrEqualTo($end)) {
            $dates[] = $start->copy();
        }

        return $dates;
    }

    public function prochaineMonteeGrade(): ?Carbon
    {
        $today = now();
        foreach ($this->getDatesMonteeGrade() as $date) {
            if ($date->isFuture() && $date->diffInDays($today) <= 30) {
                return $date;
            }
        }

        return null;
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'agent_id');
    }

    public function poste()
    {
        return $this->hasOne(Poste::class);
    }
}
