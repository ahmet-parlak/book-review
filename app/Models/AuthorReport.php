<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorReport extends Model
{
    use HasFactory;

    protected $table = "author_reports";

    protected $fillable = [
        'user_id',
        'author_id',
        'author_name',
        'author_photo',
        'country',
        'birth_year',
        'death_year',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
