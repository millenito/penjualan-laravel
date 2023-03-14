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
        $role = app(config('laravolt.epicentrum.models.role'))->whereHas('permissions', function ($permissions) {
            $permissions->whereName('*');
        })->first();

        if (!$role) {
            $role = app(config('laravolt.epicentrum.models.role'))->firstOrCreate(['name' => 'admin']);
            $role->syncPermission(['*']);
        }

        $user = app(config('laravolt.epicentrum.models.user'))->updateOrCreate(
            [
                'email' => 'admin@mail.com',
            ],
            [
                'name' => 'admin',
                'password' => bcrypt('password'),
                'status' => 'ACTIVE',
                'timezone'  => config('app.timezone'),
            ]
        );

        $user->markEmailAsVerified();
        $user->assignRole($role);

        $this->call([
            ProductSeeder::class
        ]);
    }
}
