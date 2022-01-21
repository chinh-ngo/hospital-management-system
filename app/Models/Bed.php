<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    protected $fillable = [
        'no',
        'ward_id',
    ];

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}
