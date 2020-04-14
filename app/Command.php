<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
