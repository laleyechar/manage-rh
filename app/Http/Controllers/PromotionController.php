<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Poste;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    // Afficher la liste des promotions avec les informations des agents
    public function LesPromo()
    {
        $promotions = Promotion::with('agent')->get();

        // Récupérer tous les postes libres (pas encore attribués à un agent)
        $postesLibres = Poste::whereNull('agent_id')->get();

        // Tu peux aussi charger les postes de certains agents si besoin, mais ici uniquement les postes libres
        return view('Promotions', [
            'promotions' => $promotions,
            'postes' => $postesLibres,
        ]);
    }

    public function creer_promo(Request $request)
    {
        $validated = $request->validate([
            'matricule_Agent' => 'required|exists:agents,matricule_Agent',
            'Date_promotion' => 'required|date',
            'Ancien_poste' => 'required|string',
            'Nouveau_poste' => 'required|string'
        ]);
        $agent = Agent::with('promotions')->where('matricule_Agent', $validated['matricule_Agent'])->firstOrFail();
        $promotion = Promotion::create([
            'agent_id' => $agent->id,
            'Date_promotion' => $validated['Date_promotion'],
            'Ancien_poste' => $validated['Ancien_poste'],
            'Nouveau_poste' => Poste::find($validated['Nouveau_poste'])->libelle_poste,
        ]);

        Poste::where('agent_id', $agent->id)->update(['agent_id' => null]);

        // Assigner le nouveau poste à l'agent
        $nouveauPoste = Poste::findOrFail($validated['Nouveau_poste']);
        if ($nouveauPoste->agent_id !== null) {
            return back()->withErrors(['Nouveau_poste' => 'Ce poste est déjà occupé.']);
        }
        $nouveauPoste->agent_id = $agent->id;

        $nouveauPoste->save();

        return redirect()->route('promotions')->with('success', 'Congé enregistré avec succès.');
    }

    public function modifierPromo(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $validatedData = $request->validate([
            'matricule_Agent' => 'required|exists:agents,matricule_Agent',
            'Date_promotion' => 'required|date',
            'Ancien_poste' => 'required|string',
            'Nouveau_poste' => 'required|exists:postes,id', // on passe l'id ici pour fiabilité
        ]);

        $agent = Agent::where('matricule_Agent', $validatedData['matricule_Agent'])->first();

        // Libérer l'ancien poste (celui qui était occupé par cet agent)
        Poste::where('agent_id', $agent->id)->update(['agent_id' => null]);

        // Assigner le nouveau poste à l'agent
        $nouveauPoste = Poste::findOrFail($validatedData['Nouveau_poste']);
        if ($nouveauPoste->agent_id !== null && $nouveauPoste->agent_id != $agent->id) {
            return back()->withErrors(['Nouveau_poste' => 'Ce poste est déjà occupé.']);
        }
        $nouveauPoste->agent_id = $agent->id;
        $nouveauPoste->save();

        // Mettre à jour la promotion avec le libellé du nouveau poste
        $promotion->update([
            'agent_id' => $agent->id,
            'Date_promotion' => $validatedData['Date_promotion'],
            'Ancien_poste' => $validatedData['Ancien_poste'],
            'Nouveau_poste' => $nouveauPoste->libelle_poste,
        ]);

        return back()->with('success', 'Promotion mise à jour avec succès.');
    }

    public function supprimerPromo($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->route('promotions')->with('success', 'Employé supprimé avec succès.');
    }
}
