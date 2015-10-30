<?php

use App\Example;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    
    use WithoutMiddleware;
    use DatabaseMigrations;
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->visit('/file')
             ->see('hello world');
    }

}
