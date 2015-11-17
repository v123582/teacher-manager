<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
/**
     * loginWithFacebook
     *
     * @return Response
     */
    public function loginOut()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    /**
     * loginWithFacebook
     *
     * @param  Request  $request
     * @return Response
     */
    public function loginWithFacebook(Request $request)
    {
        // get data from request
        $code = $request->get('code');

        // get fb service
        $fb = \OAuth::consumer('Facebook');

        // check if code is valid

        // if code is provided get user data and sign in
        if ( ! is_null($code))
        {
            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken($code);
            // Send a request with it
            $result = json_decode($fb->request('/me'), true);

            $user = User::where('email', '=', $result['email'])->first();
            if (empty($user)){

                $user = new User;
                $user->name = $result['name'];
                $user->email = $result['email'];
                $user->password = bcrypt($result['email']);
                $user->save();

            }

            Auth::login($user);
            if (Auth::check()){
                return Redirect::to('/');
            }
            else{
                echo 'login fail';
            }


        }
        // if not ask for permission first
        else
        {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return redirect((string)$url);
        }
    }

    // get('/users', 'UserController@showuserall');
    public function showUserall()
    {
        $users = User::all();
        $loginUser = Auth::check() ? Auth::user()->name : null;
        $isAuth = Auth::check() ? 'true' : 'false';
        $data = array(
            'users' => $users,
            'loginUser' => $loginUser,
            'isAuth'  => $isAuth,
        );        
        return view('user/users', $data);
    }

    // get('/user/{id}', 'UserController@showuserone');
    public function showUserone(Request $request, $id)
    {
        $user = User::find($id);
        return $user;
    }

}
