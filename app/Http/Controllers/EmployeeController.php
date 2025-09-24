<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Conge;
use App\Models\Poste;
use App\Models\Sanction;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{

    public function formulaire()
    {
        $postes = Poste::whereNull('agent_id')->get();
        return view('ajouterAgent', compact('postes'));
    }
    // Afficher la liste des employés triés par nom
    public function TheList()
    {
        Poste::whereIn('agent_id', function ($query) {
            $query->select('id')->from('agents')->where('statut', 'Retraité');
        })->update(['agent_id' => null]);
        $employe = Agent::orderBy('nom_Agent')->orderBy('prenom_Agent')->get();
        return view('employe', [
            'employes' => $employe
        ]);
    }

    // Afficher les informations d'un employé spécifique
    public function information($id)
    {
        $employe = Agent::find($id);
        $dateDebut = Carbon::parse($employe->date_prise_service);
        $dateActuelle = Carbon::now();
        $anneeTotal = collect(range($dateDebut->year, $dateActuelle->year + 1));

        $anneejouissance = $employe->conges()
            ->where('Type_conge', 'congé annuel')
            ->where('statut_conge', 'Accordé')
            ->pluck('Date_debut')
            ->map(function ($date) {
                return Carbon::parse($date)->year;
            })
            ->unique();

        $anneenonjouissance = $anneeTotal->diff($anneejouissance)->values();

        $sanctions = Sanction::with('agent')->get();

        $agentRetraite = Agent::whereDate('date_depart_retraite', '<=', now())
            ->where('statut', '!=', 'Retraité')
            ->update(['statut' => 'Retraité']);
        return view('info', [
            'employe' => $employe,
            'anneenonjouissance' => $anneenonjouissance,
        ]);
    }

    public function modifiersanction(Request $request, $id)
    {
        $validatedsanction = $request->validate([
            'santion' => 'required|string',
            'Date_sanction' => 'required|date'
        ]);
        $sanction = Sanction::find($id);
        $sanction->update($validatedsanction);
        return redirect()->route('liste');
    }

    public function ajoutersanction(Request $request, $id)
    {
        $validatedsanction = $request->validate([
            'santion' => 'required|string',
            'Date_sanction' => 'required|date'
        ]);
        $agent = Agent::find($id);
        $sanction = Sanction::create([
            'agent_id' => $agent->id,
            'santion' => $validatedsanction['santion'],
            'Date_sanction' => $validatedsanction['Date_sanction']
        ]);
        return redirect()->route('liste');
    }

    // Ajouter un nouvel employé
    public function forms(Request $request)
    {

        $validated = $request->validate([
            'nom_Agent' => 'required|string',
            'prenom_Agent' => 'required|string',
            'matricule_Agent' => 'required|string|unique:agents',
            'tel_Agent' => 'required|numeric',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string',
            'situation_matrimoniale' => 'required|string',
            'poste_id' => 'required|exists:postes,id',
            'date_prise_service' => 'required|date',
            'date_depart_retraite' => 'required|date',
            'num_affiliation_cnss' => 'required|numeric',
            'statut_Agent' => 'required|string',
            'categorie' => 'required|string|in:A,B,C,D',
            'classe' => 'required|string|in:1,2,3,4',
            'echelon' => 'required|string|in:1,2,3,4,5,6,7,8,9,10,11,12',
            'statut' => 'required|string',
            'photo_profil_Agent' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $agentData = $validated;
        unset($agentData['poste_id']);

        $agent = Agent::create($agentData);

        if ($request->hasFile('photo_profil_Agent')) {
            $photo = $request->file('photo_profil_Agent');
            $photoPath = $photo->store('photos', 'public');
            $agent->photo_profil_Agent = $photoPath;
            $agent->save();
        }

        // Associer le poste à l'agent
        $poste = Poste::find($validated['poste_id']);

        if ($poste->agent_id !== null) {
            return back()->withErrors(['poste_id' => 'Ce poste est déjà occupé.']);
        }

        $poste->agent_id = $agent->id;
        $poste->save();

        return redirect()->route('liste');
    }


    public function edit($id)
    {
        $employe = Agent::findOrFail($id);
        $posteId = $employe->poste ? $employe->poste->id : null;
        $postes = Poste::whereDoesntHave('agent')
            ->orWhere('id', $posteId)
            ->get();
        // dd(compact('employe'), $employe->id);
        return view('edit', compact('employe', 'postes'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_Agent' => 'required|string',
            'prenom_Agent' => 'required|string',
            'matricule_Agent' => 'required',
            'tel_Agent' => 'required|numeric',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string',
            'situation_matrimoniale' => 'required|string',
            'categorie' => 'required|string|in:A,B,C,D',
            'classe' => 'required|string|in:1,2,3,4',
            'echelon' => 'required|string|in:1,2,3,4,5,6,7,8,9,10,11,12',
            'poste_id' => 'required|exists:postes,id',
            'date_prise_service' => 'required|date',
            'date_depart_retraite' => 'required|date',
            'num_affiliation_cnss' => 'required|numeric',
            'statut_Agent' => 'required|string',
            'statut' => 'required|string',
            'photo_profil_Agent' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
        // $agent = Agents::whereId($id)->get();

        $agent = Agent::findOrFail($id);
        $agentData = collect($validatedData)->except('poste_id')->toArray();

        $agent->update($agentData);
        if ($request->hasFile('photo_profil_Agent')) {

            // Récupérer et enregistrer la nouvelle image
            $photo = $request->file('photo_profil_Agent');
            $photoPath = $photo->store('photos', 'public');
            $agent->photo_profil_Agent = $photoPath;
        }
        if ($agent->poste) {
            $agent->poste->agent_id = null;
            $agent->poste->save();
        }

        // Attribuer le nouveau poste
        $nouveauPoste = Poste::find($validatedData['poste_id']);
        $nouveauPoste->agent_id = $agent->id;
        $nouveauPoste->save();
        $agent->save();

        return redirect()->route('info', $id);
    }

    public function supprimer($id)
    {
        $employe = Agent::findOrFail($id);
        $employe->delete();
        return redirect()->route('liste')->with('success', 'Employé supprimé avec succès.');
    }

    // public function getAgentByMatricule($matricule_Agent)
    // {
    //     $agent = Agent::where('matricule_Agent', $matricule_Agent)->first();

    //     if ($agent) {
    //         return response()->json([
    //             'poste_Agent' => $agent->poste_Agent ?? ''
    //         ]);
    //     } else {
    //         return response()->json(['error' => 'Agent introuvable'], 404);
    //     }
    // }

    public function telechargerPDF($id)
    {
        $employe = Agent::findOrFail($id); // exemple
        $pdf = Pdf::loadView('pdfInfo', compact('employe'));
        return $pdf->download('fiche-agent.pdf');
    }

    public function exportRetraitesPdf()
    {
        $agents = Agent::where('statut', 'Retraité')->get();

        $pdf = Pdf::loadView('agentsretraitespdf', compact('agents'));
        return $pdf->download('agents-retraites.pdf');
    }

    public function listeRetraites()
    {
        $agents = Agent::where('statut', 'Retraité')->orderByRaw('YEAR(date_depart_retraite) DESC') // trie par année de retraite décroissante
            ->get();

        return view('agentsretraites', compact('agents'));
    }
    public function mettreRetraite($id)
    {
        $agent = Agent::findOrFail($id);

        // Changer le statut
        $agent->statut_Agent = 'Retraité';
        $agent->save();

        // Libérer le poste occupé
        if ($agent->poste) {
            $agent->poste->agent_id = null;
            $agent->poste->save();
        }

        return redirect()->route('agentRetraite')->with('success', 'Agent mis à la retraite et poste libéré.');
    }

    public function listeagent_actifs()
    {
        $agents = Agent::where('statut', 'Actif')->get();
        return view('agentsactifs', compact('agents'));
    }

    public function exportagent_actifsPdf()
    {
        $agents = Agent::where('statut', 'Actif')->get();

        $pdf = Pdf::loadView('agentsactifspdf', compact('agents'));
        return $pdf->download('agents-actifs.pdf');
    }

    public function listeagent_demissionaire()
    {
        $agents = Agent::where('statut', 'Demissionnaire')->get();
        return view('agentsdemissionaires', compact('agents'));
    }

    public function exportagent_demissionairePdf()
    {
        $agents = Agent::where('statut', 'Demissionnaire')->get();

        $pdf = Pdf::loadView('agentdemissionairespdf', compact('agents'));
        return $pdf->download('agents-demissionnaires.pdf');
    }

    public function listeagent_mutes()
    {
        $agents = Agent::where('statut', 'Muté')->get();
        return view('agentsmutes', compact('agents'));
    }

    public function exportagent_mutesPdf()
    {
        $agents = Agent::where('statut', 'Muté')->get();

        $pdf = Pdf::loadView('agentsmutespdf', compact('agents'));
        return $pdf->download('agents-mutés.pdf');
    }

    public function exportagent_Pdf()
    {
        $agents = Agent::orderBy('nom_Agent')->orderBy('prenom_Agent')->get();

        $pdf = Pdf::loadView('agentpdf', compact('agents'));
        return $pdf->download('agents.pdf');
    }

    public function tableauDeBord()
    {
        // 1. Récupère les agents qui doivent être mis à la retraite (statut pas encore 'Retraité')
        Agent::whereDate('date_depart_retraite', '<=', now())
            ->where('statut', '!=', 'Retraité')
            ->get();


        return view('site');
    }

    public function supprimes()
    {
        $agents = Agent::onlyTrashed()->get();
        return view('agentsupprimes', compact('agents'));
    }

    public function restaurer($id)
    {
        $agent = Agent::withTrashed()->findOrFail($id);
        $agent->restore();

        return redirect()->route('agents.supprimes')->with('success', 'Agent restauré avec succès.');
    }

    public function forceDelete($id)
    {
        $agent = Agent::withTrashed()->findOrFail($id);
        $agent->forceDelete();

        return redirect()->route('agents.supprimes')->with('success', 'Agent supprimé définitivement.');
    }

    public function genererAttestation_JouissancePdf($id)
    {
        $annee = Carbon::now()->year;
        $agent = Agent::findOrFail($id);
        $congeAnnuel = $agent->conges()
            ->where('Type_conge', 'congé annuel')
            ->where('statut_conge', 'Accordé')
            ->first();

        if ($congeAnnuel) {
            $pdf = Pdf::loadView('attestation_jouissancepdf', compact('congeAnnuel', 'agent', 'annee'));
            return $pdf->download('attestation_jouissance.pdf');
        } else {
            $pdf = Pdf::loadView('attestation_non_jouissancepdf', compact('congeAnnuel', 'agent', 'annee'));
            return $pdf->download('attestation_non_jouissance.pdf');
        }
    }

    // public function previewAttestation($id)
    // {
    //     $annee = now()->year;
    //     $agent = Agent::findOrFail($id);

    //     // Tu peux aussi simuler un congé pour tester le rendu
    //     $congeAnnuel = $agent->conges()->where('Type_conge', 'annuel')->first();

    //     // On renvoie la vue directement en HTML
    //     return view('attestation_non_jouissancepdf', compact('agent', 'annee', 'congeAnnuel'));
    // }

    public function genererAttestation_Non_JouissancePdf(Request $request, $id)
    {

        $agent = Agent::findOrFail($id);
        $anneesChoisies = $request->input('annees', []);
        $dateDebut = Carbon::parse($request->input('Date_debut'));
        $dateDebutInitiale = $dateDebut->copy();
        $dureeParAnnee = 30;
        $dureeTotale = count($anneesChoisies) * 30;
        // $datefinFinale = Carbon::parse($dateDebut)->addDays($dureeTotale - 1);

        // Durée de congé par année en jours

        foreach ($anneesChoisies as $annee) {
            $datefin = $dateDebut->copy()->addDays($dureeParAnnee - 1);

            $conge = Conge::create([
                'agent_id' => $agent->id,
                'Type_conge' => 'congé annuel',
                'Date_debut' => $dateDebut,
                'Date_fin' => $datefin,
                'statut_conge' => 'Accordé'
            ]);
            $conge->agents()->attach($agent->id);
            // Décaler la date de début pour la prochaine année si nécessaire
            $dateDebut = $datefin->copy()->addDay();
            $dernierDateFin = $datefin;
        }

        $pdf = Pdf::loadView('attestation_non_jouissancepdf', [
            'agent' => $agent,
            'anneesChoisies' => $anneesChoisies,
            'dureeTotale' => $dureeTotale,
            'dateDebut' => $dateDebutInitiale,
            'datefin' => $dernierDateFin
        ]);
        return $pdf->download('attestation_non_jouissance.pdf');
    }
}
