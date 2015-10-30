<?php 

namespace App\Http\Controllers;

use App\File;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller {

	/**
	 * get('/file', 'FileController@index');
	 * 
	 * @return Response
	 */
	public function index()
	{
		return 'hello world';
	}

	/**
	 * get('/files', 'FileController@showAll');
	 * Display a listing of the files.
	 * @return Response
	 */
	public function showAll()
	{
		$files = File::all();
		return $files;
	}

	/**
	 * get('/file/{id}', 'FileController@show');
	 * 
	 * @return Response
	 */
	public function show(Request $request)
	{
		$file = File::find($request->id);
		return $file;
	}


	/**
	 * post('/file/create', 'FileController@store');
	 * 
	 * @param  Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
        $file = new File;
        $file->user = $request->user;
        $file->name = $request->name;
        $file->subject = $request->subject;
        $file->chapter = $request->chapter;
        $file->grade = $request->grade;
        $file->topic = $request->topic;
        $file->link = $request->link;
        $file->description = $request->description;
        $file->save();
	}

	/**
	 * post('/file/update', 'ExampleController@update');
	 * 
	 * @param  Request $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$file = File::find($request->id);
		$file->name = $request->name;
        $file->save();
	}

    /**
     * post('/file/delete', 'ExampleController@destroy');
     *
     * @param  Request  $request
     * @return Response
     */
    public function destroy(Request $request)
    {

        $example = File::find($request->id);
        $example->delete();

    }

	// Route::get('/file/create', 'FileController@create');
	// Route::get('/file/update/{id}', 'FileController@edit');

}
