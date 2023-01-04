<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReport extends Model
{
    use HasFactory;

    protected $table = "book_reports";

    protected $fillable = [
        'user_id',
        'book_id',
        'isbn',
        'title',
        'original_title',
        'author',
        'translator',
        'publisher',
        'publication_year',
        'pages',
        'description',
        'book_photo',
        'language',
        'category'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
