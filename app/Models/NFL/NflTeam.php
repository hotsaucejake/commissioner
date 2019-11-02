<?php

namespace App\Models\NFL;

use Illuminate\Database\Eloquent\Model;

class NflTeam extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nfl_division_id', 'title', 'name', 'slug'];

    public function nfl_division()
    {
        return $this->belongsTo('App\Models\NFL\NflDivision');
    }

    public function nfl_conference()
    {
        return $this->nfl_division->nfl_conference();
    }
}
