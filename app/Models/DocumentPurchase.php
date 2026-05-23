<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentPurchase extends Model
{
    protected $fillable = [

        'student_id',

        'document_id',

        'payment_status',
    ];

    public function student()
    {
        return $this->belongsTo(
            Student::class
        );
    }

    public function document()
    {
        return $this->belongsTo(
            Document::class
        );
    }
}
