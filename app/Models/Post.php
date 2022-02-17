<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
         return Carbon::parse($value)->diffForHumans();
    }

    public function comment()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
}
