<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id','complete_name', 'description', 'phone', 'date_birth', 'website', 'github', 'picture',
    ];
}
