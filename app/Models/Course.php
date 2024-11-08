<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'age_range_id',
    ];

    // public function multimedia()
    // {
    //     return $this->hasMany(Multimedia::class, 'course_id', 'id');
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function range()
    {
        return $this->belongsTo(AgeRange::class);
    }
    public function video()
    {
        return $this->hasMany(Video::class);
    }
}
