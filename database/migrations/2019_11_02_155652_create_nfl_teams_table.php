<?php

use App\Models\NFL\NflTeam;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateNflTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfl_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nfl_division_id')->unsigned();
            $table->string('title');
            $table->string('name');
            $table->string('slug', 3)->unique();
            $table->timestamps();

            $table->foreign('nfl_division_id')->references('id')->on('nfl_divisions')->onDelete('cascade');
        });

        NflTeam::create([
            'nfl_division_id' => 1,
            'title' => 'Buffalo',
            'name' => 'Bills',
            'slug' => 'BUF',
        ]);

        NflTeam::create([
            'nfl_division_id' => 1,
            'title' => 'Miami',
            'name' => 'Dolphins',
            'slug' => 'MIA',
        ]);

        NflTeam::create([
            'nfl_division_id' => 1,
            'title' => 'New England',
            'name' => 'Patriots',
            'slug' => 'NE',
        ]);

        NflTeam::create([
            'nfl_division_id' => 1,
            'title' => 'New York',
            'name' => 'Jets',
            'slug' => 'NYJ',
        ]);

        NflTeam::create([
            'nfl_division_id' => 2,
            'title' => 'Balitmore',
            'name' => 'Ravens',
            'slug' => 'BAL',
        ]);

        NflTeam::create([
            'nfl_division_id' => 2,
            'title' => 'Cincinnati',
            'name' => 'Bengals',
            'slug' => 'CIN',
        ]);

        NflTeam::create([
            'nfl_division_id' => 2,
            'title' => 'Cleveland',
            'name' => 'Browns',
            'slug' => 'CLE',
        ]);

        NflTeam::create([
            'nfl_division_id' => 2,
            'title' => 'Pittsburgh',
            'name' => 'Steelers',
            'slug' => 'PIT',
        ]);

        NflTeam::create([
            'nfl_division_id' => 3,
            'title' => 'Houston',
            'name' => 'Texans',
            'slug' => 'HOU',
        ]);

        NflTeam::create([
            'nfl_division_id' => 3,
            'title' => 'Indianapolis',
            'name' => 'Colts',
            'slug' => 'IND',
        ]);

        NflTeam::create([
            'nfl_division_id' => 3,
            'title' => 'Jacksonville',
            'name' => 'Jaguars',
            'slug' => 'JAX',
        ]);

        NflTeam::create([
            'nfl_division_id' => 3,
            'title' => 'Tennessee',
            'name' => 'Titans',
            'slug' => 'TEN',
        ]);

        NflTeam::create([
            'nfl_division_id' => 4,
            'title' => 'Denver',
            'name' => 'Broncos',
            'slug' => 'DEN',
        ]);

        NflTeam::create([
            'nfl_division_id' => 4,
            'title' => 'Kansas City',
            'name' => 'Chiefs',
            'slug' => 'KC',
        ]);

        NflTeam::create([
            'nfl_division_id' => 4,
            'title' => 'Los Angeles',
            'name' => 'Chargers',
            'slug' => 'LAC',
        ]);

        NflTeam::create([
            'nfl_division_id' => 4,
            'title' => 'Oakland',
            'name' => 'Raiders',
            'slug' => 'OAK',
        ]);

        NflTeam::create([
            'nfl_division_id' => 5,
            'title' => 'Dallas',
            'name' => 'Cowboys',
            'slug' => 'DAL',
        ]);

        NflTeam::create([
            'nfl_division_id' => 5,
            'title' => 'New York',
            'name' => 'Giants',
            'slug' => 'NYG',
        ]);

        NflTeam::create([
            'nfl_division_id' => 5,
            'title' => 'Philadelphia',
            'name' => 'Eagles',
            'slug' => 'PHI',
        ]);

        NflTeam::create([
            'nfl_division_id' => 5,
            'title' => 'Washington',
            'name' => 'Redskins',
            'slug' => 'WSH',
        ]);

        NflTeam::create([
            'nfl_division_id' => 6,
            'title' => 'Chicago',
            'name' => 'Bears',
            'slug' => 'CHI',
        ]);

        NflTeam::create([
            'nfl_division_id' => 6,
            'title' => 'Detroit',
            'name' => 'Lions',
            'slug' => 'DET',
        ]);

        NflTeam::create([
            'nfl_division_id' => 6,
            'title' => 'Green Bay',
            'name' => 'Packers',
            'slug' => 'GB',
        ]);

        NflTeam::create([
            'nfl_division_id' => 6,
            'title' => 'Minnesota',
            'name' => 'Vikings',
            'slug' => 'MIN',
        ]);

        NflTeam::create([
            'nfl_division_id' => 7,
            'title' => 'Atlanta',
            'name' => 'Falcons',
            'slug' => 'ATL',
        ]);

        NflTeam::create([
            'nfl_division_id' => 7,
            'title' => 'Carolina',
            'name' => 'Panthers',
            'slug' => 'CAR',
        ]);

        NflTeam::create([
            'nfl_division_id' => 7,
            'title' => 'New Orlean',
            'name' => 'Saints',
            'slug' => 'NO',
        ]);

        NflTeam::create([
            'nfl_division_id' => 7,
            'title' => 'Tampa Bay',
            'name' => 'Buccaneers',
            'slug' => 'TB',
        ]);

        NflTeam::create([
            'nfl_division_id' => 8,
            'title' => 'Arizona',
            'name' => 'Cardinals',
            'slug' => 'ARI',
        ]);

        NflTeam::create([
            'nfl_division_id' => 8,
            'title' => 'Los Angeles',
            'name' => 'Rams',
            'slug' => 'LAR',
        ]);

        NflTeam::create([
            'nfl_division_id' => 8,
            'title' => 'San Francisco',
            'name' => '49ers',
            'slug' => 'SF',
        ]);

        NflTeam::create([
            'nfl_division_id' => 8,
            'title' => 'Seattle',
            'name' => 'Seahawks',
            'slug' => 'SEA',
        ]);

        $permissions = [
            'view_nfl_teams', 'add_nfl_teams', 'edit_nfl_teams', 'delete_nfl_teams',
        ];

        $role = Role::where('name', 'super-admin')->first();

        foreach ($permissions as $permission) {
            $p = Permission::create(['name' => $permission]);
            $role->givePermissionTo($p);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nfl_teams');
    }
}
