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
        $this->call(NflConferencesTableSeeder::class);
        $this->call(NflDivisionsTableSeeder::class);
        $this->call(NflTeamsTableSeeder::class);
        $this->call(PermissionsRolesTableSeeder::class);
    }
}
