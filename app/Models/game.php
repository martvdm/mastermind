<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'score',
        'playboard',
        'playboardcheck',
        'randomgameid',
        'status',
        'difficulty'
    ];
    protected $casts = [
        'playboard' => 'array',
        'playboardcheck' => 'array',
        'randomgameid' => 'array'

    ];
    public function Users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
