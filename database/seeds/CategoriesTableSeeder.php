<?php

use App\Category;
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
        Category::create([
            'name' => 'High Tech',
            'slug' => 'je sais quoi'
            ]);

        Category::create([
            'name' => 'Q.5',
            'slug' => 'wesh'
            ]);
        Category::create([
            'name' => 'Q.6',
            'slug' => 'grave vraiment'
            ]);
        Category::create([
            'name' => 'Livre',
            'slug' => 'locdst'
        ]);
        Category::create([
            'name' => 'Meuble',
            'slug' => 'bleblq'
            ]);
    }
}
