<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarship extends Model
{
    use SoftDeletes;    

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
        'benefits',
        'minimum_gpa',
        'required_documents',
        'registration_open_date',
        'announcement_date',
    ];

    public function assessmentQuestions()
    {
        return $this->hasMany(AssessmentQuestion::class);
    }
    
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
