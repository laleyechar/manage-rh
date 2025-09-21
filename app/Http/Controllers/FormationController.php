<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{

    public function LesFormations()
    {
        $formations = Formation::with('agents')->orderBy('debut_Formation')->get();
        $agents = Agent::all();
        return view('formations', [
            'formations' => $formations,
            'agents' => $agents
        ]);
    }


    public function creer_Formation(request $request)
    {
        $request->merge([
            'agents' => explode(',', $request->input('agents'))
        ]);

        $validated = $request->validate([
            'nom_Formation' => 'required|string|max:255',
            'Description_Formation' => 'nullable|string',
            'debut_Formation' => 'required|date',
            'type_formation' => 'required|string|in:Formation évaluante,sensibilisation',
            'note' => 'nullable|file|max:4096',
            'fin_Formation' => 'required|date|after_or_equal:debut_Formation',
            'pays_Formation' => 'required|string|max:255',
            'ville_Formation' => 'required|string|max:255',
            'agents' => 'required|array',
            'agents.*' => 'exists:agents,matricule_Agent',
        ]);


        $formation = Formation::create([
            'nom_Formation' => $validated['nom_Formation'],
            'Description_Formation' => $validated['Description_Formation'],
            'debut_Formation' => $validated['debut_Formation'],
            'fin_Formation' => $validated['fin_Formation'],
            'pays_Formation' => $validated['pays_Formation'],
            'ville_Formation' => $validated['ville_Formation'],
            'type_formation' => $validated['type_formation'],
            'note' => $request->hasFile('note') ? file_get_contents($request->file('note')->getRealPath()) : null,
        ]);


        $agents = Agent::whereIn('matricule_Agent', $validated['agents'])->get();
        $formation->agents()->attach($agents);

        return redirect()->route('formations')->with('success', 'Formation ajoutée avec succès.');
    }

    public function updateFormation(Request $request, $id)
    {
        $request->merge([
            'agents' => explode(',', $request->input('agents'))
        ]);

        // Valider les champs
        $validatedData = $request->validate([
            'nom_Formation' => 'required|string|max:255',
            'Description_Formation' => 'nullable|string',
            'debut_Formation' => 'required|date',
            'fin_Formation' => 'required|date|after_or_equal:debut_Formation',
            'pays_Formation' => 'required|string|max:255',
            'ville_Formation' => 'required|string|max:255',
            'type_formation' => 'required|string|in:Formation évaluante,sensibilisation',
            'note' => 'nullable|file|max:2048',
            'agents' => 'required|array',
            'agents.*' => 'exists:agents,matricule_Agent',
        ]);

        // Récupérer la formation existante
        $formation = Formation::findOrFail($id);

        // Mise à jour des champs
        $formation->update([
            'nom_Formation' => $validatedData['nom_Formation'],
            'Description_Formation' => $validatedData['Description_Formation'],
            'debut_Formation' => $validatedData['debut_Formation'],
            'fin_Formation' => $validatedData['fin_Formation'],
            'type_formation' => $validatedData['type_formation'],
            'note' => $request->hasFile('note') ? file_get_contents($request->file('note')->getRealPath()) : $formation->note,
            'pays_Formation' => $validatedData['pays_Formation'],
            'ville_Formation' => $validatedData['ville_Formation'],
        ]);

        // Synchronisation des agents
        $agents = Agent::whereIn('matricule_Agent', $validatedData['agents'])->get();
        $formation->agents()->sync($agents);

        return redirect()->route('formations')->with('success', 'Formation modifiée avec succès.');
    }

    public function deleteFormation($id)
    {
        $formation = Formation::findOrFail($id);

        // Détacher les agents liés (si nécessaire selon ta configuration de la table pivot)
        $formation->agents()->detach();

        // Supprimer la formation
        $formation->delete();

        return redirect()->route('formations')->with('success', 'Formation supprimée avec succès.');
    }

    public function afficherAttestation($id)
    {
        $formation = Formation::with('agents')->findOrFail($id);

        return response($formation->note)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="attestation.pdf"');
    }
}
