<?php

use App\Models\NFL\NflConference;
use Illuminate\Database\Seeder;

class NflDivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NflConference::create([
            'title' => 'American Football Conference',
            'alias' => 'AFC',
            'slug' => 'afc',
        ]);

        NflConference::create([
            'title' => 'National Football Conference',
            'alias' => 'NFC',
            'slug' => 'nfc',
        ]);
    }
}
