<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Role_Permission;
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
        Permission::create(array('permission' => 'Administrator'));
        Role::create(array('priority' => 1, 'name' => 'Guest', 'hexcolor' => 'lightgrey'));
        Role::create(array('priority' => 99, 'name' => 'Admin', 'hexcolor' => 'Red'));
        Role_Permission::create(array('role_id' => 2, 'permission_id' => 1));
    }
}
