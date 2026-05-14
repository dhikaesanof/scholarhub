<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'university',
        'major',
        'semester',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
