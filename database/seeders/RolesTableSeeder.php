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
        Role::create(['name'=>'Directeur']);
        Role::create(['name'=>'CSA']);
        Role::create(['name'=>'Chef de Pavillon']);
        Role::create(['name'=>'Chef de Division Cité Universitaire']);
        Role::create(['name'=>'Chef de Service Entretien et construction']);
        Role::create(['name'=>'Chef de Division Entretien et construction']);
    }
    
}
