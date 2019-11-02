<?php

namespace App\Models\NFL;

use Illuminate\Database\Eloquent\Model;

class NflConference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'alias'];

    public function nfl_divisions()
    {
        return $this->hasMany(\App\Models\NFL\NflDivision::class);
    }

    public function nfl_teams()
    {
        return $this->hasManyThrough(\App\Models\NFL\NflTeam::class, \App\Models\NFL\NflDivision::class);
    }
}
