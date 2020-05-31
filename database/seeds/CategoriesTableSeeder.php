<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            'for' => 'post',
            'parent' => 0,
        ]);
        App\Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            'for' => 'product',
            'parent' => 0,
        ]);
        //protected $fillable = ['name', 'slug', 'for', 'thumbnail', 'banner'];
    }
}
