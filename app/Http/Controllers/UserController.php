<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\ValidatedData;

class UserController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('index', compact('users'));
    }

    // Afficher le formulaire de création d'utilisateur
    public function create()
    {
        $roles = Role::all(); // Récupère tous les rôles
        return view('create', compact('roles'));
    }

    // Créer un nouvel utilisateur
    public function store(Request $request)
    {
        dd($request->only('nom', 'prenom'));

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
            'role' => 'required|exists:roles,name', // Vérifie que le rôle existe
        ]);
    

        $agent = Agent::whereRaw('TRIM(LOWER(nom_Agent))=?', $request->nom)
            ->whereRaw('TRIM(LOWER(prenom_Agent))=?', $request->prenom)
            ->first();

        // Créer un nouvel utilisateur
        $user = User::create([
            'agent_id' => $agent->id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_changed' => false,
        ]);


        // Assigner un rôle à l'utilisateur
        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')->with('status', 'Utilisateur créé avec succès.');
    }
    public function modifierUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string',
            'password' => [
                'nullable', // Le mot de passe peut être vide (non modifié)
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'confirmed' // Vérifie que `password_confirmation` est identique
            ],
        ]);

        $user = User::findOrFail($id);

        // Mise à jour des infos de base
        $user->nom = $validatedData['nom'];
        $user->prenom = $validatedData['prenom'];
        $user->email = $validatedData['email'];

        // Si un mot de passe est fourni, on le hash et on met à jour
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
            $user->password_changed = false;
        }

        // Mise à jour du rôle
        $user->syncRoles($validatedData['role']);

        $user->save(); // Sauvegarder les changements
        if (config('session.driver') === 'database') {
            DB::table('sessions')->where('user_id', $user->id)->delete();
        }

        return redirect()->route('admin.users.index')->with('status', 'Utilisateur modifié avec succès.');
    }

    // Supprimer un utilisateur
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('status', 'Utilisateur supprimé avec succès.');
    }

    public function handle($request, Closure $next)
    {
        if (Auth::user()->hasRole('admin') && !in_array($request->route()->getName(), ['admin.users.index', 'admin.users.create', 'admin.users.store', 'admin.users.destroy'])) {
            return redirect()->route('admin.users.index');
        }

        return $next($request);
    }

    public function afficherProfil()
    {
        $user = Auth::user()->load('agent');  // Récupère l'utilisateur connecté
        $agent = $user->agent;
        return view('afficherProfil', [
            'user' => $user,
            'agent' => $user->agent
        ]);
    }

    public function changePassword(Request $request)
    {
        // Validation du mot de passe
        $request->validate([
            'new_password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ], // Confirmation du mot de passe
        ]);

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si l'utilisateur existe
        if (!$user) {
            return redirect()->route('login')->with('error', 'Utilisateur non authentifié.');
        }

        // Mettre à jour le mot de passe de l'utilisateur
        $user->update([
            'password' => Hash::make($request->new_password),
            'password_changed' => true,  // Si tu veux ajouter cette logique pour suivre que le mot de passe a été changé
        ]);

        // Se déconnecter de l'utilisateur
        Auth::logout();

        // Invalider la session et régénérer le token pour la sécurité
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Rediriger vers la page de connexion pour qu'il se reconnecte
        return redirect()->route('login')->with('success', 'Votre mot de passe a été modifié avec succès. Veuillez vous reconnecter.');
    }
}
