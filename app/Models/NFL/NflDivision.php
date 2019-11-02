<?php

namespace App\Models\NFL;

use Illuminate\Database\Eloquent\Model;

class NflDivision extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nfl_conference_id', 'title', 'alias', 'slug'];


    public function nfl_conference()
    {
        return $this->belongsTo('App\Models\NFL\NflConference');
    }

    
    public function nfl_teams()
    {
        return $this->hasMany('App\Models\NFL\NflTeam');
    }
}
