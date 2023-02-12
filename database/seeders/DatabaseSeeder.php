<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

/*         \App\Models\User::factory()->create([
 *             'name' => 'admin',
 *             'email' => 'admin@mail.com',
 *             'password' => '$2y$10$FiS003j4RoCts8ndVnAM6ewVleP/gCY8GJBQlBTtHU/AUhmixTOLa ',
 *         ]);
 *  */
        DB::table('user')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => '$2y$10$FiS003j4RoCts8ndVnAM6ewVleP/gCY8GJBQlBTtHU/AUhmixTOLa ',
            ],
        );

        $this->call([
            ProductSeeder::class
        ]);
    }
}
