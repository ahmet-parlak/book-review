<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;

    protected $table = "book_requests";

    protected $fillable = [
        'user_id',
        'isbn',
        'title',
        'author',
        'publisher'
    ];
}
