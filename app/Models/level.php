<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User_experience;

class level extends Model
{
    use HasFactory;
    public function user_experience() {
        $this->belongsToMany(User_experience::class, 'user_experience', 'level');
    }
}
