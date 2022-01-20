<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'visit_date',
        'project_location',
        'percentage_completion',
        'challenges',
        'recommendations',
        'upload_document',
        'supervisor_division',
        'supervision_location',
        'impact_project',
        'zonal_comment',
        'divisional_comment',
        'hod_comment'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
