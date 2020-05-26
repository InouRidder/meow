<?php

use Illuminate\Database\Seeder;
use App\Cat;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = 100;
        $cats = [];
        echo 'Creating 100 cats';
        for($c = 0; $c <= $times; $c++) {
            $cat = factory('App\Cat')->make();
            $cat->save();
            $cats[] = $cat;
            echo "$c. {$cat->name} created! \n";
        }

        // assign kittens;
        foreach($cats as $index => $cat) {
            $parent_id = ((int)($cat->id / 10)) * 10;
            $parent = Cat::where('id', '=', $parent_id)->first();
            if ($parent !== null && $parent->id !== $cat->id) {
                $cat->update(['cat_id' => $parent_id]);
            }
        }
    }
}
