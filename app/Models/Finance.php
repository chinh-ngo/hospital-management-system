<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'contract_sum',
        'amount'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
