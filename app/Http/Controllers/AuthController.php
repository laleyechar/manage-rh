<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function log(): View
    {
        return view('login');
    }
    public function registre(): View
    {
        return view('register');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        
            $user = Auth::user();
        
            // Si le mot de passe n'a pas été changé et que ce n'est pas un admin, forcer la modification
            if (!$user->password_changed && !$user->hasRole('admin')) {
                return redirect()->route('password.change');
            }
        
            return redirect()->route('site');
        }

        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas.',
        ]);
        return view('site');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nom_complet' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
        ]);
        dd($validated);
        $user = User::create([
            'nom_complet' => $validated['nom_complet'],
            'email' => $validated['email'],
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('admin'); // Premier compte = admin
        Auth::login($user);
        return redirect('/admin/users');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showChangePasswordForm()
    {
        return view('modifierMotDePasse');
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
