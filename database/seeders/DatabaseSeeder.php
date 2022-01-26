<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\Role_Permission;
use App\Models\level;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(array('name' => 'Mart', 'password' => '$2y$10$EO5yNCR3WgSfNPJ1OiOtGeRxDEOdRNL0yWIqkMQOfcJwhTNk23Lha', 'role_id' => 2, 'email' => 'belikemart@gmail.com'));
        Permission::create(array('permission' => 'administrator'));
        Permission::create(array('permission' => 'edit users'));
        Permission::create(array('permission' => 'edit roles'));
        Permission::create(array('permission' => 'manage users'));
        Permission::create(array('permission' => 'manage roles'));
        Permission::create(array('permission' => 'game admin'));

        Role::create(array('priority' => 1, 'name' => 'Guest', 'hexcolor' => 'lightgrey'));
        Role::create(array('priority' => 99, 'name' => 'Admin', 'hexcolor' => 'Red'));
        for ($i = 1; $i < 51; $i++) {
            $timestamps = false;
            level::create(array('level' => $i, 'experience' => ($i*45) * $i ));
        }
    }
}
