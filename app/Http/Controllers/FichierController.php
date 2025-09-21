<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Fichier;
use Illuminate\Http\Request;

class FichierController extends Controller
{
    public function afficherFichier()
    {
        $fichiers = Fichier::with('agent')->latest()->get(); // Tous les fichiers
        $agents = Agent::with(['fichiers' => function ($query) {
        $query->latest();
    }])->get(); // Fichiers triés par agent

    return view('fichiers', compact('fichiers', 'agents'));
        // $fichier = Fichier::with('agent')->get();
        // return view('fichiers', [
        //     'fichiers' => $fichier
        // ]);
    }

    public function showFichier($id)
    {
        $fichier = Fichier::findOrFail($id);
        if (!$fichier || empty($fichier->contenu_Fichier)) {
            return abort(404, 'Le fichier n\'existe pas.');
        }

        // Retourner le fichier en tant que réponse PDF
        return response($fichier->contenu_Fichier, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $fichier->nom_Fichier . '"');
    }

    public function ajouterFichier(Request $request)
    {
        $validated = $request->validate([
            'matricule_Agent' => 'required|exists:agents,matricule_Agent',
            'nom_Fichier' => 'required|string',
            'contenu_Fichier' => 'required|file|mimes:pdf|max:10200'
        ]);

        // Récupérer l'agent correspondant au matricule
        $agent = Agent::where('matricule_Agent', $validated['matricule_Agent'])->first();
        if (!$agent) {
            return back()->withErrors(['matricule_Agent' => 'Agent non trouvé.'])->withInput();
        }

        // Vérification du fichier
        $file = $request->file('contenu_Fichier');

        if ($request->hasFile('contenu_Fichier')) {
            $file = $request->file('contenu_Fichier');
            if ($file->isValid() && $file->getMimeType() == 'application/pdf') {
                $fichierBinaire = file_get_contents($file->getRealPath());
            } else {
                return back()->withErrors(['contenu_Fichier' => 'Le fichier doit être un PDF valide.']);
            }
        } else {
            return back()->withErrors(['contenu_Fichier' => 'Aucun fichier PDF n\'a été téléchargé.']);
        }


        // Sauvegarder le fichier dans la base de données
        $fichier = Fichier::create([
            'agent_id' => $agent->id,
            'contenu_Fichier' => $fichierBinaire,
            'nom_Fichier' => $validated['nom_Fichier'],

        ]);
        return redirect()->route('afficher.fichier');
    }


    public function updateFichier(Request $request, $id)
    {
        // Récupération du fichier depuis la base
        $fichier = Fichier::findOrFail($id);

        // Validation des données
        $validatedData = $request->validate([
            'matricule_Agent' => 'required|exists:agents,matricule_Agent',
            'nom_Fichier' => 'required|string',
            'contenu_Fichier' => 'nullable|file|mimes:pdf|max:10200',  // Fichier optionnel
        ]);

        // Récupérer l'agent concerné
        $agent = Agent::where('matricule_Agent', $validatedData['matricule_Agent'])->first();

        // Vérification des données après validation
        // Pour vérifier que les données sont correctement validées

        // Par défaut, garder l'ancien contenu du fichier
        $fichierBinaire = $fichier->contenu_Fichier;

        // Si un nouveau fichier est uploadé
        if ($request->hasFile('contenu_Fichier')) {
            $fichierUpload = $request->file('contenu_Fichier');

            // Vérification si le fichier est bien téléchargé et valide
            // Vérifier les informations du fichier téléchargé

            if ($fichierUpload->isValid() && $fichierUpload->getMimeType() === 'application/pdf') {
                // Lire le contenu du fichier binaire
                $fichierBinaire = file_get_contents($fichierUpload->getRealPath());
            } else {
                return back()->withErrors(['contenu_Fichier' => 'Le fichier doit être un PDF valide.']);
            }
        }

        // Vérification du contenu du fichier avant la mise à jour
        // Vérifiez le contenu du fichier avant la mise à jour

        // Mise à jour des données du fichier
        $fichier->update([
            'agent_id' => $agent->id,
            'nom_Fichier' => $validatedData['nom_Fichier'],
            'contenu_Fichier' => $fichierBinaire,
        ]);

        // Vérification que la mise à jour a bien eu lieu
        // Vérifier l'objet fichier après mise à jour

        return back()->with('success', 'Fichier mis à jour avec succès.');
    }


    public function deleteFichier($id)
    {
        $file = Fichier::findOrFail($id);
        $file->delete();
        return redirect()->route('afficher.fichier')->with('success', 'Employé supprimé avec succès.');
    }

    public function fichiersParAgent()
    {
        $agents = Agent::with(['fichiers' => function ($query) {
            $query->orderBy('created_at', 'desc'); // trie les fichiers récents en premier
        }])->get();

        return view('fichiers', compact('agents'));
    }
}
