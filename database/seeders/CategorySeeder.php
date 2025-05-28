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
            'color' => 'bg-emerald-100',
        ]);

        Category::create([
            'name' => 'Web Development',
            'color' => 'bg-sky-100',
        ]);

        Category::create([
            'name' => 'Data Science',
            'color' => 'bg-violet-100',
        ]);

        // Category::factory(7)->create();
    }
}
