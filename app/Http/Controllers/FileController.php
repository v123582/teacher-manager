<?php

namespace App\Http\Controllers;
use Auth;
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
        return redirect('/');
        //return 'hello world';
    }

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
     * get('/file/{id}', 'FileController@showFile');
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
        $isAuth = Auth::check() ? 'true' : 'false';
        $data = compact( "loginUser", "isAuth");

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

        return redirect('/file');
    }

    // Route::get('/file/update/{id}', 'FileController@edit');
    public function edit($id)
    {

        $file = File::findOrFail($id);

        $loginUser = Auth::check() ? Auth::user()->name : null;
        $isAuth = Auth::check() ? 'true' : 'false';
        $data = compact("file", "loginUser", "isAuth");

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

}
