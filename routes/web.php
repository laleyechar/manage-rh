<?php

use App\Models\User;
use App\Models\Agent;
use Spatie\Permission\Models\Role;
use App\Http\Middleware\LogActivity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RechercheController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//auth route

Route::get('/', function () {
    return view('accueil');
});

Route::get('/register', function () {
    $adminRole = Role::where('name', 'admin')->first();
    $adminExists = $adminRole && User::whereHas('roles', function ($q) {
        $q->where('name', 'admin');
    })->exists();

    if ($adminExists) {
        abort(403, 'Enregistrement désactivé. Un administrateur existe déjà.');
    }

    return view('register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


Route::get('/login', [AuthController::class, 'log'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/get-agent-by-matricule/{matricule}', function ($matricule) {
    $agent = Agent::where('matricule_Agent', $matricule)->with('poste')->first();

    if ($agent) {
        return response()->json([
            'poste' => $agent->poste ? [
                'id' => $agent->poste->id,
                'libelle_poste' => $agent->poste->libelle_poste,
                'description_poste' => $agent->poste->description_poste,
                // ajoute d'autres champs si besoin
            ] : null,
            'agent' => [
                'nom_Agent' => $agent->nom_Agent,
                'prenom_Agent' => $agent->prenom_Agent,
                // autres infos agent si besoin
            ],
        ]);
    } else {
        return response()->json(['error' => 'Agent introuvable'], 404);
    }
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'afficherProfil'])->name('afficherProfil');
});


Route::get('/api/evenements', [CongeController::class, 'congeValide'])->middleware('auth');

Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('modifier.motdepasse');


Route::middleware(['LogActivity'])->group(function () {
    Route::get('/Tableau-de-Bord', [DashboardController::class, 'site'])->name('site')->middleware('auth');

    Route::get('/Personnel', [EmployeeController::class, 'TheList'])->name('liste')->middleware('auth');
    Route::get('Personnel/CreerAgent', [EmployeeController::class, 'formulaire'])->name('formulaire')->middleware('auth');
    Route::post('Personnel/CreerAgent', [EmployeeController::class, 'forms'])->name('formulaire.post')->middleware('auth');
    Route::get('Personnel/{id}', [EmployeeController::class, 'information'])->name('info')->middleware('auth');
    Route::get('/Personnel/{id}/edit', [EmployeeController::class, 'edit'])->name('personnel.edit')->middleware('auth');
    Route::patch('/Personnel/{id}', [EmployeeController::class, 'update'])->name('personnel.update')->middleware('auth');
    Route::delete('/Personnel/{id}/delete', [EmployeeController::class, 'supprimer'])->name('personnel.delete')->middleware('auth');
    Route::get('/Personnel/{id}/pdf', [EmployeeController::class, 'telechargerPDF'])->name('agent.pdf')->middleware('auth');
    Route::post('Personnel/Ajouter_Sanction/{id}', [EmployeeController::class, 'ajoutersanction'])->name('ajoutersanction');
    Route::patch('Personnel/Mofifier_Sanction/{id}', [EmployeeController::class, 'modifiersanction'])->name('modifiersanction');


    Route::get('/Formations', [FormationController::class, 'LesFormations'])->name('formations')->middleware('auth');
    Route::post('/Formations/CreerFormation', [FormationController::class, 'creer_Formation'])->name('create.formation')->middleware('auth');
    Route::put('/Formation/{id}', [FormationController::class, 'updateFormation'])->name('Formation.update')->middleware('auth');
    Route::delete('/Formation/{id}', [FormationController::class, 'deleteFormation'])->name('Formation.delete')->middleware('auth');
    Route::get('formation/{id}/afficher-attestation', [FormationController::class, 'afficherAttestation'])->name('formation.attestation')->middleware('auth');

    Route::get('/Promotions', [PromotionController::class, 'LesPromo'])->name('promotions')->middleware('auth');
    Route::post('/Promotions', [PromotionController::class, 'creer_promo'])->name('create.promo')->middleware('auth');
    Route::patch('Promo/{id}', [PromotionController::class, 'modifierPromo'])->name('modifier.promo')->middleware('auth');
    Route::delete('Promotions/{id}', [PromotionController::class, 'supprimerPromo'])->name('supprimer.promo')->middleware('auth');

    Route::get('/Conges', [CongeController::class, 'conge'])->name('Conges')->middleware('auth');
    Route::post('/Conges', [CongeController::class, 'creerConge'])->name('creerConge')->middleware('auth');
    Route::patch('/Conge/{conge}/statut/{action}', [CongeController::class, 'changer_statutConge'])->name('conge.changer-statut')->middleware('auth');
    Route::delete('/Conges/supprimer/{id}', [CongeController::class, 'supprimerConge'])->name('delete.conge')->middleware('auth');


    // Route::get('/get-agent-by-matricule/{matricule_Agent}', [EmployeeController::class, 'getAgentByMatricule'])->middleware('auth');


    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::put('/admin/users/{id}', [UserController::class, 'modifierUser'])->name('admin.users.modiier');
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('/agents/supprimes', [EmployeeController::class, 'supprimes'])->name('agents.supprimes');
        Route::post('/agents/{id}/restaurer', [EmployeeController::class, 'restaurer'])->name('agents.restaurer');
        Route::delete('/agents/{id}/force-delete', [EmployeeController::class, 'forceDelete'])->name('agents.forceDelete');
        Route::post('/agent/{id}/retraite', [EmployeeController::class, 'mettreRetraite'])->name('agent.retraite');
    });

    Route::get('/Service', [ServiceController::class, 'index'])->name('Services')->middleware('auth');
    Route::post('/Service/creerService', [ServiceController::class, 'creerService'])->name('creerService')->middleware('auth');
    Route::delete('/Service/supprimer/{id}', [ServiceController::class, 'supprimerService'])->name('delete.Service')->middleware('auth');
    Route::patch('/Service/modifier/{id}', [ServiceController::class, 'modifierService'])->name('modifier.Service')->middleware('auth');
    Route::get('/services/{service}/postes', [ServiceController::class, 'showPostes'])->name('services.postes');

    Route::get('/Poste', [PosteController::class, 'index'])->name('Poste')->middleware('auth');
    Route::post('/Poste/creerPoste', [PosteController::class, 'creerPoste'])->name('creerPoste')->middleware('auth');
    Route::delete('/Poste/supprimer/{id}', [PosteController::class, 'supprimerPoste'])->name('delete.Poste')->middleware('auth');
    Route::patch('/Poste/modifier/{id}', [PosteController::class, 'modifierForm'])->name('modifier.Poste')->middleware('auth');


    Route::get('/recherche-global', [RechercheController::class, 'rechercheGlobal'])->name('search')->middleware('auth');
    Route::get('/Agents_Retraite', [EmployeeController::class, 'listeRetraites'])->name('agentRetraite');
    Route::get('/agents/retraites/pdf', [EmployeeController::class, 'exportRetraitesPdf'])->name('agents.retraites.pdf');
    Route::get('/Agents_Actifs', [EmployeeController::class, 'listeagent_actifs'])->name('agentActif');
    Route::get('/agents/actifs/pdf', [EmployeeController::class, 'exportagent_actifsPdf'])->name('agents.actifs.pdf');
    Route::get('/Agents_Demissionaire', [EmployeeController::class, 'listeagent_demissionaire'])->name('agentDemissionaire');
    Route::get('/agents/Demissionaire/pdf', [EmployeeController::class, 'exportagent_demissionairePdf'])->name('agents.demissionaire.pdf');
    Route::get('/Agents_Mutes', [EmployeeController::class, 'listeagent_mutes'])->name('agentmutes');
    Route::get('/agents/Mutes/pdf', [EmployeeController::class, 'exportagent_mutesPdf'])->name('agents.mutes.pdf');
    Route::get('/agents/pdf', [EmployeeController::class, 'exportagent_Pdf'])->name('agents.pdf');

    Route::get('/Attestation_Jouissance_Conge/pdf/{id}', [EmployeeController::class, 'genererAttestation_JouissancePdf'])->name('attestation.jouissance.pdf')->middleware('auth');
    Route::get('/preview/attestation/{id}', [EmployeeController::class, 'previewAttestation'])
        ->name('attestation.preview')
        ->middleware('auth');

    Route::get('/Fichier', [FichierController::class, 'afficherFichier'])->name('afficher.fichier')->middleware('auth');
    Route::post('/Fichier', [FichierController::class, 'ajouterFichier'])->name('ajouterFichier')->middleware('auth');
    Route::get('/AfficherFichier/{id}', [FichierController::class, 'showFichier'])->name('afficherfichier')->middleware('auth');
    Route::patch('/Fichier/{id}', [FichierController::class, 'updateFichier'])->name('fichier.update')->middleware('auth');
    Route::delete('/Fichier/{id}', [FichierController::class, 'deleteFichier'])->name('fichier.delete')->middleware('auth');

    Route::get('/AjouterGrade/{id}', [GradeController::class, 'changergrade'])->name('ajouter.grade')->middleware('auth');
    Route::post('/AjouterGrade/{id}', [GradeController::class, 'ajoutergrade'])->name('changer.grade')->middleware('auth');
});
Route::get('/activity-log', [ActivityController::class, 'showActivityLog'])->name('journal');
