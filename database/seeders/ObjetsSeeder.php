<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Objet;
class ObjetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objets = [
            ['nom' => 'Problème de Ampoule 1.20'],
            ['nom' => 'Problème de Ampoule 0.60'],
            ['nom' => 'Problème de contact'],
        ];

        foreach ($objets as $objet) {
            Objet::create($objet);
        }
    }
}
