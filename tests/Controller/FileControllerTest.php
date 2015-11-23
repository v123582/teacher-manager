<?php

use App\File;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FileControllerTest extends TestCase
{
    use WithoutMiddleware;

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
     * get('/files', 'FileController@showAll');
     * Display a listing of the files.
     * @return void
     */
    public function testShowFiles()
    {
        $files = File::all();
        $response = $this->call('GET', '/files');
        $this->assertEquals(200, $response->status());
        // $this->assertEquals(count($files), count(json_decode($response->getContent())));
    }

    /**
     * get('/file/{id}', 'FileController@show');
     * Display the specified file by id.
     * @return void
     */
    public function testShowFile()
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

        $response = $this->call('GET', '/file/show/'.$file->id);
        $this->assertEquals(200, $response->status());
        // $this->assertEquals($file->id, json_decode($response->getContent())->id);
    }

    /**
     * post('/file/create', 'FileController@store');
     * Store a newly created file in storage.
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

        $filesBefore = File::all();

        $response = $this->call('POST', '/file/create', $params);
        $this->assertEquals(302, $response->status());

        $filesAfter = File::all();
        $this->assertEquals(count($filesBefore)+1, count($filesAfter));
        
    }

    /**
     * post('/file/update', 'FileController@update');
     * Update the specified file in storage.
     * @return void
     */
    public function testUpdate()
    {

        $file = new File;
        $file->user = 'test';
        $file->name = 'Alice';
        $file->subject = 'test';
        $file->chapter = 'test';
        $file->grade = 'test';
        $file->topic = 'test';
        $file->link = 'test';
        $file->description = 'test';
        $file->save();
        
        $params = [
            'id' => $file->id,
            'user' => 'test',
            'name' => 'Bob',
            'subject' => 'test',
            'chapter' => 'test',
            'grade' => 'test',
            'topic' => 'test',
            'link' => 'test',
            'description' => 'test',
        ];

        $response = $this->call('POST', '/file/update', $params);
        $this->assertEquals(302, $response->status());

        $fileUpdated = File::find($file->id);
        $this->assertEquals($params['name'], $fileUpdated->name);
    }

    /**
     * post('/file/delete', 'FileController@destroy');
     * Remove the specified resource from storage.
     * @return void
     */
    public function testDelete()
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
        ];

        $filesBefore = File::all();

        $response = $this->call('POST', '/file/delete', $params);
        $this->assertEquals(302, $response->status());

        $filesAfter = File::all();
        $this->assertEquals(count($filesBefore)-1, count($filesAfter));
    }

    // Route::get('/file/create', 'FileController@create');
    // Route::get('/file/update/{id}', 'FileController@edit');

}
