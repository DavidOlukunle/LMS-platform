<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\CourseStatus;
use App\Enums\CourseLevel;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $casts = [
    'status' => CourseStatus::class,
    'level' => CourseLevel::class,
];

    protected $fillable = ['title', 'description', 'image', 'instructor_id', 'slug', 'status', 'level'];

    protected static function booted()
    {
        static::creating(function ($course) {
            $course->slug = Str::slug($course->title . '-' . Str::random(6));
        });
    }

     public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
