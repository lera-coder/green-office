<?php

namespace Database\Seeders;

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
//         \App\Models\Photo::factory(10)->create();
        $this->call([
            StatusSeeder::class,
            PhotoSeeder::class,
            ClientSeeder::class,
            CategorySeeder::class,
            PoolSeeder::class,
            PortfolioPhotoSeeder::class,
            UserSeeder::class,

        ]);
    }
}
