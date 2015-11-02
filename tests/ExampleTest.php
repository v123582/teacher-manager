<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    // initDatabase
    public function setUp()
    {
        parent::setUp();
        $this->initDatabase();
    }

    // resetDatabase
    public function tearDown()
    {
        $this->resetDatabase();
        parent::tearDown();
    }
 
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }
}
