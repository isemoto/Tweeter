<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function scopeFollowing($query, $str)
    {
        return $query->where('follow_user_id', $str);
    }
}
