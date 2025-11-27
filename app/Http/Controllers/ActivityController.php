<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Journal;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
      // Affiche les utilisateurs
    public function showForm()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('journal', compact('users'));
    }

    // Affiche le journal des activités
    public function showActivityLog()
    {
        // Récupérer les logs d'activité, triés par date
        $activityLogs = Journal::with('user.agent')->orderBy('created_at', 'desc')->get();
        
        // Passer les logs à la vue 'journal'
        return view('journal', compact('activityLogs'));
    }

}
