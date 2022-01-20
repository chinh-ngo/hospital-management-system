<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'awarddate',
        'title',
        'contractor',
        'user_id',
        'state_id',
        'objectives',
        'percentcomplete',
        'retention',
        'commendate',
        'completedate',
        'direct',
        'indirect',
        'induced',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function delete()
    {
        // delete all related photos
        $this->finances()->delete();
        $this->teams()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }

    public function finances()
    {
        return $this->hasMany(Finance::class);
    }
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
