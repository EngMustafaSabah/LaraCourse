<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'rating',
        'active',
        'views',
        'hours',
        'category_id',
        'levels',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
