<?php

namespace Tests\Feature;

use App\category;
use App\postproduct;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_Example()
    {
        $this->withExceptionHandling();

        $postproduct = factory(postproduct::class)->make()->toArray();

        $response = $this->post('/postproduct',$postproduct);


        $this->assertCount(1,postproduct::all());
        $response->assertStatus(200);
    }
    public function test_update_a_post()
    {
        $this->withoutExceptionHandling();
        $postproduct = factory(postproduct::class)->make()->toArray();

         $this->post('/postproduct',$postproduct);

        $this->assertCount(1,postproduct::all());
        $firstpost = postproduct::first();
        $responces = $this->patch('/postproduct/'.$firstpost->id,[
            'title'=>'new title',
            'body'=>'new body',
            'category_id'=>12,

        ]);


        $this->assertEquals(12,postproduct::first()->category_id);
        $this->assertEquals('new title',postproduct::first()->title);
        $this->assertEquals('new body',postproduct::first()->body);

    }
    public function test_delete_postproduct()
    {
        $this->withoutExceptionHandling();
        $postproduct = factory(postproduct::class)->make()->toArray();

         $this->post('/postproduct',$postproduct);


        $this->assertCount(1,postproduct::all());
        $firstpost = postproduct::first();
        $this->delete('/postproduct/'.$firstpost->id);
        $this->assertCount(0,postproduct::all());

    }

    public function test_index_postproduct()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/postproduct/');
        $response->assertStatus(200);
    }

    public function test_to_add_a_category_id_to_post()
    {
        $this->withoutExceptionHandling();
         $this->post('/postproduct',[
            'title'=>'hello wolrld',
            'body'=>'how was ur day',
            'category_id'=>'1',

        ]);
        $category = category::first();
        $post = postproduct::first();
        $this->assertCount(1,category::all());
        $this->assertEquals($category->id,$post->category_id);
        //$response->assertStatus(200);
    }

}
