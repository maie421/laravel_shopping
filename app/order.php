<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function order()
    // {
    //     return $this->hasMany(Comment::class, 'parent_id');
    // }
}
