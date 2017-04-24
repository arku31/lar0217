<?php

namespace Tests\Unit;

use App\Http\Controllers\PostController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $postC = new PostController();
        for($i=0;$i<10;$i++) {
            $result = $postC->calc($i);
            $this->assertTrue($i * 2 == $result);
        }


    }
}
