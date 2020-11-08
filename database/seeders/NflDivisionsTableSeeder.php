<?php

namespace Database\Seeders;

use App\Models\NFL\NflDivision;
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
        NflDivision::create([
            'nfl_conference_id' => 1,
            'title' => 'Eastern Division',
            'alias' => 'AFC East',
            'slug' => 'afc-east',
        ]);

        NflDivision::create([
            'nfl_conference_id' => 1,
            'title' => 'Northern Division',
            'alias' => 'AFC North',
            'slug' => 'afc-north',
        ]);

        NflDivision::create([
            'nfl_conference_id' => 1,
            'title' => 'Southern Division',
            'alias' => 'AFC South',
            'slug' => 'afc-south',
        ]);

        NflDivision::create([
            'nfl_conference_id' => 1,
            'title' => 'Western Division',
            'alias' => 'AFC West',
            'slug' => 'afc-west',
        ]);

        NflDivision::create([
            'nfl_conference_id' => 2,
            'title' => 'Eastern Division',
            'alias' => 'NFC East',
            'slug' => 'nfc-east',
        ]);

        NflDivision::create([
            'nfl_conference_id' => 2,
            'title' => 'Northern Division',
            'alias' => 'NFC North',
            'slug' => 'nfc-north',
        ]);

        NflDivision::create([
            'nfl_conference_id' => 2,
            'title' => 'Southern Division',
            'alias' => 'NFC South',
            'slug' => 'nfc-south',
        ]);

        NflDivision::create([
            'nfl_conference_id' => 2,
            'title' => 'Western Division',
            'alias' => 'NFC West',
            'slug' => 'nfc-west',
        ]);
    }
}
