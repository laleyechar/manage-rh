<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Conge;
use App\Models\Absence;
use App\Models\Formation;
use App\Models\Promotion;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Afficher la page principale
    public function site()
    {
        $agents = Agent::all();  // Ou vous pouvez personnaliser la requête pour filtrer

        // Récupérer tous les congés en attente
        $conges = Conge::where('statut_conge', 'en attente')->with('agents')->get();

        $nombreCongeEnAttente = Conge::where('statut_conge', 'En attente')->count();

        $promotions = Promotion::all();
        // Récupérer toutes les formations
        $formations = Formation::all();

        $absences = Absence::where('statut_absence', 'en attente')->get();
        $nombreAbsenceEnAttente = Absence::where('statut_absence', 'En attente')->count();

        $nombretotal = $nombreAbsenceEnAttente + $nombreCongeEnAttente;
        // Passer ces données à la vue
        

        $employe = Agent::all();
        $alertes = [];
    
        // Vérifie pour chaque agent la prochaine montée de grade
        foreach ($employe as $agent) {
            $prochaine = $agent->prochaineMonteeGrade();
            
            // Si une prochaine montée de grade existe, l'ajouter à la liste des alertes
            if ($prochaine) {
                $alertes[] = [
                    'id' => $agent->id,
                    'nom' => $agent->nom_Agent . ' ' . $agent->prenom_Agent,
                    'date' => $prochaine->format('d/m/Y'),
                ];
            }
        }
    
        // Envoie la variable $alertes à la vue
        

        return view('site', compact('agents', 'conges', 'formations', 'absences', 'nombretotal', 'promotions', 'alertes'));
    }
    // Récupère tous les agents
           

}
