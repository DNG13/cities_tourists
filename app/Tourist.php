<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    protected $fillable = ['first_name',  'last_name', 'birthday'];

    public function city()
    {
        return $this->belongsToMany('App\City');
    }
}
