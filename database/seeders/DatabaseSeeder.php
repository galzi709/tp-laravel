<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 🔹 Création d'un utilisateur test
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 🔹 Ajout des types (OBLIGATOIRE pour ton TP)
        Type::create(['name' => 'Tutoriel']);
        Type::create(['name' => 'Actualité']);
        Type::create(['name' => 'Opinion']);
    }
}