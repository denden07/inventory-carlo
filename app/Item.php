<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable =
        [
        'name','category_id','brand_id','quantity','price','status'
        ];

    public function brand()
    {
        return $this->belongsTo('App\Brand','brand_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function histories()
    {
        return $this->hasMany('App\History','item_id');
    }
}
