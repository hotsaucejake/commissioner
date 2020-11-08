<?php

use App\Models\NFL\NflConference;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateNflConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfl_conferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('alias');
            $table->string('slug')->unique();
            $table->timestamps();
        });

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

        $permissions = [
            'view_nfl_conferences', 'add_nfl_conferences', 'edit_nfl_conferences', 'delete_nfl_conferences',
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
        Schema::dropIfExists('nfl_conferences');
    }
}
