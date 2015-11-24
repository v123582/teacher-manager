<?php

namespace App\Http\Controllers;
use Auth;
use App\File;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Input;

class FileController extends Controller {

    /**
     * get('/files', 'FileController@showFiles');
     * Display a listing of the files.
     * @return Response
     */
    public function showFiles()
    {
        $files = File::all();

        $loginUser = Auth::check() ? Auth::user()->name : null;
        $isAuth = Auth::check() ? 'true' : 'false';
        $data = compact("files", "loginUser", "isAuth");

        return view('file/showFiles', $data);
    }

    /**
     * get('/file/show/{id}', 'FileController@showFile');
     * Display the specified file by id.
     * @param  int  $id
     * @return Response
     */
    public function showFile($id)
    {
        $file = File::findOrFail($id);

        $loginUser = Auth::check() ? Auth::user()->name : null;
        $isAuth = Auth::check() ? 'true' : 'false';
        $data = compact("file", "loginUser", "isAuth");

        return view('file/showFile', $data);
    }

    // Route::get('/file/create', 'FileController@create');
    public function create()
    {
        $loginUser = Auth::check() ? Auth::user()->name : null;
        $loginUser_id = Auth::user()->id;
        $isAuth = Auth::check() ? 'true' : 'false';
        $data = compact( "loginUser", "isAuth", "loginUser_id");

        return view('file/create', $data);
    }

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

        return redirect('files');
    }

    // Route::get('/file/update/{id}', 'FileController@edit');
    public function edit($id)
    {

        $file = File::findOrFail($id);

        $loginUser = Auth::check() ? Auth::user()->name : null;
        $loginUser_id = Auth::user()->id;
        $isAuth = Auth::check() ? 'true' : 'false';
        $data = compact("file", "loginUser", "isAuth" , "loginUser_id");

        return view('file/edit', $data);
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

        return redirect('files');
    }

    /**
     * post('/file/delete', 'FileController@destroy');
     * Remove the specified resource from storage.
     * @param  Request  $request
     * @return Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $file->delete();

        return redirect('files');
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
        $file_url = 'http://localhost:8000/user-file/'.$file_tmp_name;
        
        if( Input::hasFile('file') ){
            $upload_resault = $file->move($destination_path, $file_tmp_name);
            return $file_url;
        }
        else{
            return 'false';
        }
    }
}
