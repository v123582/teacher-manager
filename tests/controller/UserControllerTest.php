<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    
    use WithoutMiddleware;
    use DatabaseMigrations;
    use DatabaseTransactions;

    // get('/users', 'UserController@showuserall');
    public function testShowUserAll()
    {

        $user = new User;
        $user->name = 'test';
        $user->email = 'test';
        $user->password = bcrypt('test');
        $user->save();

        $response = $this->call('GET', '/users');
        $this->assertEquals(200, $response->status());

    }  

    // get('/user/{id}', 'UserController@showuserone');
    public function testShowUserOne()
    {

        $user = new User;
        $user->name = 'test';
        $user->email = 'test';
        $user->password = bcrypt('test');
        $user->save();

        $response = $this->call('GET', '/user/1');
        $this->assertEquals(200, $response->status());

    }  


}
