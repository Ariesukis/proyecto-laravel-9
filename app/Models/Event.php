<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'img_banner',
        'date_event',
        'place_event',
        'description',
        'is_banner'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
