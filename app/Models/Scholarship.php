<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
