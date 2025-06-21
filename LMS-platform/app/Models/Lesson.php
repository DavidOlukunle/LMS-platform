<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'content', 'video__url', 'pdf_path'
    ];

    public function modules()
    {
        return $this->belongsTo(Module::class);
    }
}
