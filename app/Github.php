<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Github extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
    ];
}
