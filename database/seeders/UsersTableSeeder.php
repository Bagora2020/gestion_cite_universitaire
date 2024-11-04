<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\hash;
use App\models\User;
use App\models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $admin = User::Create([
            'name'=>'administrateur',
            'email'=>'Admin@admin.com',
            'password'=>hash::make('password')
        ]);


        $Directeur = User::Create([
            'name'=>'Talla',
            'email'=>'superviseur@superviseur.com',
            'password'=>hash::make('password')
        ]);


        $CSA = User::Create([
            'name'=>'Sidou',
            'email'=>'auteur@auteur.com',
            'password'=>hash::make('password')
        ]);

        $ChefdePavillon = User::Create([
            'name'=>'Gora',
            'email'=>'editeur@editeur.com',
            'password'=>hash::make('password')
        ]);


        $adminRole = Role::where('name', 'administrateur')->first();
        $DirecteurRole = Role::where('name', 'Directeur')->first();
        $CSARole = Role::where('name', 'CSA')->first();
        $ChefdePavillonRole = Role::where('name', 'Chef de Pavillon')->first();

        $admin->roles()->attach($adminRole);
        $Directeur->roles()->attach($DirecteurRole);
        $CSA->roles()->attach($CSARole);
        $ChefdePavillon->roles()->attach($ChefdePavillonRole);
    }
}
