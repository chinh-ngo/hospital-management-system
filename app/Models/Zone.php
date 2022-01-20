<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        'zone'
    ];

    public function delete()
    {
        // delete all related photos
        $this->states()->delete();
        // delete the user
        return parent::delete();
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
