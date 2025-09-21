<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Conge;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CongeController extends Controller
{
    public function conge()
    {
        // $conges = Conge::orderBy('created_at', 'desc')->get();
        $conges = Conge::orderByRaw("
                CASE statut_conge
                    When 'En attente' THEN 1 
                    ELSE 2
                END ASC
            ")
            ->orderBy('created_at', 'desc')
            ->get();
        return view('conge', [
            'conges' => $conges
        ]);
    }

    public function creerConge(Request $request)
    {

        $validated = $request->validate([
            'matricule_Agent' => 'required|exists:agents,matricule_Agent',
            'Type_conge' => 'required|string',
            'Date_debut' => 'required|date',
            'Date_fin' => 'required|date|after:Date_debut',
            'statut_conge' => 'nullable|string',
            'motif' => 'required_if:Type_conge,autorisation_speciale|string|nullable',
        ]);
        $agent = Agent::where('matricule_Agent', $validated['matricule_Agent'])->firstOrfail();
        $dateEntree = Carbon::parse($agent->date_prise_service)->startOfDay();
        $dateDebut = Carbon::parse($validated['Date_debut'])->startOfDay();
        $dateFinReq = Carbon::parse($validated['Date_fin'])->startOfDay();

        if ($dateDebut->lt($dateEntree)) {
            return back()->withErrors([
                'Date_debut' => "La date de début ne peut-être antérieure à la date de prise de service  ({$dateEntree->format('d/m/y')})."
            ])->withInput();
        }

        if ($validated['Type_conge'] === 'congé annuel' && $dateDebut->lt($dateEntree->copy()->addYear())) {
            return back()->withErrors([
                'Type_conge' => "L'agent n'a pas encore un an d'ancienneté (congé éligible à partir du  {$dateEntree->copy()->addYear()->format('d/m/y')}).",
            ])->withInput();
        }

        $nbAnnees = $dateEntree->diffInDays($dateDebut);
        $periodeDebut = $dateEntree->copy()->addYear($nbAnnees);
        $periodeFin = $periodeDebut->copy()->addYear()->subDay();

        if ($validated['Type_conge'] === 'congé annuel') {
            $dejaAnnuel = $agent->conges()
                ->where('Type_conge', 'congé annuel')
                ->whereBetween('Date_debut', [$periodeDebut->toDateString(), $periodeFin->toDateString()])
                ->exists();
            if ($dejaAnnuel) {
                return back()->withErrors([
                    'Type_conge' => "L'agent a déjà pris un congé annuel pour la periode du {$periodeDebut->format('d/m/y')} au {$periodeFin->format('d/m/y')}"
                ])->withInput();
            }
        }

        $joursSpeciaux = $agent->conges()
            ->whereIn('Type_conge', [
                'autorisation_speciale',
                'conge pour examen ou concours',
                'congé de convalescence'
            ])
            ->whereIn('statut_conge', ['Accordé'])
            ->whereBetween('Date_debut', [$periodeDebut->toDateString(), $periodeFin->toDateString()])
            ->get()
            ->sum(function ($c) {
                return Carbon::parse($c->Date_fin)->diffInDays(Carbon::parse($c->Date_debut)) + 1;
            });
        $joursDeduits = max(0, $joursSpeciaux - 10);
        $droitAnnuelDisponible = 30 - $joursDeduits;

        $dureeDemande = $dateFinReq->diffInDays($dateDebut) + 1;
        if ($validated['Type_conge'] === 'congé annuel' && $dureeDemande > $droitAnnuelDisponible) {
            return back()->withErrors([
                'Date_fin' => "L'agent n'a droit qu'à {$droitAnnuelDisponible} jours de congé annuel sur la période du {$periodeDebut->format('d/m/y')} au {$periodeFin->format('d/m/y')}.",
            ])->withInput();
        }

        $conge = Conge::create([
            'Type_conge' => $validated['Type_conge'],
            'Date_debut' => $validated['Date_debut'],
            'Date_fin'   => $validated['Date_fin'],
            'statut_conge' => $validated['statut_conge'] ?? 'En attente',
            'motif'        => $validated['motif'] ?? null
        ]);

        $conge->agents()->attach($agent->id);
        return redirect()->route('Conges')->with('Succès', 'Congé enregistré avec succès');
    }

    public function changer_statutConge($id, $action)
    {
        $conge = Conge::findOrFail($id);

        if (!in_array($action, ['Accordé', 'Refusé'])) {
            return back()->with('error', 'Action invalide.');
        }

        $conge->statut_conge = $action;
        $conge->save();

        return back()->with('success', "Le congé a été " . $conge->statut_conge . ".");
    }

    public function supprimerConge($id)
    {
        $conge = Conge::findOrFail($id);
        $conge->delete();
        return redirect()->route('Conges')->with('success', 'Employé supprimé avec succès.');
    }
}
