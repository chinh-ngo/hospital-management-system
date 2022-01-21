<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category'
    ];

    public function drugs()
    {
        return $this->hasMany(Drug::class);
    }

    public function delete()
    {
        $this->drugs()->delete();
        return parent::delete();
    }
}
