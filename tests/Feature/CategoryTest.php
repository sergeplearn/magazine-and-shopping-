<?php

namespace Tests\Feature;

use App\category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    public function test_create_new_category()
    {    $this->withoutExceptionHandling();
        $category = factory(category::class)->make()->toArray();
        $response = $this->post('/category',$category);
         $this->assertCount(1,category::all());
        $response->assertStatus(200);
    }
    public function test_update_a_category()
    {    $this->withoutExceptionHandling();
        $category = factory(category::class)->make()->toArray();
         $this->post('/category',$category);

         $category = category::first();

        $response = $this->patch('/category/'.$category->id,[
            'category_name'=>'new category_name',

        ]);
        $this->assertEquals('new category_name',category::first()->category_name);


        $response->assertStatus(200);
    }

    public function test_delete_category()
    {    $this->withoutExceptionHandling();
        $category = factory(category::class)->make()->toArray();
        $response = $this->post('/category',$category);


        $response = $this->delete('/category/'.category::first()->id);
        $this->assertCount(0,category::all());
        $response->assertStatus(200);
    }


}
