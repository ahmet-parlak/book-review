<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTag extends Model
{
    use HasFactory;

    protected $table = "book_tag";

    protected $fillable = [
        'book_id',
        'tag_id'
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
