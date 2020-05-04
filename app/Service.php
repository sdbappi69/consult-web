<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany('App\Category')->where('status', 1);
    }
}
