<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobbie extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description',
    ];
}
