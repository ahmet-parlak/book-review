<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublisherReport extends Model
{
    use HasFactory;

    protected $table = "publisher_reports";

    protected $fillable = [
        'user_id',
        'publisher_id',
        'publisher_name',
        'publisher_photo',
        'website',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}
