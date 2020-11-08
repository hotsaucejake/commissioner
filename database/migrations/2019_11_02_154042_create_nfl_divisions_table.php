<?php

use App\Models\NFL\NflDivision;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateNflDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfl_divisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nfl_conference_id')->unsigned();
            $table->string('title');
            $table->string('alias');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('nfl_conference_id')->references('id')->on('nfl_conferences')->onDelete('cascade');
        });

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

        $permissions = [
            'view_nfl_divisions', 'add_nfl_divisions', 'edit_nfl_divisions', 'delete_nfl_divisions',
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
        Schema::dropIfExists('nfl_divisions');
    }
}
