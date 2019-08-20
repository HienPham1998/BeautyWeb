<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }
    use SoftDeletes;
}
