<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['goods_name', 'created_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
