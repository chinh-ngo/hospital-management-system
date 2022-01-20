<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_id',
        'name'
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }


    public function delete()
    {
        // delete all related photos
        $this->projects()->delete();
        $this->teams()->delete();
        $this->finances()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function finances()
    {
        return $this->hasMany(Finance::class);
    }

}
