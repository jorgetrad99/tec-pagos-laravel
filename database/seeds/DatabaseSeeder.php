<?php

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
        // $this->call(UsersTableSeeder::class);

        App\User::create([
            'name' => 'Jorge Trad',
            'email' => 'i@admin.com',
            'password' => bcrypt('123456')
        ]);

        factory(App\Service::class, 50)->create();
    }
}
