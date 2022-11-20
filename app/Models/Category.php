<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'parent_id',
        'description'
    ];


    public function parent()
    {   
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function parentAll()
    {   
        // returns all parents (recurring)
        return $this->belongsTo(Category::class,'parent_id')->with('parentAll');
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenAll()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childrenAll');
    }
}
