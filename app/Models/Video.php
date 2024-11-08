<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'url',
        'category_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}