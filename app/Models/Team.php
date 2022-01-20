<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'state_id'
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function delete()
    {
        // delete all related photos
        $this->members()->delete();
        return parent::delete();
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
