<?php

namespace Tests\Unit;

use App\postproduct;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_category_id_is_recorded()
    {
        factory(postproduct::class)->create();
        $this->assertCount(1,postproduct::all());
    }
}
