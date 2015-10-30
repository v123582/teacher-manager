<?php 

namespace App\Http\Controllers;

use App\File;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'hello world';
	}

}
