<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //

    protected $fillable =
        [
            'date','body','item_id'
        ];
}
