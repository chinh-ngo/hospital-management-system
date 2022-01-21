<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function delete()
    {
        $this->beds()->delete();
        return parent::delete();
    }

    public function beds()
    {
        return $this->hasMany(Bed::class);
    }
}
