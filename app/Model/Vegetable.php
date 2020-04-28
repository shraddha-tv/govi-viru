<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vegetable extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vegId',
        'grade',
        'rate',
        'quantity',
        'date',
        'freeQuantity',
        'farmerId'
    ];
}
