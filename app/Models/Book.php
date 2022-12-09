<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'title',
        'publisher_id',
        'publication_year',
        'pages',
        'original_title',
        'translator',
        'description',
        'book_photo',
        'language'
    ];

    protected $appends = ['author', 'categories'];

    public function getAuthorAttribute()
    {
        if (isset($this->bookAuthor()->first()->author->author_name)) {
            $author = $this->bookAuthor()->first()->author;
            return $author;
        }
    }

    public function getCategoriesAttribute()
    {
        $categories = $this->hasMany(BookCategory::class, 'book_id')->with('category')->get();
        return $categories;
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function author()
    {
        return $this->hasMany(BookAuthor::class);
    }

    public function bookAuthor()
    {
        return $this->belongsTo(BookAuthor::class, 'id', 'book_id')->with('author');
    }

    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class, 'id', 'book_id')->with('category');

        /* Get All Categories */
        //return $this->hasMany(BookCategory::class, 'book_id', 'id')->with('category');
    }
}
