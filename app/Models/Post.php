<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'image', 'title', 'content',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

}
