<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;
use App\Models\Role_permission;
use App\Models\Permessions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         $permissionsCount = Permessions::count();

        $role=new Role();
        $role->name='Super Admin';
        $role->save();
        $i=1;
       while($i<= $permissionsCount){
            $role->belongsToMany(Permessions::class, 'role_permissions', 'id_role', 'id_permissions')->attach($i);
            $i=$i+1;
        }

         User::create([
            'name' => 'Super Admin',
            'email' => 'a@a.com',
            'password' => bcrypt('123'), 
            'id_role' => '1', 
        ]);
    }
}
