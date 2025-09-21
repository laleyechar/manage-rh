<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Grade;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function changergrade($id)
    {
        $agent = Agent::find($id);
        $grades = Grade::all();
        $alertes = $this->getAlertesMontéeGrade();

        return view('grade', compact('agent', 'grades', 'alertes'));
    }

    private function getAlertesMontéeGrade()
    {
        $alertes = [];
        $agents = Agent::all();

        foreach ($agents as $agent) {
            $prochaine = $agent->prochaineMonteeGrade();
            if ($prochaine) {
                $alertes[] = [
                    'id' => $agent->id,
                    'nom' => $agent->nom_Agent . ' ' . $agent->prenom_Agent,
                    'date' => $prochaine->format('d/m/Y'),
                    'date_obj' => $prochaine,
                ];
            }
        }
        $alertes = collect($alertes)->sortByDesc(function ($alerte) {
            return $alerte['date_obj'];
        })->values()->toArray();

        return $alertes;
    }

    public function ajoutergrade(Request $request, $id)
    {
        $validated = $request->validate([
            'matricule_Agent' => 'required|string|exists:agents,matricule_Agent',
            'categorie_ancien' => 'required|string|in:A,B,C,D',
            'classe_ancien' => 'required|string|in:1,2,3,4',
            'echelon_ancien' => 'required|string|in:1,2,3,4,5,6,7,8,9,10,11,12',
            'categorie_nouveau' => 'nullable|string|in:A,B,C,D',
            'classe_nouveau' => 'nullable|string|in:1,2,3,4',
            'echelon_nouveau' => 'nullable|string|in:1,2,3,4,5,6,7,8,9,10,11,12',
        ]);
        $agent = Agent::find($id);
        $prochaineDate = $agent->prochaineMonteeGrade();

        if (!$prochaineDate || !$prochaineDate->isSameDay(now())) {
            return redirect()->route('site')->with('error', 'Le grade ne peut être modifié que le' . $prochaineDate?->format('d/m/Y'));
        }
        $grade = Grade::create([
            'agent_id' => $agent->id,
            'categorie_ancien' => $validated['categorie_ancien'],
            'classe_ancien' => $validated['classe_ancien'],
            'echelon_ancien' => $validated['echelon_ancien'],
            'categorie_nouveau' => $validated['categorie_nouveau'],
            'classe_nouveau' => $validated['classe_nouveau'],
            'echelon_nouveau' => $validated['echelon_nouveau'],

        ]);

        $agent->update([
            'categorie' => $validated['categorie_nouveau'],
            'classe' => $validated['classe_nouveau'],
            'echelon' => $validated['echelon_nouveau'],

        ]);

        $alertes = $this->getAlertesMontéeGrade();

        return redirect()->route('info')->with('success', 'Grade mis à jour et alerte supprimée avec succès.')
            ->with('alertes', $alertes); // Passer les alertes mises à jour

    }
}
