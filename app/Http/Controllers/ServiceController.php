<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::withCount('postes')->with(['postes.agent'])->paginate(8);
        $agents = Agent::orderBy('nom_Agent')->orderBy('prenom_Agent')->get();
        return view('service', compact('services', 'agents'));
    }

    public function showPostes($serviceId)
    {
        $service = Service::with('postes')->findOrFail($serviceId);

        // $service->postes contient la liste des postes

        return view('service', compact('service'));
    }

    public function creerService(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'responsable' => 'nullable|string|max:255',
            'statut' => 'required|in:Actif,Inactif',
        ]);

        Service::create($validated);
        return redirect()->route('Services')->with('success', 'Service ajouté avec succès.');
    }

    public function modifierService(Request $request, $id)
    {
        $service= Service::findorfail($id);
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'responsable' => 'nullable|string|max:255',
            'statut' => 'required|in:Actif,Inactif',
        ]);

        $service->update($validated);
        return redirect()->route('Services')->with('success', 'Service mis à jour avec succès.');
    }

    public function supprimerService($id)
    {
        $service = Service::findorfail($id);
        
        $service->delete();
        return redirect()->route('Services')->with('success', 'Service supprimé avec succès.');
    }
}
