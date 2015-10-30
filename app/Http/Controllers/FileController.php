<?php 

namespace App\Http\Controllers;

use App\File;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller {

	/**
	 * Display a listing of the resource.
	 * get('/file', 'FileController@index');
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

}
