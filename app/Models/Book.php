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

    protected $appends = ['author', 'categories', 'rating', 'user_review', 'review_count'];

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

    public function getUserReviewAttribute()
    {
        $auth_user_id =  auth()->user()->id ?? 0;
        return $this->hasOne(Review::class, 'book_id')->where('reviews.user_id', $auth_user_id)->first();
    }

    public function getReviewCountAttribute()
    {
        return $this->hasMany(Review::class, 'book_id')->count();
    }

    public function getRatingAttribute()
    {
        $rating = $this->hasMany(Review::class, 'book_id')->avg('rating');
        return round($rating * 2) / 2;
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

    public function reviews()
    {
        //if logged in or not
        $auth_user_id =  auth()->user()->id ?? 0;
        
        //logged user review first 
        return $this->hasMany(Review::class, 'book_id')->with('user')->orderByRaw('FIELD(user_id,'.$auth_user_id.') DESC')->orderBy('created_at', 'DESC');
    }

    
}
