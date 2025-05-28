<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'UI/UX',
            'color' => '#9EBC8A',
        ]);

        Category::create([
            'name' => 'Web Development',
            'color' => '#90D1CA',
        ]);

        Category::create([
            'name' => 'Data Science',
            'color' => '#9B7EBD',
        ]);

        // Category::factory(7)->create();
    }
}
