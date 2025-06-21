<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //

    public function modules()
    {
        return $this->belongsTo(Module::class);
    }
}
