<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['name','type', 'found_at', 'age'];

    public function kittens() {
        return $this->hasMany('App\Cat', 'cat_id');
    }

    public function parent() {
        return $this->belongsTo('App\Cat', 'cat_id');
    }
}
