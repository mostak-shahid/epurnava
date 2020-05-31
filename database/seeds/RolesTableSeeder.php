<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        App\Role::create([
            'name' => 'Super Admin',
        ]);
        App\Role::create([
            'name' => 'Administrator',
        ]);
        App\Role::create([
            'name' => 'Editor',
        ]);
        App\Role::create([
            'name' => 'Author',
        ]);
        App\Role::create([
            'name' => 'Contributor',
        ]);
        App\Role::create([
            'name' => 'Subscriber',
        ]);
    }
}
