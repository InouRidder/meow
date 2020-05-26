<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    static function sample() {
        $ids = self::all()->pluck('id');
        $sample_id = $ids[rand(
            $ids[0], $ids[$ids->count() -1])
        ];
        return self::find($sample_id);
    }
}
