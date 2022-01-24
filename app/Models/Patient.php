<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_num',
        'name',
        'insurance_id',
        'age',
        'address',
        'state',
        'phone_num',
        'email',
        'king_phone',
        'blood_g',
        'upload_file'
    ];

    public function insurance()
    {
        $this->belongsTo(Insurance::class);
    }

}
