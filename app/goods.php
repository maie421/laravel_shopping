<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class goods extends Model
{
    protected $fillable = [
        'name', 'path', 'price','content'
    ];
    /* @array $appends */
    public $appends = ['url', 'uploaded_time', 'size_in_kb'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
