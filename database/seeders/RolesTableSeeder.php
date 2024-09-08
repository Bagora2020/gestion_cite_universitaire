<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();

        Role::create(['name'=>'administrateur']);
        Role::create(['name'=>'Superviseur']);
        Role::create(['name'=>'Auteur']);
        Role::create(['name'=>'Editeur']);
    }
    
}
