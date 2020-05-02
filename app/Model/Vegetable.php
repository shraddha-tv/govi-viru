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

    public function farmer(){
        return $this->belongsTo('App\User','farmerId');
    }

    public function category(){
        return $this->belongsTo('App\Model\Category','vegId');
    }

}
