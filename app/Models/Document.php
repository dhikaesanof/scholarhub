<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [

        'title',

        'description',

        'pdf_file',

        'thumbnail',

        'price',

        'created_by',
    ];

    public function purchases()
    {
        return $this->hasMany(
            \App\Models\DocumentPurchase::class
        );
    }

    public function admin()
    {
        return $this->belongsTo(

            Admin::class,

            'created_by'
        );
    }
}
