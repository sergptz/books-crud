<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $fillable = ['name', 'author_id', 'pages_count', 'year', 'publisher_id', 'cover_type'];

    public const COVER_TYPES = [
        'hard',
        'soft'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
