<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookList extends Model
{
    use HasFactory;
    protected $table = "book_list";

    protected $fillable = [
        'list_id',
        'book_id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
