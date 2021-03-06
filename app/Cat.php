<?php

namespace App;

use App\Base;

class Cat extends Base
{
    protected $fillable = ['name','type', 'found_at', 'age'];

    public function kittens() {
        return $this->hasMany('App\Cat', 'cat_id');
    }

    public function parent() {
        return $this->belongsTo('App\Cat', 'cat_id');
    }

    public function kittensOlderThan(int $age ) {
        return $this->kittens->where('age', '>', $age);
    }

    static function foundAfter(DateTime $date) {

    }
}
