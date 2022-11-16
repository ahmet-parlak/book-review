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
        'birth_date',
        'description',
        'author_photo'
    ];

    public function getBirthDateAttribute($date)
    {
        return $date ? Carbon::parse($date)->format('d/m/Y') : null;
    }
}
