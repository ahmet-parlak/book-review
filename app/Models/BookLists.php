<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLists extends Model
{
    use HasFactory;

    protected $table = "book_lists";

    protected $fillable = [
        'user_id',
        'list_name',
        'status'
    ];

    public function books()
    {
        return $this->hasMany(BookList::class, 'list_id')->orderByDesc('created_at');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
