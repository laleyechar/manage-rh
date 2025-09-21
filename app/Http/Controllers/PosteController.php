<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\Service;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    public function index()
    {
        $postes = Poste::all();
        $services = Service::all();
        return view('poste', [
            'postes' => $postes,
            'services' => $services
        ]);
    }

    public function creerPoste(Request $request)
    {
        $validated = $request->validate(
            [
                'libelle_poste' => 'required|string|max:255|unique:postes,libelle_poste',
                'description_poste' => 'required|string|unique:postes,description_poste',
                'agent_id' => 'nullable|exists:agents,id',
                'service_id' => 'required|exists:services,id',
            ],
            [
                'libelle_poste.unique' => 'Ce libellé existe déjà dans la base.',
                'description_poste.unique' => 'Cette description existe déjà dans la base.'
            ]
        );

        Poste::create($validated);
        return redirect()->route('Poste')->with('success', 'poste ajouté avec succès.');
    }

    public function modifierForm(Request $request, $id)
    {
        $poste = Poste::findorfail($id);
        $validated = $request->validate(
            [
                'libelle_poste' => 'required|string|max:255',
                'description_poste' => 'required|string',
                'service_id' => 'required|exists:services,id',

            ],
            [
                'libelle_poste.unique' => 'Ce libellé existe déjà dans la base.',
                'description_poste.unique' => 'Cette description existe déjà dans la base.'
            ]
        );

        $poste->update($validated);
        return redirect()->route('Poste')->with('success', 'Service mis à jour avec succès.');
    }

    public function supprimerPoste($id)
    {
        $poste = Poste::findorfail($id);
        
        $poste->delete();
        return redirect()->route('Poste')->with('success', 'Service supprimé avec succès.');
    }
}
