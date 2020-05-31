<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Profile::create([
            'user_id' => 1,
            'option' => 'first_name',
            'value' => 'Md Mostak'
        ]);
        App\Profile::create([
            'user_id' => 1,
            'option' => 'last_name',
            'value' => 'Shahid'
        ]);
    }
}
