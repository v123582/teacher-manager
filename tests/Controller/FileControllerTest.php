<?php

use App\File;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    
    use WithoutMiddleware;
    use DatabaseMigrations;
    use DatabaseTransactions;
    /**
     * Display a listing of the resource.
     * get('/file', 'FileController@index')
     * @return void
     */
    public function testIndex()
    {
        $this->visit('/file')
             ->see('hello world');
    }

    /**
     * get('/files', 'FileController@showAll');
     * Display a listing of the files.
     * @return void
     */
    public function testList()
    {
        $file = new File;
        $file->user = 'test';
        $file->name = 'test';
        $file->subject = 'test';
        $file->chapter = 'test';
        $file->grade = 'test';
        $file->topic = 'test';
        $file->link = 'test';
        $file->description = 'test';
        $file->save();

        $response = $this->call('GET', '/files');
        $this->assertEquals(200, $response->status());
    }

    /**
     * get('/file/{id}', 'FileController@show');
     * 
     * @return void
     */
    public function testShow()
    {
        $file = new File;
        $file->user = 'test';
        $file->name = 'test';
        $file->subject = 'test';
        $file->chapter = 'test';
        $file->grade = 'test';
        $file->topic = 'test';
        $file->link = 'test';
        $file->description = 'test';
        $file->save();

        $response = $this->call('GET', '/file/'.$file->id);
        $this->assertEquals(200, $response->status());
    }

    /**
     * post('/file/create', 'FileController@store');
     * 
     * @return void
     */
    public function testStore()
    {
        $params = [
            'user' => 'test',
            'name' => 'Bob',
            'subject' => 'test',
            'chapter' => 'test',
            'grade' => 'test',
            'topic' => 'test',
            'link' => 'test',
            'description' => 'test',
        ];

        $response = $this->call('POST', '/file/create', $params);
        $this->assertEquals(200, $response->status());
    }

    /**
     * post('/file/update', 'ExampleController@update');
     * 
     * @return void
     */
    public function testUpdate()
    {

        $file = new File;
        $file->user = 'test';
        $file->name = 'test';
        $file->subject = 'test';
        $file->chapter = 'test';
        $file->grade = 'test';
        $file->topic = 'test';
        $file->link = 'test';
        $file->description = 'test';
        $file->save();
        
        $params = [
            'id' => $file->id,
            'name' => 'Alice',
        ];

        $response = $this->call('POST', '/file/update', $params);
        $this->assertEquals(200, $response->status());
    }

    // Route::get('/file/create', 'FileController@create');
    // Route::get('/file/update/{id}', 'FileController@edit');
    // Route::post('/file/delete', 'ExampleController@destroy');

}
