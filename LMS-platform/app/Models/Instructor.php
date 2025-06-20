<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department',
        'bio',
        'credential_1',
        'credential_2',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
