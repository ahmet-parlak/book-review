<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_name',
        'birth_year',
        'death_year',
        'country',
        'description',
        'title',
        'author_photo'
    ];
}
