<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'experience',
        'level'
    ];
    public function user()
    {
        return $this->belongsTo(User::Class, 'id', 'user_id');
    }

    public function levellist() {
      return  $this->hasOne(level::class, 'level', 'level');
    }
    public function create() {
        user_experience::create();
    }


}
