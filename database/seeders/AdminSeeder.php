<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Créer le rôle admin si il n'existe pas
        $role = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        // Créer l'utilisateur admin
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'nom_complet' => 'Admin Test',
                'password' => Hash::make('Password123'), // mot de passe sûr
            ]
        );

        // Assigner le rôle
        if (!$user->hasRole('admin')) {
            $user->assignRole('admin');
        }
    }
}
