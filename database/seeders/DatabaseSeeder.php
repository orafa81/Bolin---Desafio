<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Confectionery::factory(5)
            ->has(
                \App\Models\Product::factory()
                    ->count(10)
                    ->has(\App\Models\ImageProduct::factory()->count(3), 'imagens'),
                'produtos'
            )
            ->create();
    }
}
