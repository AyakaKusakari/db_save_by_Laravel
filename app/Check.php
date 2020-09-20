<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
        'inquirers_id',
        'check_item',
    ];
}
