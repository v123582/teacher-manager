<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserControllerTest extends TestCase
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

    // get('/users', 'UserController@showuserall');
    public function testShowUserAll()
    {

        $users = User::all();

        $response = $this->call('GET', '/users');
        $this->assertEquals(200, $response->status());
        $this->assertEquals(count($users), count(json_decode($response->getContent())));

    }  

    // get('/user/{id}', 'UserController@showuserone');
    public function testShowUserOne()
    {

        $user = new User;
        $user->name = 'test';
        $user->email = 'test';
        $user->password = bcrypt('test');
        $user->save();

        $response = $this->call('GET', '/user/'.$user->id);
        $this->assertEquals(200, $response->status());
        $this->assertEquals($user->id, json_decode($response->getContent())->id);
    }  


}
