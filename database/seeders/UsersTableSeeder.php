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


        $superviseur = User::Create([
            'name'=>'Talla',
            'email'=>'superviseur@superviseur.com',
            'password'=>hash::make('password')
        ]);


        $auteur = User::Create([
            'name'=>'Sidou',
            'email'=>'auteur@auteur.com',
            'password'=>hash::make('password')
        ]);

        $editeur = User::Create([
            'name'=>'Gora',
            'email'=>'editeur@editeur.com',
            'password'=>hash::make('password')
        ]);


        $adminRole = Role::where('name', 'administrateur')->first();
        $SuperviseurRole = Role::where('name', 'superviseur')->first();
        $AuteurRole = Role::where('name', 'auteur')->first();
        $EditeurRole = Role::where('name', 'editeur')->first();

        $admin->roles()->attach($adminRole);
        $superviseur->roles()->attach($SuperviseurRole);
        $auteur->roles()->attach($AuteurRole);
        $editeur->roles()->attach($EditeurRole);
    }
}
