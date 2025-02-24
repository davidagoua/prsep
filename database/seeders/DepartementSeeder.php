<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\Ptba;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departements = [
            'Abidjan','Abengourou','Bouafle','Bouake','Danane','Daloa'
        ];
        $type_ptba = [
            'Initial',
            'Arbitré',
            'Définitif',
        ];

        foreach ($departements as $departement) {
            $dpt = Departement::create(['nom' => $departement]);
            /*
            foreach ($type_ptba as $type) {
                Ptba::create([
                    'departement_id' => $dpt->id,
                    'type' => $type,
                ]);
            }
            */
            $role = Role::query()->firstOrCreate([
                'name'=>'DeptUser'
            ]);
            $user = User::create([
               'name' => 'user_'.str($departement)->lower(),
                'email'=>'user_'.str($departement)->lower().'@mail.com',
                'password'=>'password',
                'departement_id' => $dpt->id,
            ]);
            $user->assignRole('DeptUser');
        }
    }
}
