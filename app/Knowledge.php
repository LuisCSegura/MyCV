<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $table = 'knowledges';
    protected $fillable = [
        'user_id', 'description',
    ];
}
