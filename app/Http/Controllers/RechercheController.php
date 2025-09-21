<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Conge;
use App\Models\Absence;
use App\Models\Formation;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function rechercheGlobal(Request $request)
    {
        $query = $request->input('q');

        $employe = \App\Models\Agent::where('nom_Agent', 'like', "%{$query}%")
            ->orWhere('prenom_Agent', 'like', "%{$query}%")
            ->orWhere('date_depart_retraite', 'like', "%{$query}%")
            ->get()
            ->map(function ($agent) {
                return [
                    'title' => $agent->nom_Agent . ' ' . $agent->prenom_Agent,
                    'category' => 'Agent',
                    'date' => $agent->date_depart_retraite,
                    'url' => route('info', ['id' => $agent->id])
                ];
            });

        $conge = Conge::with('agents')
            ->where(function ($q) use ($query) {
                $q->where('Type_conge', 'like', "%{$query}%")
                    ->orWhere('statut_conge', 'like', "%{$query}%")
                    ->orWhere('Date_debut', 'like', "%{$query}%")
                    ->orWhere('Date_fin', 'like', "%{$query}%")
                    ->orWhereHas('agents', function ($q2) use ($query) {
                        $q2->where('nom_Agent', 'like', "%{$query}%")
                            ->orWhere('prenom_Agent', 'like', "%{$query}%");
                    });
            })
            ->get()
            ->map(function ($conge) {
                $nomsAgents = $conge->agents->map(function ($agent) {
                    return $agent->nom_Agent . ' ' . $agent->prenom_Agent;
                })->join(', '); // joint les noms des agents en une seule chaîne

                return [
                    'title' => $conge->Type_conge . ' - ' . $conge->statut_conge . ' (Agents : ' . $nomsAgents . ')',
                    'category' => 'Congé',
                    'date' => $conge->Date_debut,
                    'url' => route('Conges', ['conge' => $conge->id])
                ];
            });

        $formation = Formation::with('agents')
            ->where('nom_Formation', 'like', "%{$query}%")
            ->orWhere('pays_Formation', 'like', "%{$query}%")
            ->orWhere('ville_Formation', 'like', "%{$query}%")
            ->orWhere('debut_Formation', 'like', "%{$query}%")
            ->orWhere('fin_Formation', 'like', "%{$query}%")
            ->orWhereHas('agents', function ($q2) use ($query) {
                $q2->where('nom_Agent', 'like', "%{$query}%")
                    ->orWhere('prenom_Agent', 'like', "%{$query}%");
            })
            ->get()
            ->map(function ($formation) {
                $nomsAgents = $formation->agents->map(function ($agent) {
                    return $agent->nom_Agent . ' ' . $agent->prenom_Agent;
                })->join(', ');

                return [
                    'title' => $formation->nom_Formation . ' (' . $formation->pays_Formation . '/' . $formation->ville_Formation . ') - Agent(s) : ' . $nomsAgents,
                    'category' => 'Formation',
                    'date' => $formation->debut_Formation,
                    'url' => route('formations')
                ];
            });

        $absence = Absence::with('agent')
            ->where('Motif_absence', 'like', "%{$query}%")
            ->orWhere('Debut_absence', 'like', "%{$query}%")
            ->orWhere('Fin_absence', 'like', "%{$query}%")
            ->orWhereHas('agent', function ($q) use ($query) {
                $q->where('nom_Agent', 'like', "%{$query}%")
                    ->orWhere('prenom_Agent', 'like', "%{$query}%");
            })
            ->get()
            ->map(function ($absence) {
                return [
                    'title' => 'Absence - ' . $absence->Motif_absence . ' (Agent : ' . $absence->agent->nom_Agent . ' ' . $absence->agent->prenom_Agent . ')',
                    'category' => 'Absence',
                    'date' => $absence->Debut_absence,
                    'url' => route('absences', ['absence' => $absence->id]) // Adapte la route si besoin
                ];
            });


        // Tu peux ajouter d'autres types de résultats ici (congés, formations...)
        // $results = $employe->merge($conge)->merge($formation)->merge($absence);
        $results = collect($employe)
            ->merge(collect($conge))
            ->merge(collect($formation))
            ->merge(collect($absence));
        return response()->json($results);
    }
}
