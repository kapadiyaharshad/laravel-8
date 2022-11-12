<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Administrator'],
            ['name' => 'Subscriber'],
            ['name' => 'Editor'],
            ['name' => 'Author']
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
