<?php

namespace Tests\Unit\models;

use Tests\TestCase;
use App\Cat;

final class CatTest extends TestCase
{
    
    /** @test */
    public function it_has_a_parent() {   
        $parent = factory('App\Cat')->create();
        $cat = factory('App\Cat')->create(['cat_id' => $parent->id]);
        
        $this->assertInstanceOf(
            \App\Cat::class, $cat->parent
        );
        $this->emptyDB();
    }
    
    /** @test */
    public function it_has_kittens() {
        $parent = factory('App\Cat')->create();
        $cat = factory('App\Cat')->create(['cat_id' => $parent->id]);

        $this->assertEquals(
            1, $parent->kittens->count()
        );

        $this->emptyDB();
    }

    /** @test */
    public function it_returns_kittens_older_than() {
        $parent = factory('App\Cat')->create();
        $expected = factory('App\Cat')->create(['cat_id' => $parent->id, 'age' => 19]);
        $young_cat = factory('App\Cat')->create(['cat_id' => $parent->id, 'age' => 17]);

        $actual = $parent->kittensOlderThan(18)->first();
        $this->assertTrue($actual->is($expected));
    }
    
    // eval(\Psy\sh());
    public function emptyDB() {
        Cat::destroy(
            Cat::all()->pluck('id')
        ); 
    }
}
