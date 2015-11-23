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
     * Display the specified file by id.
     * @param  int  $id
     * @return Response
     */
    // public function show($id)
    // {
    //     $file = File::findOrFail($id);
    //     return $file;
    // }

    /**
     * post('/file/create', 'FileController@store');
     * Store a newly created file in storage.
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

        return redirect('/file');
    }

    /**
     * post('/file/update', 'FileController@update');
     * Update the specified file in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $file = File::findOrFail($request->id);
        $file->user = $request->user;
        $file->name = $request->name;
        $file->subject = $request->subject;
        $file->chapter = $request->chapter;
        $file->grade = $request->grade;
        $file->topic = $request->topic;
        $file->link = $request->link;
        $file->description = $request->description;
        $file->save();

        return redirect('/file');
    }

    /**
     * post('/file/delete', 'FileController@destroy');
     * Remove the specified resource from storage.
     * @param  Request  $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $file = File::findOrFail($request->id);
        $file->delete();

        return redirect('/file');
    }

    // Route::get('/file/create', 'FileController@create');
    // Route::get('/file/update/{id}', 'FileController@edit');

    public function fileUpload()
    {
        $file           = Input::file('file');
        
        $file_name      = $file->getClientOriginalName();       
        $file_size      = $file->getSize();
        $file_extension = $file->getClientOriginalExtension();
        $file_mime      = $file->getMimeType();
        $file_tmp_name  = strval(time()).str_random(5).'.'.$file_extension;

        $destination_path   = public_path().'/user-file/';
        $file_path          = $destination_path.$file_tmp_name;
        
        if( Input::hasFile('file') ){
            $upload_resault = $file->move($destination_path, $file_tmp_name);
            return true;
        }
        else{
            return false;
        }
    }
    public function test(){
        return view('test.file_test');
    }
}
