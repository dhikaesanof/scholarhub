<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'title',
        'provider',
        'description',
        'requirements',
        'education_level',
        'category',
        'funding_type',
        'deadline',
        'registration_link',
        'thumbnail',
        'status',
        'created_by',
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
