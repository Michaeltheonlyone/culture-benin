<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'comlanmaurice@gmail.com')->exists()) {
            User::create([
                'nom' => 'Comlan',
                'prenom' => 'Maurice',
                'email' => 'comlanmaurice@gmail.com',
                'password' => Hash::make('password'), 
                'id_role' => 2, 
                'sexe' => 'M',
            ]);
        }    
    }
}
