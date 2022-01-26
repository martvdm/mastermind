<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_experience extends Model
{
    use HasFactory;

    public function user()
    {
        
        return $this->belongsTo(User::Class, 'id', 'user_id');
    }
}