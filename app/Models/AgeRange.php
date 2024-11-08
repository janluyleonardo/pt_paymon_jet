<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeRange extends Model
{
    use HasFactory;

    protected $fillable = [
        'range',
        'status',
    ];

    public function course()
    {
        return $this->hasOne(Course::class);
    }
}